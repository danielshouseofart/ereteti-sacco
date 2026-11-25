<?php
$page_title = isset($page_title) ? $page_title : 'FreshBytes';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?> — FreshBytes</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;family=Lora:wght@600;700&amp;display=swap" rel="stylesheet">
  <link rel="icon" href="img/logo-mark.svg" type="image/svg+xml">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <img class="logo" src="img/logo-mark.svg" alt="FreshBytes logo" width="64" height="64">
    <div>
      <h1>FreshBytes</h1>
      <p>Personalised, nutritionist-planned meals, prepared fresh in Nairobi.</p>
    </div>

  <title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?> — Ereteti Dairy Sacco</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="img/favicon-ereteti.png">
</head>
<body>
  <header>
    <h1>
      <img src="img/logo-ereteti.png" alt="Ereteti Dairy Sacco logo" class="logo">
      <?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?>
    </h1>
    <p>Milk collected twice a day, on three routes out of Ngong.</p>
  </header>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="how-it-works.php">How it works</a></li>
      <li><a href="pricing.php">Pricing</a></li>
      <li><a href="faq.php">FAQ</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="routes.php">Routes</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="register.php">Join</a></li>
      <li><a href="deliveries.php">Deliveries</a></li>
    </ul>
  </nav>
