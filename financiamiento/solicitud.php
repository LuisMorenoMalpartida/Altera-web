<?php
// financiamiento-solicitud.php (partial)
?>
<section class="section fin-solicitud" aria-label="Solicitud de financiamiento">
  <div class="container">
    <header class="fin-solicitud__header">
      <h2 class="fin-solicitud__title">Comencemos</h2>
      <p class="fin-solicitud__lead">Realiza tu solicitud a un financiamiento con <strong>Alana IA</strong>.</p>
    </header>

    <div class="fin-solicitud__content">
      <div class="fin-solicitud__block">
        <h3 class="fin-solicitud__subtitle">Requisitos para personas naturales con negocio</h3>
        <ul class="fin-solicitud__list">
          <li>DNI del propietario del negocio</li>
          <li>Recibo de luz o agua de la vivienda</li>
          <li>Recibo de luz o agua del negocio</li>
          <li>Reporte tributario de terceros actualizado.</li>
          <li>Documentos que acrediten el funcionamiento del negocio: Boletas de compra o venta, o RUC o Licencias, registro de gastos e ingresos del negocio, entre otros.</li>
          <li>Si tienes experiencia en el sistema financiero: comprobantes de pago y/o cronogramas de pago de tus deudas vigentes.</li>
          <li>Copia Literal del inmueble para garantia y autovaluo PU-HR</li>
          <li>Si el inmueble es de un garante, presentar el DNI de los propietarios.</li>
        </ul>
      </div>

      <div class="fin-solicitud__block">
        <h3 class="fin-solicitud__subtitle">Requisitos para personas jurídicas</h3>
        <ul class="fin-solicitud__list">
          <li>DNI de los socios y del representante legal apoderado y avales.</li>
          <li>Vigencia de poderes actualizada con antigüedad no mayor a 8 días (Debe incluir el poder para firma de fideicomisos).</li>
          <li>Reporte tributario de terceros actualizado y en algunos casos estados financieros con corte DIC 2024</li>
          <li>Copia Literal de la empresa</li>
          <li>Flujo de caja proyectado.</li>
          <li>Copia Literal del inmueble para garantía y autoevalúo PU-HR</li>
          <li>Resumen ejecutivo de la empresa y destino de los fondos a financiar (Planeamiento financiero).</li>
          <li>Tasación de garantia inmobiliaria. De no contar con uno se podrá gestionar dicho documento que es necesario para determinar el valor máximo de financiamiento.</li>
          <li>Si tienes experiencia en el sistema financiero: comprobantes de pago y/o cronogramas de pago de tus deudas vigentes.</li>
        </ul>
      </div>

      <p class="fin-solicitud__note">
        Si no cuentas con los requisitos puedes enviarlas después de completar esta solicitud al email de 
        <a href="mailto:financiamiento@altera.com.pe">financiamiento@altera.com.pe</a>
      </p>
    </div>

    <!-- Sección del Video IA -->
    <div class="fin-solicitud__video-container" style="margin-top: 50px; background: #f9f9f9; padding: 20px; border-radius: 10px;">
      <h3 style="text-align: center; margin-bottom: 20px;">Habla con Alana IA</h3>
      
      <div class="fin-solicitud__video-wrapper" style="position: relative; width: 100%; max-width: 600px; height: 400px; margin: 0 auto; background: #000; border-radius: 8px; overflow: hidden;">
        <video id="alana-video" autoplay playsinline style="width: 100%; height: 100%; object-fit: cover;"></video>
        <div id="alana-status" style="position: absolute; top: 10px; left: 10px; color: white; background: rgba(0,0,0,0.6); padding: 5px 10px; border-radius: 4px; font-size: 14px;">Haz clic en "Iniciar"</div>
      </div>

      <div class="fin-solicitud__controls" style="max-width: 600px; margin: 20px auto; display: flex; gap: 10px; flex-wrap: wrap;">
        <button id="start-alana-btn" class="btn btn--primary">Iniciar Conversación</button>
        <button id="end-alana-btn" class="btn btn--secondary" disabled>Terminar</button>
      </div>

      <div class="fin-solicitud__chat" style="max-width: 600px; margin: 0 auto;">
        <div id="alana-options" style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
          <!-- Aquí se inyectan los botones de opción -->
        </div>
      </div>

      
      <p style="text-align: center; margin-top: 10px; font-size: 0.9em; color: #666;">
        Nota: Debes configurar tu API Key de HeyGen en <code>api/heygen-token.php</code> para que funcione.
      </p>
    </div>

    <!-- Script para Alana IA -->
    <script type="module" src="/Altera/js/features/financiamiento/alanaAvatar.js"></script>

  </div>
</section>
