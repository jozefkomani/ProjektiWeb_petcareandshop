<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    echo "Ju nuk keni qasje në këtë faqe.";
    exit;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=fund', 'root', ''); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $sql = "SELECT id, username, email FROM users"; 
    $stmt = $pdo->query($sql);

    if ($stmt === false) {
        throw new Exception("Gabim gjatë marrjes së të dhënave nga databaza.");
    }

    echo "Mirësevini në Dashboardin e Administratorit<br><br>";

 
    if ($stmt->rowCount() > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Emri i Përdoruesit</th><th>Email</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['email']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Nuk u gjetën të dhëna.";
    }
} catch (PDOException $e) {
    die("Nuk mund të lidhem me databazën: " . $e->getMessage());
}
?>
