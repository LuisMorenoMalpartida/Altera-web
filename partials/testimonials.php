<?php

declare(strict_types=1);

$testimonials = [
  [
    'quote' => '“Altera nos ayudó a estabilizar nuestras finanzas”',
    'name' => 'Alejandra & Nerio Estrada',
    'image' => './assets/Nerio y esposa.jpg',
    'alt' => 'Nerio y esposa',
  ],
  [
    'quote' => '“La flexibilidad del financiamiento de Altera es mas humana”',
    'name' => 'Martha Talledo',
    'image' => './assets/Martha Talledo one.jpg',
    'alt' => 'Martha Talledo',
  ],
  [
    'quote' => '“Encontre en Altera la seguridad que necesitaba”',
    'name' => 'Santiago del Valle',
    'image' => './assets/Thiago 2.jpg',
    'alt' => 'Santiago del Valle',
  ],
];

?>

<section class="section testimonials" aria-label="Lo que dicen nuestros clientes">
  <div class="container">
    <h2 class="testimonials__title">Lo que dicen nuestros clientes</h2>

    <div class="testimonials__list" role="list">
      <?php foreach ($testimonials as $item): ?>
        <article class="card testimonial" role="listitem">
          <div class="testimonial__copy">
            <blockquote class="testimonial__quote">
              <?= htmlspecialchars($item['quote'], ENT_QUOTES, 'UTF-8') ?>
            </blockquote>
            <div class="testimonial__name">
              <?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?>
            </div>
          </div>

          <div class="testimonial__media" aria-hidden="true">
            <img
              class="testimonial__img"
              src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>"
              alt="<?= htmlspecialchars($item['alt'], ENT_QUOTES, 'UTF-8') ?>"
              loading="lazy"
              decoding="async"
            />
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
