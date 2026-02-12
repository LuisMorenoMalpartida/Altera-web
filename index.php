<?php

declare(strict_types=1);

?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Altera (sin Wix)</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/styles.css?v=20260212" />
</head>
<body>
  <div class="app">
    <?php require __DIR__ . '/partials/header.php'; ?>

    <main id="app-main" class="main" role="main">
      <?php require __DIR__ . '/partials/hero.php'; ?>
      <?php require __DIR__ . '/partials/why.php'; ?>
      <?php require __DIR__ . '/partials/goals.php'; ?>
      <?php require __DIR__ . '/partials/impact.php'; ?>
      <?php require __DIR__ . '/partials/testimonials.php'; ?>
      <?php require __DIR__ . '/partials/partners.php'; ?>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>
  </div>

  <script type="module" src="./js/main.js"></script>
</body>
</html>
