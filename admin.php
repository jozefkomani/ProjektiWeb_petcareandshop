<?php
session_start();

require_once 'Database.php'; 
require_once 'User.php'; 


$database = new Database("localhost", "root", "", "fund");

$user = new User($database);

if ($_SESSION['user_role'] !== 'admin') {
   
    header("Location: login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>

<header class="header">
   
</header>

<section id="adminPanel">
    <div class="container">
        <h1>Admin Panel</h1>
        
        <?php
        
        $query = "SELECT * FROM users"; 
        $result = $database->getConnection()->query($query);

        if ($result && $result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row["id"]) . "</td><td>" . htmlspecialchars($row["username"]) . "</td><td>" . htmlspecialchars($row["email"]) . "</td><td>" . htmlspecialchars($row["role"]) . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        ?>
    </div>
</section>

</body>
</html>
