<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        $pdo = new PDO('mysql:host=localhost;dbname=fund', 'root', ''); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     
        $fullName = trim($_POST['full_name']);
        $email = trim($_POST['email']);
        $message = trim($_POST['message']);

       
        $query = "INSERT INTO contacts (full_name, email, message) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$fullName, $email, $message]);

        $successMessage = "Mesazhi u dërgua me sukses.";
    } catch (PDOException $e) {
        $errorMessage = "Gabim në dërgimin e mesazhit: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petcare Contact</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/services.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="shortcut icon" href="../assets/Favicon.ico" type="image/x-icon">
</head>
<body>
    <header class="header">
        <a href="../index.php" class="logo"><i class="fa-solid fa-paw"></i>Pet<span>Care</span></a>
        <nav class="navbar">
            <a href="../index.php">Home</a>
            <a href="../pages/services.php">Services</a>
            <a href="../pages/pricing.php">Pricing</a>
            <a href="../pages/about.php">About Us</a>
            <a href="../pages/contact.php">Contact Us</a>
        </nav>
    </header>

    <section class="contact">
        <h1 class="heading">Contact Us</h1>
        <div class="box-container">
           
        </div>
    </section>

    <section class="form">
        <h1 class="heading">Contact Us By Filling Form</h1>
        <div class="container">
            <?php if (!empty($successMessage)) echo "<p class='success'>$successMessage</p>"; ?>
            <?php if (!empty($errorMessage)) echo "<p class='error'>$errorMessage</p>"; ?>
            <form action="contact.php" method="post">
                <h3>Fill Up This Form</h3>
                <input type="text" name="full_name" placeholder="Enter Your Full Name" class="box" required>
                <input type="email" name="email" placeholder="Enter Your Email" class="box" required>
                <textarea name="message" placeholder="Write About Your Problem" class="problem" required></textarea>
                <input type="submit" value="Send Us" class="btn">
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
           <h3>Pet<span>Care</span></h3>
           <p>PetCare is a pet caring shop, where we provide facilities and various useful treatments. Visit us anytime.</p>
        </div>
    </footer>
    <div class="footer-bottom">
       <p>2023 - Pet Care</p>
    </div>
</body>
</html>
