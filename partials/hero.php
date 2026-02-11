<?php

declare(strict_types=1);

require_once __DIR__ . '/app.php';

$heroAriaLabel = $heroAriaLabel ?? 'Financiamiento';
$heroTitle = $heroTitle ?? 'FINANCIAMIENTO CON TASA BAJA Y ACORDE A TU BOLSILLO';
$heroLeadHtml = $heroLeadHtml
  ?? 'Solo debes contar con una <strong>GARANTÍA HIPOTECARIA</strong> y comienza a <strong>CRECER</strong>';

$ctaHref = $heroCtaHref ?? app_url('financiamiento/');
$ctaLabel = $heroCtaLabel ?? 'QUIERO UN PRESTAMO';
$ctaTarget = $heroCtaTarget ?? '_self';
$ctaRel = $heroCtaRel ?? '';

?>
<section class="hero" aria-label="<?php echo htmlspecialchars($heroAriaLabel); ?>">
  <div class="hero__bg" aria-hidden="true">
    <video class="hero__video" autoplay muted loop playsinline preload="auto"
      poster="https://static.wixstatic.com/media/83d22d_2e72cd3edba44699b8774ee3334d7dd9f000.jpg/v1/fill/w_1600,h_900,al_c,q_80/83d22d_2e72cd3edba44699b8774ee3334d7dd9f000.jpg">
      <source src="https://video.wixstatic.com/video/83d22d_2e72cd3edba44699b8774ee3334d7dd9/1080p/mp4/file.mp4" type="video/mp4" />
    </video>
    <div class="hero__overlay"></div>
  </div>

  <div class="container hero__content">
    <h1><?php echo htmlspecialchars($heroTitle); ?></h1>
    <p><?php echo $heroLeadHtml; ?></p>

    <div class="actions">
      <a
        class="btn btn--primary"
        href="<?php echo htmlspecialchars($ctaHref); ?>"
        target="<?php echo htmlspecialchars($ctaTarget); ?>"
        <?php if ($ctaRel !== ''): ?>rel="<?php echo htmlspecialchars($ctaRel); ?>"<?php endif; ?>
      >
        <?php echo htmlspecialchars($ctaLabel); ?>
        <span class="btn__icon" aria-hidden="true">→</span>
      </a>
    </div>
  </div>

  <a class="wa-fab" href="https://wa.me/51924786269" target="_blank" rel="noreferrer noopener" aria-label="WhatsApp">
  </a>
</section>
