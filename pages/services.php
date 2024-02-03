<?php
// Start the session and connect to the database
session_start();
try {
    $pdo = new PDO('mysql:host=localhost;dbname=fund', 'root', ''); // Adjust the connection parameters as needed
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch service data from the database
    $stmt = $pdo->query("SELECT * FROM services");
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Nuk mund të lidhem me databazën: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet care</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/services.css">
    <link rel="shortcut icon" href="../assets/Favicon.ico" type="image/x-icon">
</head>
<body>
    <header class="header">
        <a href="../index.php" class="logo"><i class="fas fa-paw"></i>Pet<span>Care</span></a>
        <nav class="navbar">
            <a href="../index.php">Home</a>
            <a href="services.php">Services</a>
            <a href="pricing.php">Pricing</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
        </nav>
    </header>

    <section class="services">
        <h1 class="heading">Our Services</h1>
        <div class="box-container">
            <?php foreach ($services as $service): ?>
            <div class="box">
              <i class="<?= htmlspecialchars($service['icon']) ?>"></i>
              <h3><?= htmlspecialchars($service['name']) ?></h3>
              <p><?= htmlspecialchars($service['description']) ?></p>
              <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
            </div>  
            <?php endforeach; ?>
         </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
           <h3><i class="fas fa-paw"></i>Pet<span>Care</span></h3> 
           <p>PetCare is a pet caring shop, where we provide facilities and various useful treatments. We offer Massage, a good ground, expert staff, good facilities and much more! Visit us anytime.</p>
        </div>
    </footer>
    <div class="footer-bottom">
       <p>2023 - Pet Care</p>
    </div>
</body>
</html>
