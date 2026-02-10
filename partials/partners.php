<?php

declare(strict_types=1);

$partnerLogos = [
  './assets/partners/83d22d_c4dd13cc583d4175911a3600b644b3a9~mv2.png',
  './assets/partners/83d22d_c272050f5c054f5dbb8406e37cca2529~mv2.png',
  './assets/partners/83d22d_3f97e8ccc6e34c09a2a7e7883c04dbb6~mv2.png',
  './assets/partners/83d22d_87c56f3e97e4480aa5be5c3ade033c09~mv2.png',
  './assets/partners/83d22d_b5c1b7203d574161ace1418766e0c8c9~mv2.png',
  './assets/partners/83d22d_d57c665c824e4f368b8bbe695d471355~mv2.png',
  './assets/partners/83d22d_3c99d2cb2b374880add1740383e2abe8~mv2.png',
  './assets/partners/83d22d_de26233508e145759c4130f8171f96a6~mv2.png',
  './assets/partners/83d22d_8220f22eaf5d4e84ba76c09a7f4d4ef5~mv2.png',
  './assets/partners/83d22d_26a37d39822b4b8db2d8577cde361dcb~mv2.png',
  './assets/partners/83d22d_0a7dc8370d4e4e2da7e8930ef8aa5c37~mv2.png',
  './assets/partners/83d22d_d39e5aed9ff44880bb53dddccb486b60~mv2.png',
  './assets/partners/83d22d_95978bbccf4449068dc9d3cde67fb858~mv2.png',
];

?>

<section class="section partners" aria-label="Colaborando con organizaciones LIDERES">
  <div class="container">
    <div class="section__header">
      <h2 class="section__title">Colaborando con organizaciones LIDERES</h2>
    </div>

    <div class="impact__marquee impact__marquee--left partners__marquee" role="presentation">
      <div class="impact__track" aria-label="Logos de aliados">
        <div class="impact__group">
          <?php foreach ($partnerLogos as $src): ?>
            <span class="partners__logoUnit" aria-hidden="true">
              <img class="partners__logo" src="<?= htmlspecialchars($src, ENT_QUOTES, 'UTF-8') ?>" alt="" loading="eager" decoding="async" />
            </span>
          <?php endforeach; ?>
        </div>
        <div class="impact__group" aria-hidden="true">
          <?php foreach ($partnerLogos as $src): ?>
            <span class="partners__logoUnit">
              <img class="partners__logo" src="<?= htmlspecialchars($src, ENT_QUOTES, 'UTF-8') ?>" alt="" loading="eager" decoding="async" />
            </span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
