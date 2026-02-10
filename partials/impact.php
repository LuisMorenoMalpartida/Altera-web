<?php

declare(strict_types=1);

$line1 = 'Nuestro impacto';
$line2 = 'en cifras';

$repeat = 10;

?>
<section class="section impact" aria-label="Nuestro impacto en cifras">
  <div class="container">
    <div class="impact__marquee impact__marquee--left" role="presentation">
      <div class="impact__track" aria-label="<?= htmlspecialchars($line1, ENT_QUOTES, 'UTF-8') ?>">
        <div class="impact__group">
          <?php for ($i = 0; $i < $repeat; $i++): ?>
            <span class="impact__unit"><?= htmlspecialchars($line1, ENT_QUOTES, 'UTF-8') ?></span>
          <?php endfor; ?>
        </div>
        <div class="impact__group" aria-hidden="true">
          <?php for ($i = 0; $i < $repeat; $i++): ?>
            <span class="impact__unit"><?= htmlspecialchars($line1, ENT_QUOTES, 'UTF-8') ?></span>
          <?php endfor; ?>
        </div>
      </div>
    </div>

    <div class="impact__marquee impact__marquee--right" role="presentation">
      <div class="impact__track" aria-label="<?= htmlspecialchars($line2, ENT_QUOTES, 'UTF-8') ?>">
        <div class="impact__group">
          <?php for ($i = 0; $i < $repeat; $i++): ?>
            <span class="impact__unit"><?= htmlspecialchars($line2, ENT_QUOTES, 'UTF-8') ?></span>
          <?php endfor; ?>
        </div>
        <div class="impact__group" aria-hidden="true">
          <?php for ($i = 0; $i < $repeat; $i++): ?>
            <span class="impact__unit"><?= htmlspecialchars($line2, ENT_QUOTES, 'UTF-8') ?></span>
          <?php endfor; ?>
        </div>
      </div>
    </div>

    <div class="impact__facts" aria-label="Hechos y números">
      <h2 class="impact__factsTitle">Hechos &amp; Números</h2>

      <div class="impact__stats" role="list">
        <div class="card impact__stat" role="listitem">
          <div class="impact__statValue">+16k</div>
          <div class="impact__statLabel">Emprendedores financiados</div>
        </div>

        <div class="card impact__stat" role="listitem">
          <div class="impact__statValue">+561mll</div>
          <div class="impact__statLabel">Fondos invertidos<br />Desde el mercado de capitales</div>
        </div>

        <div class="card impact__stat" role="listitem">
          <div class="impact__statValue">+503mll</div>
          <div class="impact__statLabel">Financiamiento otorgado<br />Utilizado para diversos objetivos</div>
        </div>

        <div class="card impact__stat" role="listitem">
          <div class="impact__statValue">+71mll</div>
          <div class="impact__statLabel">Valor economizado<br />Ahorro de interés desde el 2019</div>
        </div>
      </div>

      <div class="card impact__note">
        <p class="impact__noteText">
          Su propiedad garantiza mejores condiciones. Tasas desde 0.99% TEM y hasta 90 días para comenzar a pagar.
          Puedes pedir desde S/20,000 soles hasta S/5MLL con cuotas que caben en tu bolsillo.
        </p>
      </div>

      <div class="impact__rates" aria-label="Comparación de tasas">
        <div class="card impact__rate impact__rate--primary">
          <div class="impact__rateName">Altera FINANCE</div>
          <div class="impact__rateValue">+0.99%</div>
          <div class="impact__rateMeta">TEM: Tasa de Interés Mensual</div>
        </div>

        <div class="card impact__rate">
          <div class="impact__rateName">Banca Tradicional</div>
          <div class="impact__rateValue">+2.09%</div>
          <div class="impact__rateMeta">TEM: Tasa de Interés Mensual</div>
        </div>

        <div class="card impact__rate">
          <div class="impact__rateName">Financieras</div>
          <div class="impact__rateValue">+3.50%</div>
          <div class="impact__rateMeta">TEM: Tasa de Interés Mensual</div>
        </div>

        <div class="card impact__rate">
          <div class="impact__rateName">Entidad no bancaria</div>
          <div class="impact__rateValue">+7.01%</div>
          <div class="impact__rateMeta">TEM: Tasa de Interés Mensual</div>
        </div>
      </div>

      <div class="impact__afterRates" aria-label="Equilibre hoy, asegure mañana, prospere siempre">
        <div class="card impact__afterCard impact__afterCard--image">
          <img class="impact__afterImg" src="./assets/imagen.jpg" alt="Chica" loading="lazy" decoding="async" />
        </div>

        <div class="card impact__afterCard impact__afterCard--copy">
          <p class="impact__afterCopy">
            <span class="impact__afterStrong">Equilibre</span> hoy,
            <span class="impact__afterMuted">Asegure</span> mañana,
            <span class="impact__afterStrong">Prospere</span>
            <span class="impact__afterMuted">siempre</span>
          </p>

          <svg class="impact__afterCurve" viewBox="-10 80 220 55" aria-hidden="true" focusable="false">
            <path d="M153.404 91.262c12.325-.167 24.828-.159 37.2.774a1.5 1.5 0 1 1-.226 2.991c-12.233-.922-24.627-.932-36.933-.765-35.173.477-70.298 2.998-105.22 7.253 18.618-1.343 37.261-2.06 55.917-2.427q4.577-.092 9.201-.197c23.04-.515 46.824-1.047 69.736 1.965.396.052.735.107 1.003.169a4 4 0 0 1 .434.129l.006.003c.089.034.445.17.724.508.179.218.389.602.348 1.106a1.55 1.55 0 0 1-.449.968c-.273.274-.589.384-.677.415l-.004.001a4.6 4.0 0 0 1-.801.179c-1.043.156-3.027.277-5.287.382-2.111.097-4.501.181-6.767.261-2.71.096-5.242.185-6.904.283-10.282.605-20.556 1.36-30.842 2.116l-1.267.093c-10.705.787-21.424 1.567-32.156 2.172-.463.026-1.232.119-2.249.243l-.171.021c-1.07.13-2.34.282-3.62.389-1.274.108-2.599.174-3.777.126-1.117-.046-2.34-.2-3.25-.695-.278-.15-.974-.571-1.11-1.433-.154-.968.511-1.567.75-1.754.305-.238.667-.409.965-.532.32-.132.676-.253 1.034-.364.566-.174 1.21-.345 1.806-.504l.437-.117c.751-.202 1.337-.371 1.695-.517a1.5 1.5 0 1 1 1.136 2.776l-.094.038.157-.013a95 95 0 0 0 3.508-.378l.24-.029c.946-.116 1.808-.221 2.374-.253 10.703-.602 21.398-1.381 32.106-2.168l1.274-.094c10.28-.755 20.573-1.512 30.877-2.118.343-.02.726-.04 1.141-.059-17.304-1.096-34.911-.703-52.252-.316-3.082.069-6.155.138-9.216.198-22.48.44-44.916 1.393-67.297 3.335-3.218.279-6.473.624-9.746.97-5.327.564-10.7 1.133-16.034 1.432-.212.012-1.212.01-1.886-.09a3 3 0 0 1-.678-.175 1.7 1.7 0 0 1-.641-.453 1.56 1.56 0 0 1-.26-1.634 1.7 1.7 0 0 1 .631-.74c.155-.101.31-.171.43-.219.245-.099.545-.187.882-.27 3.581-.886 12.182-2.209 14.218-2.503 42.916-6.203 86.208-9.89 129.584-10.479M88.806 107.09c-.05-.027-.039-.028 .002.001zm-78.973.21" />
          </svg>

          <p class="impact__afterDesc">¡¡Dile hola al futuro de los servicios financieros con Altera FINANCE, toma el control de tu futuro y haz de tu vida financiera MÁS SIMPLE!!</p>
        </div>
      </div>
    </div>
  </div>
</section>
