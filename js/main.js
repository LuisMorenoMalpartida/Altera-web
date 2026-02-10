import { CatalogController } from './features/catalog/catalogController.js';

function initMobileMenu() {
  const openButton = document.querySelector('[data-menu-open]');
  const menu = document.getElementById('mobile-menu');
  if (!openButton || !menu) return;

  const closeTargets = menu.querySelectorAll('[data-menu-close]');
  const panel = menu.querySelector('.mobile-menu__panel');
  const focusableSelector = [
    'a[href]',
    'button:not([disabled])',
    'input:not([disabled])',
    'select:not([disabled])',
    'textarea:not([disabled])',
    '[tabindex]:not([tabindex="-1"])',
  ].join(',');

  let lastActiveElement = null;

  const setOpen = (isOpen) => {
    if (isOpen) {
      lastActiveElement = document.activeElement;
      menu.hidden = false;
      openButton.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';

      const firstFocusable = menu.querySelector(focusableSelector);
      if (firstFocusable) firstFocusable.focus();
    } else {
      menu.hidden = true;
      openButton.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';

      if (lastActiveElement && typeof lastActiveElement.focus === 'function') {
        lastActiveElement.focus();
      } else {
        openButton.focus();
      }
      lastActiveElement = null;
    }
  };

  const isOpen = () => !menu.hidden;

  openButton.addEventListener('click', () => setOpen(true));
  closeTargets.forEach((el) => el.addEventListener('click', () => setOpen(false)));

  document.addEventListener('keydown', (e) => {
    if (!isOpen()) return;

    if (e.key === 'Escape') {
      e.preventDefault();
      setOpen(false);
      return;
    }

    if (e.key === 'Tab') {
      const focusables = Array.from(menu.querySelectorAll(focusableSelector)).filter(
        (el) => el.offsetParent !== null,
      );
      if (focusables.length === 0) return;

      const first = focusables[0];
      const last = focusables[focusables.length - 1];
      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    }
  });

  // Close when clicking outside the panel (defensive; backdrop already does this)
  menu.addEventListener('click', (e) => {
    if (!panel) return;
    if (e.target === menu) setOpen(false);
  });
}

async function bootstrap() {
  const gridEl = document.getElementById('catalog-grid');
  const metaEl = document.getElementById('pagination-meta');
  const prevBtn = document.getElementById('btn-prev');
  const nextBtn = document.getElementById('btn-next');

  if (!gridEl || !metaEl || !prevBtn || !nextBtn) return;

  const controller = new CatalogController();
  await controller.mount({ gridEl, metaEl, prevBtn, nextBtn });
}

