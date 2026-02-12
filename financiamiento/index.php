<?php

declare(strict_types=1);

require_once __DIR__ . '/../partials/app.php';

$heroAriaLabel = 'Financiamiento';
$heroTitle = 'FINANCIAMIENTO';
$heroLeadHtml = 'Préstamos con <strong>garantía hipotecaria</strong>, evaluación humana y una experiencia digital ágil para ayudarte a crecer.';

$heroCtaHref = 'https://www.altera.com.pe/solicituddefinanciamiento';
$heroCtaLabel = 'SOLICITAR FINANCIAMIENTO';
$heroCtaTarget = '_blank';
$heroCtaRel = 'noreferrer noopener';

?><!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Financiamiento | Altera</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo htmlspecialchars(app_url('css/styles.css')); ?>" />
  <link rel="stylesheet" href="<?php echo htmlspecialchars(app_url('css/17-simulator.css?v=20260211')); ?>" />
</head>
<body>
  <div class="app">
    <?php require __DIR__ . '/../partials/header.php'; ?>

    <main id="app-main" class="main" role="main">
      <?php
        if (isset($_GET['view']) && $_GET['view'] === 'solicitud') {
          include __DIR__ . '/solicitud.php';
        } else {
          require __DIR__ . '/../partials/hero.php';
          require __DIR__ . '/../partials/financiamiento-simulator.php';
        }
      ?>
    </main>

    <?php require __DIR__ . '/../partials/footer.php'; ?>
  </div>

  <script type="module" src="<?php echo htmlspecialchars(app_url('js/main.js')); ?>"></script>
  <script type="module">
    import { initFinanciamientoSimulator } from <?php echo json_encode(app_url('js/features/financiamiento/simulator.js?v=20260211')); ?>;
    initFinanciamientoSimulator();
  </script>
</body>
</html>
