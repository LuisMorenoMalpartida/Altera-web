import { HttpClient } from '../../core/httpClient.js';
import { Paginator } from '../pagination/Paginator.js';

function escapeHtml(value) {
  return String(value)
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;')
    .replaceAll("'", '&#39;');
}

function renderItems(gridEl, items) {
  gridEl.innerHTML = items
    .map(
      (it) => `
      <article class="card item">
        <h3>${escapeHtml(it.title)}</h3>
        <p>${escapeHtml(it.description)}</p>
      </article>
    `.trim()
    )
    .join('');
}

function renderMeta(metaEl, paginator) {
  const start = paginator.pageIndex * paginator.pageSize + 1;
  const end = Math.min(paginator.total, (paginator.pageIndex + 1) * paginator.pageSize);
  metaEl.textContent = paginator.total === 0
    ? 'Sin items'
    : `Mostrando ${start}-${end} de ${paginator.total} (página ${paginator.pageIndex + 1}/${paginator.pageCount})`;
}

export class CatalogController {
  #http;

  constructor({ http = new HttpClient() } = {}) {
    this.#http = http;
  }

  async mount({ gridEl, metaEl, prevBtn, nextBtn, dataUrl = './api/items.php' }) {
    const allItems = await this.#http.getJson(dataUrl);
    const paginator = new Paginator(allItems, { pageSize: 6 });

    const repaint = () => {
      renderItems(gridEl, paginator.slice());
      renderMeta(metaEl, paginator);
      prevBtn.disabled = !paginator.canPrev();
      nextBtn.disabled = !paginator.canNext();
    };

    prevBtn.addEventListener('click', () => {
      paginator.prev();
      repaint();
    });

    nextBtn.addEventListener('click', () => {
      paginator.next();
      repaint();
    });

    repaint();
  }
}
