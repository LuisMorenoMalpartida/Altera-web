<?php

declare(strict_types=1);

?>
<header class="site-header">
  <div class="container site-header__row">
    <a class="brand" href="./" aria-label="Inicio">
      <img
        class="brand__logo"
        src="https://static.wixstatic.com/media/83d22d_9c8c1dbd9a56459cab6abeedd82335ef~mv2.png/v1/fill/w_220,h_138,al_c,q_85/Logo%20ALTERA_edited.png"
        alt="Altera"
        decoding="async"
        loading="eager"
      />
      <img
        class="brand__logo brand__logo--side"
        src="./assets/logo2.avif"
        alt=""
        aria-hidden="true"
        decoding="async"
        loading="eager"
      />
    </a>

    <nav class="nav nav--desktop" aria-label="Sitio">
      <a href="https://www.altera.com.pe/financiamiento" target="_self">FINANCIAMIENTO</a>
      <a href="https://www.altera.com.pe/inversiones" target="_self">INVERSIONES</a>
      <a href="https://www.altera.com.pe/programadereferidos" target="_self">CashCLICK</a>
      <a href="https://www.altera.com.pe/fintegra" target="_self">Altera360°</a>
    </nav>

    <button
      class="hamburger"
      type="button"
      aria-label="Menu"
      aria-expanded="false"
      aria-controls="mobile-menu"
      data-menu-open
    >
      <span class="hamburger__bars" aria-hidden="true"></span>
      </button>
    </div>
</header>

<div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="Navegación del sitio" hidden>
  <div class="mobile-menu__backdrop" data-menu-close aria-hidden="true"></div>
  <div class="mobile-menu__panel" role="document">
    <button class="mobile-menu__close" type="button" aria-label="Close" data-menu-close>×</button>

    <nav class="nav nav--mobile" aria-label="Sitio">
      <a href="https://www.altera.com.pe/financiamiento" target="_self">FINANCIAMIENTO</a>
      <a href="https://www.altera.com.pe/inversiones" target="_self">INVERSIONES</a>
      <a href="https://www.altera.com.pe/programadereferidos" target="_self">CashCLICK</a>
      <a href="https://www.altera.com.pe/fintegra" target="_self">Altera360°</a>
    </nav>

    <a class="mobile-menu__home" href="https://www.altera.com.pe" target="_self" aria-label="Altera">
      <img
        class="mobile-menu__logo"
        src="https://static.wixstatic.com/media/83d22d_f3b69ed5f4924cde91a94aa5cddf1990~mv2.png/v1/fill/w_240,h_60,al_c,q_85/50_edited.png"
        alt="Altera"
        decoding="async"
        loading="lazy"
      />
    </a>
  </div>
</div>
