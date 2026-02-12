<?php
require_once __DIR__ . '/../partials/app.php';
$heroAriaLabel = 'Inversiones';
$heroTitle = 'INVIERTE CON GARANTIAS INMOBILIARIAS EN FIDEICOMISOS';
$heroLeadHtml = 'Nuestro vehículo de inversión fue exclusivo de banca corporativa y de inversión y gracias a Altera hoy están disponibles para ti. Regulado por la SBS y la SMV.';
$heroCtaHref = app_url('inversiones/#simulador');
$heroCtaLabel = 'INVIERTE AHORA';
$heroCtaTarget = '_self';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Inversiones | Altera</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/styles.css?v=20260212" />
  <link rel="stylesheet" href="../css/17-simulator.css" />
  <link rel="stylesheet" href="../css/inversiones.css" />
</head>
<body>
  <div class="app">
    <?php require_once __DIR__ . '/../partials/header.php'; ?>
    
    <main id="app-main" class="main" role="main">
      <?php require_once __DIR__ . '/../partials/hero.php'; ?>

      <section class="fin-sim" id="simulador" aria-label="Simulador de inversiones">
        <div class="container">
          <header class="fin-sim__header">
            <h2 class="fin-sim__title">Simula tu inversión</h2>
          </header>
          <div class="fin-sim__grid">
            <div class="fin-sim__copy">
              <p class="fin-sim__lead">En Altera FINANCE tienes una inversión 360º GRADOS. En minutos simula tu inversión con la más robusta estructura de inversión del mercado que contempla todo de INICIO a FIN.</p>
              <p class="fin-sim__award">Ganamos el 8G-2023 de Innovate Startup PERU</p>
            </div>
            
            <div class="fin-sim__card" style="position:relative;">
              <div class="fin-sim__badge">
                <img src="../assets/Logo_financiamiento.avif" alt="Logo Altera inversiones" class="fin-sim__badgeImg" />
              </div>
              <form class="fin-sim__form" onsubmit="event.preventDefault(); calcularInversion();">
                <div class="fin-sim__cardHeader">
                  <h3 class="fin-sim__cardTitle">Datos de tu inversión</h3>
                  <p class="fin-sim__cardSubtitle">Completa los campos para simular tu rendimiento</p>
                </div>
                <div class="fin-sim__progress">
                  <div class="fin-sim__progressTrack">
                    <div class="fin-sim__progressBar" id="progress-bar">0%</div>
                  </div>
                </div>
                <div class="fin-sim__field">
                  <label for="moneda">Moneda <span style="color:#FF6B35">*</span></label>
                  <select id="moneda" name="moneda" onchange="actualizarProgreso()">
                    <option value="">Selecciona</option>
                    <option value="soles">Soles (S/)</option>
                    <option value="dolares">Dólares ($)</option>
                  </select>
                </div>
                <div class="fin-sim__field">
                  <label for="monto">Monto a invertir <span style="color:#FF6B35">*</span></label>
                  <input type="number" id="monto" name="monto" min="30000" placeholder="Mínimo 30,000" onchange="actualizarProgreso()">
                </div>
                <div class="fin-sim__field">
                  <label for="riesgo">Nivel de riesgo <span style="color:#FF6B35">*</span></label>
                  <select id="riesgo" name="riesgo" onchange="actualizarProgreso()">
                    <option value="">Selecciona</option>
                    <option value="AA">AA</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                  </select>
                </div>
                <div class="fin-sim__field">
                  <label for="plazo">Plazo (meses) <span style="color:#FF6B35">*</span></label>
                  <input type="number" id="plazo" name="plazo" min="1" max="60" placeholder="Ej: 12" onchange="actualizarProgreso()">
                </div>
                <button type="submit" class="fin-sim__submit btn btn--primary">
                  <span style="font-size:18px;">Simular inversión</span>
                  <span class="btn__icon" aria-hidden="true">→</span>
                </button>
                <div id="resultado" class="fin-sim__result"></div>
              </form>
            </div>
          </div>
        </div>
      </main>

      <section class="investment-focus" aria-label="Enfoque de Inversión">
        <div class="investment-focus__container">
          <div class="investment-focus__layout">
            
            <div class="investment-focus__left">
              <h2 class="investment-focus__title">Enfoque de Inversión</h2>
              <div class="investment-focus__textblock">
                <p class="investment-focus__text">
                  Las pequeñas y medianas empresas (PYMEs) constituyen un pilar fundamental de la economía peruana, representando más del 60% del empleo total y un porcentaje significativo del PIB. Sin embargo, el acceso al financiamiento sigue siendo uno de los mayores retos que enfrentan estas empresas.
                </p>
                <p class="investment-focus__text">
                  La inversión en el financiamiento de PYMEs a través de una plataforma Fintech en Perú ofrece un potencial considerable para rendimientos ajustados al riesgo atractivos, al tiempo que contribuye al desarrollo económico del país.
                </p>
              </div>
            </div>

            <div class="investment-focus__right">
              <img src="../assets/1.avif" alt="Inversión 1" class="investment-focus__image investment-focus__image--1" />
              <img src="../assets/111.avif" alt="Inversión 2" class="investment-focus__image investment-focus__image--2" />
            </div>

          </div>
        </div>
      </section>

    <?php require_once __DIR__ . '/../partials/footer.php'; ?>
  </div>

  <script>
    function actualizarProgreso() {
      let progreso = 0;
      if (document.getElementById('moneda').value) progreso += 25;
      if (document.getElementById('monto').value) progreso += 25;
      if (document.getElementById('riesgo').value) progreso += 25;
      if (document.getElementById('plazo').value) progreso += 25;
      const progressBar = document.getElementById('progress-bar');
      progressBar.style.width = progreso + '%';
      progressBar.innerText = progreso + '%';
    }

    function obtenerTasaPorRiesgo(riesgo, moneda) {
      const tasasSoles = { "AA": 14.5, "A": 16, "B": 19, "C": 24.5, "D": 33, "E": 39, "F": 44 };
      let tasa = tasasSoles[riesgo] || 0;
      if (moneda === "dolares") { tasa -= 1; }
      return tasa;
    }

    function calcularInversion() {
      const monto = parseFloat(document.getElementById("monto").value);
      const moneda = document.getElementById("moneda").value;
      const riesgo = document.getElementById("riesgo").value;
      const plazo = parseInt(document.getElementById("plazo").value);
      
      if (isNaN(monto) || monto < 30000 || isNaN(plazo) || !riesgo) {
        alert("Por favor, complete todos los campos correctamente.");
        return;
      }

      const tasaAnual = obtenerTasaPorRiesgo(riesgo, moneda);
      const tasaMensual = Math.pow(1 + tasaAnual / 100, 1 / 12) - 1;
      const simboloMoneda = moneda === "soles" ? "S/" : "$";
      
      const montoFinal = monto * Math.pow(1 + tasaMensual, plazo);
      const gananciaIntereses = montoFinal - monto;
      const impuesto = gananciaIntereses * 0.05;
      const gananciaNeta = gananciaIntereses - impuesto;

      document.getElementById("resultado").innerHTML = `
        <div style="margin-top:20px; padding:15px; background:#fff; border-radius:12px; color:#333;">
          <p>TEA: <strong>${tasaAnual.toFixed(2)}%</strong></p>
          <p>Ganancia Neta: <strong>${simboloMoneda}${gananciaNeta.toFixed(2)}</strong></p>
          <p>Total a recibir: <strong>${simboloMoneda}${montoFinal.toFixed(2)}</strong></p>
        </div>
      `;
    }
  </script>
</body>
</html>