<?php

declare(strict_types=1);

?>
<section class="section fin-sim" aria-label="Simula tu crédito" data-fin-sim>
  <div class="container">
    <header class="fin-sim__header">
      <h2 class="fin-sim__title">SIMULA TU CRÉDITO AHORA</h2>
    </header>

    <div class="fin-sim__grid">
      <div class="fin-sim__copy">
        <p class="fin-sim__lead">
          En Altera FINANCE tienes crédito de calidad, con las tasas más bajas, plazos más largos y cuotas que se ajustan a tu bolsillo.
          En minutos simulas, en unos días tu dinero está en la cuenta.
        </p>

        <p class="fin-sim__award">Ganamos el 8G-2023 de Innovate Startup PERU</p>
      </div>

      <div class="fin-sim__card" aria-label="Simulador">
        <figure class="fin-sim__badge" aria-label="Financiamiento">
          <img
            class="fin-sim__badgeImg"
            src="<?php echo htmlspecialchars(app_url('assets/Logo_financiamiento.avif')); ?>"
            alt="Altera Finance"
            loading="lazy"
            decoding="async"
          />
        </figure>

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

<!-- Sección: En 4 sencillos pasos -->
<section class="section fin-steps" aria-label="En 4 sencillos pasos">
  <h2 class="fin-steps__title">Lo hacemos en 4 simples pasos</h2>

  <div class="fin-steps__wrapper">
    <!-- Columna Izquierda: Intro -->
    <div class="fin-steps__intro">
      <p class="fin-steps__introText">
        Altera Finance es la plataforma de préstamos garantizados más grande de Perú donde recibes un préstamo de calidad con tasas y cuotas que caben en tu bolsillo.
      </p>
      
      <div class="fin-steps__introImages">
        <figure class="fin-steps__figure">
          <img
            src="<?php echo htmlspecialchars(app_url('assets/partners/girl-smiling.avif')); ?>"
            alt="Niña sonriente"
            loading="lazy"
            decoding="async"
            class="fin-steps__img"
          />
        </figure>
        <figure class="fin-steps__figure">
          <img
            src="<?php echo htmlspecialchars(app_url('assets/partners/man-smiling.avif')); ?>"
            alt="Retrato de hombre sonriente"
            loading="lazy"
            decoding="async"
            class="fin-steps__img"
          />
        </figure>
      </div>

    </div>

    <!-- Columna Derecha: Pasos -->
    <div class="fin-steps__stepsContainer">
      <div class="fin-steps__grid">
        <div class="fin-steps__step">
          <div class="fin-steps__stepNumber">1</div>
          <h3 class="fin-steps__stepTitle">Solicita tu préstamo</h3>
          <p class="fin-steps__stepText">Completa y enviado tu solicitud en minutos con tu información básica para recibir una oferta personalizada en poco tiempo.</p>
        </div>

        <div class="fin-steps__step">
          <div class="fin-steps__stepNumber">2</div>
          <h3 class="fin-steps__stepTitle">Recibe tu propuesta</h3>
          <p class="fin-steps__stepText">En pocas horas, nuestro equipo te presentará una propuesta de financiamiento con términos adaptados a tus necesidades.</p>
        </div>

        <div class="fin-steps__step">
          <div class="fin-steps__stepNumber">3</div>
          <h3 class="fin-steps__stepTitle">Etapa de aprobación</h3>
          <p class="fin-steps__stepText">Una vez que aceptes la propuesta, validamos y aprobamos tu solicitud en aprox. 10 días, asegurándonos de todos los detalles para tu tranquilidad.</p>
        </div>

        <div class="fin-steps__step">
          <div class="fin-steps__stepNumber">4</div>
          <h3 class="fin-steps__stepTitle">Desembolso</h3>
          <p class="fin-steps__stepText">Con estos simples pasos completados, firmaremos el contrato y desembolsaremos el préstamo directamente tu cuenta bancaria.</p>
        </div>
      </div>
      <div class="fin-steps__ctaWrap">
        <a href="#" class="btn btn--primary fin-steps__ctaBtn">Solicitar Ahora <span class="btn__icon" aria-hidden="true">→</span></a>
      </div>
    </div>
  </div>
</section>

<!-- Sección: Alanna y Savi App -->
<section class="section fin-apps" aria-label="Alanna y Savi App">
  <div class="container">
    <header class="fin-apps__header">
      <p class="fin-apps__count">2</p>
      <h2 class="fin-apps__title">Descubre Alanna y Savi App</h2>
      <p class="fin-apps__subtitle">Tus compañeros de bienestar Financiero Todo en UNO</p>
    </header>

    <div class="fin-apps__grid">
      <article class="fin-apps__card" aria-label="Alanna App">
        <h3 class="fin-apps__cardTitle">ALANNA APP</h3>
      </article>
      <article class="fin-apps__card" aria-label="Savi App">
        <h3 class="fin-apps__cardTitle">SAVI APP</h3>
      </article>
    </div>

    <p class="fin-apps__testimonialsTitle">Lo que dicen nuestros clientes</p>
  </div>
