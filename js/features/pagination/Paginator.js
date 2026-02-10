export class Paginator {
  #items;
  #pageSize;
  #pageIndex;

  constructor(items, { pageSize = 6, pageIndex = 0 } = {}) {
    this.#items = Array.isArray(items) ? items : [];
    this.#pageSize = Math.max(1, pageSize);
    this.#pageIndex = Math.max(0, pageIndex);

    if (this.#pageIndex > this.pageCount - 1) {
      this.#pageIndex = Math.max(0, this.pageCount - 1);
    }
  }

  get total() {
    return this.#items.length;
  }

  get pageSize() {
    return this.#pageSize;
  }

  get pageIndex() {
    return this.#pageIndex;
  }

  get pageCount() {
    return Math.max(1, Math.ceil(this.total / this.pageSize));
  }

  canPrev() {
    return this.pageIndex > 0;
  }

  canNext() {
    return this.pageIndex < this.pageCount - 1;
  }

  prev() {
    if (this.canPrev()) this.#pageIndex -= 1;
    return this;
  }

  next() {
    if (this.canNext()) this.#pageIndex += 1;
    return this;
  }

  slice() {
    const start = this.pageIndex * this.pageSize;
    return this.#items.slice(start, start + this.pageSize);
  }
}
