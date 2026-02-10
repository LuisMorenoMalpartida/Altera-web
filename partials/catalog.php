<?php

declare(strict_types=1);

?>
<section class="section">
  <div class="container">
    <h2 class="section__title">Catálogo (demo con paginación)</h2>

    <div id="catalog-grid" class="grid" aria-live="polite"></div>

    <div class="card pagination" aria-label="Paginación">
      <div class="pagination__meta" id="pagination-meta">Cargando…</div>
      <div class="pagination__controls">
        <button class="btn" type="button" id="btn-prev">Anterior</button>
        <button class="btn" type="button" id="btn-next">Siguiente</button>
      </div>
    </div>
  </div>
</section>