</section>

<!-- Sección: Preguntas frecuentes -->
<section class="section fin-faq" aria-label="Preguntas frecuentes">
  <div class="container">
    <header class="fin-faq__header">
      <h2 class="fin-faq__title">Preguntas frecuentes</h2>
    </header>

    <div class="fin-faq__list">
      <details class="fin-faq__item">
        <summary class="fin-faq__question">¿Qué es Altera FINANCE?</summary>
        <div class="fin-faq__answer">
          <p>Altera es una compania autorizada de financiamiento para negocios. Facilitamos prestamos con garantia desde S/20,000 y plazos de hasta 60 meses y cumplimos con todos los requerimientos de la SBS y la SMV, asegurando seguridad y transparencia en cada paso.</p>
        </div>
      </details>

      <details class="fin-faq__item">
        <summary class="fin-faq__question">¿Cómo funciona el financiamiento?</summary>
        <div class="fin-faq__answer">
          <p>¡Es muy fácil! Solicita tu prestamo en nuestra plataforma desde cualquier ciudad del Peru y desde cualquier dispositivo. Recibiras una propuesta y, una vez aprobada, el dinero se desembolsara en aproximadamente 10 dias. Nos encargamos de que todo el proceso sea sencillo y seguro para tu tranquilidad.</p>
        </div>
      </details>

      <details class="fin-faq__item">
        <summary class="fin-faq__question">¿Cuáles son los requisitos?</summary>
        <div class="fin-faq__answer">
          <p>Los requisitos son muy sencillos. Necesitas tener un inmueble en cualquier ciudad del pais, que este correctamente inscrito en registros publicos. Tambien debes contar con algun sustento de ingresos, tu DNI, una copia literal de la garantia inmobiliaria, el autovaluo y una tasacion. Si no tienes la tasacion, ¡no te preocupes, nosotros te ayudamos a obtenerla!</p>
        </div>
      </details>

      <details class="fin-faq__item">
        <summary class="fin-faq__question">¿Cual es el costo de solicitar un prestamo?</summary>
        <div class="fin-faq__answer">
          <p>Los componentes del credito son: el interes por el dinero solicitado, la comision de Altera, el seguro del solicitante que garantiza el repago del credito en situaciones extremas, los gastos de otorgamiento e impuestos aplicables.</p>
        </div>
      </details>
    </div>
  </div>
</section>

<!-- Seccion: Solicita informacion de financiamiento -->
<section class="section fin-contact" aria-label="Solicita informacion de financiamiento">
  <div class="container">
    <header class="fin-contact__header">
      <h2 class="fin-contact__title">SOLICITA INFORMACION DE FINANCIAMIENTO</h2>
      <p class="fin-contact__lead">¿Tienes dificultades para acceder a un prestamo para lograr tus metas?</p>
      <p class="fin-contact__leadStrong">¡En Altera podemos ayudarte con un financiamiento acorde a tu bolsillo!</p>
    </header>

    <div class="fin-contact__grid">
      <div class="fin-contact__info">
        <ul class="fin-contact__list">
          <li><strong>Para Pymes</strong> desde S/30 000</li>
          <li><strong>Para Personas</strong> desde S/20 000</li>
          <li>Solo necesita una garantia hipotecaria</li>
        </ul>

        <div class="fin-contact__highlight">UNA PROPIEDAD ES UNA OPORTUNIDAD</div>
      </div>

      <div class="fin-contact__actions">
        <div class="fin-contact__card">
          <span class="fin-contact__label">Llama ahora</span>
          <a class="fin-contact__value" href="tel:+51924786269">+51 924 786 269</a>
        </div>
        <div class="fin-contact__card">
          <span class="fin-contact__label">Escribe ahora</span>
          <a class="fin-contact__value" href="mailto:financiamiento@altera.com.pe">financiamiento@altera.com.pe</a>
        </div>
        <div class="fin-contact__card">
          <span class="fin-contact__label">Whatsaap ALTERA</span>
          <span class="fin-contact__value">Atencion Humana</span>
          <span class="fin-contact__hours">Lun - Vie 9:00 am - 5:00 pm</span>
          <span class="fin-contact__hours">Sabados 9:00 am - 1:00 pm</span>
        </div>
      </div>
    </div>
  </div>
</section>
