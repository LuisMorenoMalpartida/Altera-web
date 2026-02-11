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
      <?php require __DIR__ . '/../partials/hero.php'; ?>

      <section class="section fin-sim" aria-label="Simula tu crédito" data-fin-sim>
        <div class="container">
          <div class="fin-sim__grid">
            <div class="fin-sim__copy">
              <p class="fin-sim__kicker">Financiamiento con garantía hipotecaria</p>
              <h2 class="fin-sim__title">SIMULA TU CRÉDITO AHORA</h2>
              <p class="fin-sim__lead">
                En Altera FINANCE tienes crédito de calidad, con las tasas más bajas, plazos más largos y cuotas que se ajustan a tu bolsillo.
                En minutos simulas, en unos días tu dinero está en la cuenta.
              </p>

              <figure class="fin-sim__visual" aria-label="Financiamiento">
                <img
                  class="fin-sim__visualImg"
                  src="<?php echo htmlspecialchars(app_url('assets/Logo_financiamiento.avif')); ?>"
                  alt="Financiamiento con garantía hipotecaria"
                  loading="lazy"
                  decoding="async"
                />
              </figure>

              <p class="fin-sim__award">Ganamos el 8G-2023 de Innovate Startup PERU</p>
            </div>

            <div class="fin-sim__card" aria-label="Simulador">
              <header class="fin-sim__cardHeader">
                <h3 class="fin-sim__cardTitle">Calcula tu cuota mensual</h3>
                <p class="fin-sim__cardSubtitle">Completa los datos para ver tu estimación.</p>
              </header>

              <div class="fin-sim__progress" aria-label="Progreso">
                <div class="fin-sim__progressTrack" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                  <div id="progress-bar" class="fin-sim__progressBar" style="width: 0%">0%</div>
                </div>
              </div>

              <form class="fin-sim__form" aria-label="Formulario de simulación">
                <div class="fin-sim__field">
                  <label for="moneda">Seleccione el tipo de moneda:</label>
                  <select id="moneda" required>
                    <option value="" selected disabled>Ej: Dólares</option>
                    <option value="dolares">Dólares</option>
                    <option value="soles">Soles</option>
                  </select>
                </div>

                <div class="fin-sim__field">
                  <label for="monto">Monto del Préstamo:</label>
                  <input id="monto" type="number" inputmode="numeric" min="100" step="1" placeholder="Ej: 100000" required />
                </div>

                <div class="fin-sim__field">
                  <label for="riesgo">Selecciona tu perfil de buen pagador:</label>
                  <select id="riesgo" required>
                    <option value="" selected disabled>Ej: AA (Cliente Excelente)</option>
                    <option value="AA">AA (Cliente Excelente)</option>
                    <option value="A">A (Cliente Ejemplar)</option>
                    <option value="B">B (Cliente Confiable)</option>
                    <option value="C">C (Cliente Regular)</option>
                    <option value="D">D (Cliente Observado)</option>
                    <option value="E">E (Cliente Riesgoso)</option>
                    <option value="F">F (Cliente Crítico)</option>
                  </select>
                </div>

                <div class="fin-sim__field">
                  <label for="plazo">Plazo del Préstamo (meses):</label>
                  <input id="plazo" type="number" inputmode="numeric" min="12" max="120" step="1" placeholder="Ej: 12" required />
                </div>

                <button class="btn btn--primary fin-sim__submit" type="submit">CALCULAR MI PRÉSTAMO <span class="btn__icon" aria-hidden="true">→</span></button>
              </form>

              <div id="resultado" class="fin-sim__result" aria-live="polite"></div>
            </div>
          </div>
        </div>
      </section>

      <section class="section financiamiento" aria-label="Financiamiento">
        <div class="container">
          <header class="section__header">
            <h2 class="section__title">FINANCIAMIENTO</h2>
            <p class="section__lead">
              Te ayudamos a acceder a un préstamo con garantía hipotecaria, con un proceso ágil y condiciones pensadas para tu realidad.
            </p>
          </header>

          <div class="financiamiento__grid" role="list" aria-label="Puntos clave">
            <article class="card financiamiento__card" role="listitem">
              <h3>Requisito principal</h3>
              <p>Contar con una <strong>garantía hipotecaria</strong>.</p>
            </article>

            <article class="card financiamiento__card" role="listitem">
              <h3>Montos</h3>
              <p>Préstamos desde <strong>S/ 20,000</strong> hasta <strong>S/ 5,000,000</strong>.</p>
            </article>

            <article class="card financiamiento__card" role="listitem">
              <h3>Plazos</h3>
              <p>Hasta <strong>10 años</strong> para pagar, según evaluación.</p>
            </article>
          </div>

          <div class="financiamiento__actions">
            <a class="btn btn--primary" href="https://wa.me/51924786269" target="_blank" rel="noreferrer noopener">
              EMPEZAR AHORA
              <span class="btn__icon" aria-hidden="true">→</span>
            </a>
          </div>
        </div>
      </section>
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
