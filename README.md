# Altera (PHP + CSS/JS) para XAMPP

## Requisitos
- XAMPP instalado
- Apache encendido (Panel de Control de XAMPP)

> No requiere base de datos. Todo es estático (PHP + assets) y un endpoint JSON local.

## Instalación
1. Copia esta carpeta a: `C:\xampp\htdocs\Altera`
2. Inicia Apache en XAMPP
3. Abre en el navegador: `http://localhost/Altera/`

## Qué contiene
- Home armada con PHP usando `partials/` (sin Wix)
- Secciones: Hero, Por qué Altera, Objetivos, Impacto (marquee + cifras), Testimonios, Aliados (marquee de logos), Footer
- Botón flotante de WhatsApp (fijo abajo-derecha)
- Demo de catálogo con paginación (AJAX) usando `api/items.php` + `data/items.json`

## Estructura
- `index.php`: composición principal (incluye secciones desde `partials/`)
- `partials/`: secciones del home
	- `header.php`, `hero.php`, `why.php`, `goals.php`, `impact.php`, `testimonials.php`, `partners.php`, `footer.php`
	- `catalog.php`: demo de catálogo (si se incluye en el home)
- `css/`
	- `styles.css`: entrypoint que importa los CSS por sección
	- `00-theme.css`: variables de tema
	- `12-floating.css`: botón flotante WhatsApp
	- `13-impact.css`, `14-testimonials.css`, `15-partners.css`, `11-footer.css`: estilos por sección
- `js/`
	- `main.js`: inicializaciones (menú móvil, carruseles/marquees, catálogo)
	- `core/httpClient.js`: helper para fetch
	- `features/`: controladores (catálogo/paginación)
- `api/items.php`: endpoint JSON local para el catálogo
- `data/items.json`: data del catálogo
- `assets/`: imágenes locales (testimonios, logos de aliados, `wspp.png`)
- `legacy/`: HTML exportado de Wix (solo referencia)

## Notas
- Si ves cambios que “no aplican”, normalmente es caché del navegador: prueba recarga dura (Ctrl+F5).