function initWhyCarouselWheel() {
  const section = document.querySelector('.why');
  const carousel = section?.querySelector('[data-why-carousel]');
  const viewport = section?.querySelector('[data-why-viewport]');
  const track = section?.querySelector('[data-why-track]');
  if (!section || !carousel || !viewport || !track) return;

  const reducedMotion = window.matchMedia?.('(prefers-reduced-motion: reduce)')?.matches;
  if (reducedMotion) return;

  const mq = window.matchMedia('(min-width: 901px)');
  let wheelAccum = 0;
  let isAnimating = false;
  let animTimer = 0;
  let activeIndex = 0;

  const getCards = () => Array.from(track.querySelectorAll('.why-card'));

  function getGapPx() {
    const styles = window.getComputedStyle(track);
    const gap = parseFloat(styles.gap || styles.rowGap || '0');
    return Number.isFinite(gap) ? gap : 0;
  }

  function setViewportHeight() {
    if (!mq.matches) {
      viewport.style.removeProperty('--why-viewport-h');
      return;
    }

    const cards = getCards();
    if (cards.length === 0) return;

    const gap = getGapPx();
    let maxPair = 0;

    for (let i = 0; i < cards.length; i += 1) {
      const a = cards[i];
      const b = cards[i + 1];
      const pair = (a?.offsetHeight || 0) + (b ? gap + b.offsetHeight : 0);
      maxPair = Math.max(maxPair, pair);
    }

    const padding = 2;
    viewport.style.setProperty('--why-viewport-h', `${Math.max(280, Math.round(maxPair + padding))}px`);
  }

  function cardCount() {
    return getCards().length;
  }

  function indexTop(index) {
    const cards = getCards();
    const startCard = cards[index];
    if (!startCard) return 0;

    const raw = startCard.offsetTop;
    const maxTop = Math.max(0, viewport.scrollHeight - viewport.clientHeight);
    return Math.min(raw, maxTop);
  }

  function currentIndexFromScroll() {
    const count = cardCount();
    const tops = Array.from({ length: count }, (_, i) => indexTop(i));
    const y = viewport.scrollTop;

    let idx = 0;
    for (let i = 0; i < tops.length; i += 1) {
      if (y + 8 >= tops[i]) idx = i;
    }
    return idx;
  }

  function animateSwap(prevIdx, nextIdx) {
    const cards = getCards();
    const prev = cards[prevIdx];
    const next = cards[nextIdx];
    if (prev && prev !== next) {
      prev.classList.remove('is-entering');
      prev.classList.add('is-leaving');
      window.setTimeout(() => prev.classList.remove('is-leaving'), 320);
    }
    if (next && prev !== next) {
      next.classList.remove('is-leaving');
      next.classList.add('is-entering');
      window.setTimeout(() => next.classList.remove('is-entering'), 320);
    }
  }

  function scrollToIndex(index) {
    const count = cardCount();
    const clamped = Math.max(0, Math.min(Math.max(0, count - 1), index));

    const prev = activeIndex;
    activeIndex = clamped;
    if (prev !== clamped) animateSwap(prev, clamped);

    window.clearTimeout(animTimer);
    isAnimating = true;
    viewport.scrollTo({ top: indexTop(clamped), behavior: 'smooth' });
    animTimer = window.setTimeout(() => {
      isAnimating = false;
    }, 360);
  }

  function canMove(dir) {
    const idx = activeIndex;
    const last = cardCount() - 1;
    if (dir > 0) return idx < last;
    if (dir < 0) return idx > 0;
    return false;
  }

  function handleWheel(e) {
    if (!mq.matches) return;

    // Only take over wheel when the pointer is over the carousel viewport.
    const target = e.target;
    if (!(target instanceof Element) || !viewport.contains(target)) return;

    const delta = e.deltaY;
    if (!delta) return;

    const dir = delta > 0 ? 1 : -1;

    // Only prevent page scroll while the carousel can still move.
    if (canMove(dir) || isAnimating) {
      if (e.cancelable) e.preventDefault();
      e.stopPropagation();
    } else {
      return;
    }

    if (isAnimating) return;

    wheelAccum += delta;
    const threshold = 35;

    if (wheelAccum > threshold) {
      wheelAccum = 0;
      if (canMove(1)) {
        scrollToIndex(activeIndex + 1);
      }
    } else if (wheelAccum < -threshold) {
      wheelAccum = 0;
      if (canMove(-1)) {
        scrollToIndex(activeIndex - 1);
      }
    }
  }

  function refresh() {
    setViewportHeight();
    if (mq.matches) {
      activeIndex = currentIndexFromScroll();
      scrollToIndex(activeIndex);
    }
  }

  // Init
  setViewportHeight();
  activeIndex = 0;
  scrollToIndex(0);

  viewport.addEventListener('wheel', handleWheel, { passive: false });
  window.addEventListener('resize', refresh);
  mq.addEventListener?.('change', refresh);

  const ro = 'ResizeObserver' in window ? new ResizeObserver(() => setViewportHeight()) : null;
  if (ro) ro.observe(track);
}

