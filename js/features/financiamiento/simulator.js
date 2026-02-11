export function initFinanciamientoSimulator() {
  const root = document.querySelector('[data-fin-sim]');
  if (!root) return;

  if (root.dataset.finSimInit === '1') return;
  root.dataset.finSimInit = '1';

  const form = root.querySelector('form');
  const monedaEl = root.querySelector('#moneda');
  const montoEl = root.querySelector('#monto');
  const riesgoEl = root.querySelector('#riesgo');
  const plazoEl = root.querySelector('#plazo');
  const progressBar = root.querySelector('#progress-bar');
  const resultadoEl = root.querySelector('#resultado');

  if (!form || !monedaEl || !montoEl || !riesgoEl || !plazoEl || !progressBar || !resultadoEl) {
    return;
  }

  function actualizarProgreso() {
    let progreso = 0;
    if (monedaEl.value) progreso += 25;
    if (montoEl.value) progreso += 25;
    if (riesgoEl.value) progreso += 25;
    if (plazoEl.value) progreso += 25;

    progressBar.style.width = `${progreso}%`;
    progressBar.innerText = `${progreso}%`;

    const track = progressBar.parentElement;
    if (track) track.setAttribute('aria-valuenow', String(progreso));
  }

  function obtenerComisionPorRiesgo(riesgo) {
    const comisiones = {
      AA: 0.05,
      A: 0.06,
      B: 0.08,
      C: 0.09,
      D: 0.1,
      E: 0.1,
      F: 0.13,
    };
    return comisiones[riesgo] || 0;
  }

  function obtenerTasaPorRiesgo(riesgo, moneda) {
    const tasasSoles = {
      AA: 14.5,
      A: 16,
      B: 19,
      C: 24.5,
      D: 33,
      E: 39,
      F: 44,
    };
    let tasa = tasasSoles[riesgo] || 0;
    if (moneda === 'dolares') {
      tasa -= 1;
    }
    return tasa;
  }

  function etiquetaPerfil(riesgo) {
    const labels = {
      AA: 'Cliente Excelente',
      A: 'Cliente Ejemplar',
      B: 'Cliente Confiable',
      C: 'Cliente Regular',
      D: 'Cliente Observado',
      E: 'Cliente Riesgoso',
      F: 'Cliente Crítico',
    };
    return labels[riesgo] || 'Cliente';
  }

  function calcularPrestamo() {
    const monto = parseFloat(montoEl.value);
    const moneda = monedaEl.value;
    const riesgo = riesgoEl.value;
    const plazo = parseInt(plazoEl.value, 10);

    if (!moneda || !riesgo) {
      alert('Por favor, complete todos los campos.');
      return;
    }

    if (Number.isNaN(monto) || Number.isNaN(plazo) || monto < 100 || plazo < 12 || plazo > 120) {
      alert('Por favor, ingrese valores válidos.');
      return;
    }

    const comision = obtenerComisionPorRiesgo(riesgo);
    const montoFinanciado = monto * (1 + comision);
    const tasaAnual = obtenerTasaPorRiesgo(riesgo, moneda);
    const tasaMensual = Math.pow(1 + tasaAnual / 100, 1 / 12) - 1;

    const cuotaMensual = (montoFinanciado * tasaMensual) / (1 - Math.pow(1 + tasaMensual, -plazo));
    const simboloMoneda = moneda === 'soles' ? 'S/' : '$';

    const perfilLabel = etiquetaPerfil(riesgo);

    resultadoEl.innerHTML = `
      <p class="fin-sim__resultLead">
        En base al perfil de cliente que elegiste (Perfil <strong>${riesgo} - ${perfilLabel}</strong>),
        el valor de tu cuota mensual será de: <strong>${simboloMoneda}${cuotaMensual.toFixed(2)}</strong>.
      </p>
      <p class="fin-sim__resultSmall">
        Este cálculo ya incluye cargos de seguros y de originación, más no incluye gastos notariales, pero pueden financiarse.
        Todos los valores son referenciales y están sujetos a una evaluación crediticia.
      </p>
      <div class="felicidades">¡Felicidades! Estás completando el primer paso para alcanzar tus METAS.</div>
    `;
  }

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    actualizarProgreso();
    calcularPrestamo();
  });

  [monedaEl, montoEl, riesgoEl, plazoEl].forEach((el) => {
    el.addEventListener('input', actualizarProgreso);
    el.addEventListener('change', actualizarProgreso);
  });

  actualizarProgreso();
}
