<?php
// Fillimi i sesionit dhe lidhja me databazën
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=fund', 'root', ''); // Përshtateni me të dhënat tuaja

// Marrja e të dhënave të çmimeve nga databaza
$stmt = $pdo->query("SELECT * FROM pricings");
$pricings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petcare</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/services.css">
    <link rel="stylesheet" href="../css/pricing.css">
    <link rel="shortcut icon" href="../assets/Favicon.ico" type="image/jpeg">
</head>
<body>
    <header class="header">
        <!-- Header Content -->
    </header>

    <section class="pricing">
        <h1 class="heading">Our Pricings</h1>
        <div class="pricelist">
            <?php foreach ($pricings as $pricing): ?>
            <div class="columns">
                <h3 class="headers"><?= htmlspecialchars($pricing['package_name']) ?></h3>
                <ul class="price">
                    <li class="grey">$ <?= htmlspecialchars($pricing['price']) ?> / year</li>
                    <?php foreach (explode("\n", $pricing['offers']) as $offer): ?>
                    <li class="offers"><?= htmlspecialchars($offer) ?></li>
                    <?php endforeach; ?>
                    <li class="grey"><a href="<?= htmlspecialchars($pricing['button_url']) ?>" class="button">Buy Now</a></li>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Footer -->
</body>
</html>