function initWhyCardsPickerAnimation() {
  const section = document.querySelector('.why');
  const viewport = section?.querySelector('[data-why-viewport]');
  const track = section?.querySelector('[data-why-track]');
  if (!section || !viewport || !track) return;

  const reducedMotion = window.matchMedia?.('(prefers-reduced-motion: reduce)')?.matches;
  if (reducedMotion) return;

  const mq = window.matchMedia('(min-width: 901px)');
  let rafId = 0;
  let lastSelected = null;

  const cards = () => Array.from(track.querySelectorAll('.why-card'));

  function clearStyles() {
    cards().forEach((card) => {
      card.classList.remove('is-selected');
      card.style.removeProperty('transform');
      card.style.removeProperty('opacity');
    });
  }

  function update() {
    rafId = 0;
    if (!mq.matches) {
      clearStyles();
      return;
    }

    // If viewport isn't scrollable (mobile CSS fallback), don't animate.
    if (viewport.scrollHeight <= viewport.clientHeight + 2) {
      clearStyles();
      return;
    }

    const viewportRect = viewport.getBoundingClientRect();
    const centerY = viewportRect.top + viewportRect.height / 2;

    let closest = null;
    let closestDist = Infinity;

    const list = cards();
    for (const card of list) {
      const rect = card.getBoundingClientRect();
      const cardCenter = rect.top + rect.height / 2;
      const dist = Math.abs(cardCenter - centerY);
      if (dist < closestDist) {
        closestDist = dist;
        closest = card;
      }
    }

    // Apply a simple depth/opacity effect based on distance.
    const maxDist = viewportRect.height * 0.7;
    for (const card of list) {
      const rect = card.getBoundingClientRect();
      const cardCenter = rect.top + rect.height / 2;
      const dist = Math.abs(cardCenter - centerY);
      const t = Math.min(1, dist / Math.max(1, maxDist));
      const scale = 1 - 0.06 * t;
      const opacity = 1 - 0.38 * t;
      card.style.transform = `scale(${scale})`;
      card.style.opacity = String(opacity);
      card.classList.toggle('is-selected', card === closest);
    }

    if (closest && closest !== lastSelected) {
      if (lastSelected) {
        lastSelected.classList.remove('is-entering');
        lastSelected.classList.add('is-leaving');
        window.setTimeout(() => lastSelected?.classList.remove('is-leaving'), 320);
      }
      closest.classList.remove('is-leaving');
      closest.classList.add('is-entering');
      window.setTimeout(() => closest?.classList.remove('is-entering'), 320);
      lastSelected = closest;
    }
  }

  function schedule() {
    if (rafId) return;
    rafId = window.requestAnimationFrame(update);
  }

  viewport.addEventListener('scroll', schedule, { passive: true });
  window.addEventListener('resize', schedule);
  mq.addEventListener?.('change', schedule);

  schedule();
}

function initImpactMarquee() {
  const marquees = Array.from(document.querySelectorAll('.impact__marquee'));
  if (marquees.length === 0) return;

  const speedPxPerSec = 70;

  function waitForImagesIn(el) {
    const imgs = Array.from(el.querySelectorAll('img'));
    const pending = imgs.filter((img) => !(img && img.complete));
    if (pending.length === 0) return Promise.resolve();

    const settle = Promise.allSettled(
      pending.map(
        (img) =>
          new Promise((resolve) => {
            img.addEventListener('load', resolve, { once: true });
            img.addEventListener('error', resolve, { once: true });
          }),
      ),
    );

    // Avoid hanging forever if a resource is slow.
    const timeout = new Promise((resolve) => window.setTimeout(resolve, 1500));
    return Promise.race([settle, timeout]);
  }

  async function ensureAnimating(marquee) {
    const track = marquee.querySelector('.impact__track');
    const firstGroup = track?.querySelector('.impact__group');
    if (!track || !firstGroup) return;

    // If CSS animation is running, we don't need the JS fallback.
    const styles = window.getComputedStyle(track);
    const animName = styles.animationName;
    const animDuration = parseFloat(styles.animationDuration || '0');
    const isCssAnimating = animName && animName !== 'none' && Number.isFinite(animDuration) && animDuration > 0;
    if (isCssAnimating) return;

    // Ensure layout is stable before measuring (prevents visible gaps at the loop seam).
    await waitForImagesIn(firstGroup);

    const w = Math.ceil(firstGroup.scrollWidth);
    if (!Number.isFinite(w) || w < 20) {
      // Layout not ready yet.
      window.requestAnimationFrame(() => ensureAnimating(marquee));
      return;
    }

    // Avoid stacking multiple animations.
    if (track.dataset.jsMarqueeRunning === '1') return;
    track.dataset.jsMarqueeRunning = '1';

    const isRight = marquee.classList.contains('impact__marquee--right');
    const fromX = isRight ? -w : 0;
    const toX = isRight ? 0 : -w;
    const durationMs = Math.max(12000, Math.round((w / speedPxPerSec) * 1000));

    track.animate(
      [
        { transform: `translate3d(${fromX}px, 0, 0)` },
        { transform: `translate3d(${toX}px, 0, 0)` },
      ],
      {
        duration: durationMs,
        iterations: Infinity,
        easing: 'linear',
      },
    );
  }

  marquees.forEach((m) => ensureAnimating(m));
}

document.addEventListener('DOMContentLoaded', () => {
  initMobileMenu();
  initWhyCarouselWheel();
  initWhyCardsPickerAnimation();
  initImpactMarquee();
  bootstrap().catch((err) => {
    console.error(err);

    const main = document.getElementById('app-main');
    if (!main) return;

    const pre = document.createElement('pre');
    pre.style.whiteSpace = 'pre-wrap';
    pre.textContent = `Error al iniciar: ${String(err && err.message ? err.message : err)}`;
    main.prepend(pre);
  });
});
