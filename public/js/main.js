/**
 * Aura Artesanal - Atelier Digital de Joyería
 * Archivo principal de interactividad (js/main.js)
 * Funcionalidades: Catálogo dinámico, filtrado, buscador, modales accesibles,
 * validación en tiempo real, scrollspy de navegación y generador WhatsApp.
 */

document.addEventListener('DOMContentLoaded', () => {
  'use strict';

  // Configuración del Taller
  const CONFIG = {
    whatsappNumber: '522383033981', // Número real del taller: +52 238 303 3981
    brandName: 'Aura Artesanal'
  };

  // Base de datos de piezas del catálogo (17 piezas)
  const catalogoJoyas = [
    {
      id: 'pz-01',
      codigo: 'PZ-01',
      categoria: 'pulseras',
      categoriaNombre: 'Pulsera Tejida',
      titulo: 'Pulsera Estilo Enredadera Verde',
      material: 'Mostacillas de vidrio verde claro e hilo de tejido',
      detalles: 'Flores blancas de centro amarillo, dijes de estrella (una blanca grande y pequeñas negras) y destellos de cuentas doradas y transparentes',
      dimensiones: 'Circunferencia aproximada de 16 cm (ajustable con nudo corredizo)',
      disponibilidad: 'disponible',
      disponibilidadTexto: 'Disponible en Taller',
      precio: '$95 MXN',
      descripcion: 'Pulsera tejida a mano con mostacillas verde claro en forma de enredadera, flores blancas de centro amarillo y dijes de estrellas que combinan una gran estrella blanca con pequeñas estrellas negras, rematada con destellos de cuentas doradas y transparentes.',
      cuidados: 'Evitar el contacto con agua, perfumes y alcohol. Limpiar con paño seco suave y guardar en lugar seco.',
      tiempoElaboracion: 'Listo para envío en 1 a 3 días hábiles.',
      imagen: 'img/pulsera-enredadera.jpeg',
      alt: 'Pulsera tejida de mostacillas verde claro con flores blancas, estrellas negras y cuentas doradas'
    },
    {
      id: 'pz-02',
      codigo: 'PZ-02',
      categoria: 'collares',
      categoriaNombre: 'Gargantilla Doble',
      titulo: 'Gargantilla Doble Estilo Cósmico',
      material: 'Cadena fina plateada, cuentas de vidrio y perlas sintéticas',
      detalles: 'Dos hileras con cuentas celestes, perlas sintéticas, dijes de corazón y estrella, y dije central del planeta Saturno',
      dimensiones: 'Cadena de 42 cm con extensión de 5 cm',
      disponibilidad: 'unica',
      disponibilidadTexto: 'Pieza Única',
      precio: '$160 MXN',
      descripcion: 'Collar de dos hileras que combina una cadena fina plateada con cuentas celestes y perlas sintéticas, decorado con dijes de corazón y estrella, y un vistoso dije central del planeta Saturno.',
      cuidados: 'Guardar en su bolsita protectora para evitar enredos. Evitar rocíos de perfume sobre las perlas.',
      tiempoElaboracion: 'Pieza única de autor, disponible para entrega inmediata.',
      imagen: 'img/collar-cosmico.jpeg',
      alt: 'Gargantilla doble de cadena plateada con cuentas celestes, perlas y dije central de Saturno'
    },
    {
      id: 'pz-03',
      codigo: 'PZ-03',
      categoria: 'pulseras',
      categoriaNombre: 'Pulsera Temática',
      titulo: 'Pulsera Temática de Jardín',
      material: 'Cuentas de vidrio en forma de hoja, flores de cristal e hilo de tejido',
      detalles: 'Cuentas verdes tipo hoja, cuentas anaranjadas y flores de cristal transparente en tonos rosados suaves',
      dimensiones: 'Circunferencia aproximada de 16 cm (ajustable)',
      disponibilidad: 'pedido',
      disponibilidadTexto: 'Bajo Pedido (5-10 días)',
      precio: '$110 MXN',
      descripcion: 'Diseño botánico tejido a mano con cuentas verdes en forma de hoja, cuentas anaranjadas que aportan calidez y flores de cristal transparente en delicados tonos rosados suaves.',
      cuidados: 'No mojar para preservar el hilo y el brillo del cristal. Limpiar con paño seco.',
      tiempoElaboracion: 'Elaboración artesanal sobre pedido en 5 a 10 días hábiles.',
      imagen: 'img/pulsera-jardin.jpeg',
      alt: 'Pulsera de jardín con cuentas verdes en forma de hoja, cuentas anaranjadas y flores de cristal rosado'
    },
    {
      id: 'pz-04',
      codigo: 'PZ-04',
      categoria: 'pulseras',
      categoriaNombre: 'Pulsera Tejida',
      titulo: 'Pulsera de Frutillas y Flores Rojas',
      material: 'Mostacillas de vidrio verde claro e hilo de tejido',
      detalles: 'Flores de cuentas rojas con centro amarillo y una estrella rosada en el centro',
      dimensiones: 'Circunferencia aproximada de 16 cm (ajustable)',
      disponibilidad: 'disponible',
      disponibilidadTexto: 'Disponible en Taller',
      precio: '$95 MXN',
      descripcion: 'Pulsera con estructura de mostacillas verde claro que sostiene flores de cuentas rojas con centro amarillo, coronada por una estrella rosada en el centro de la pieza.',
      cuidados: 'Evitar mojado prolongado. Guardar separada de otras piezas para no despegar los acabados.',
      tiempoElaboracion: 'Listo para envío en 1 a 3 días hábiles.',
      imagen: 'img/pulsera-frutillas\.jpeg',
      alt: 'Pulsera verde de mostacillas con flores rojas de centro amarillo y estrella rosada central'
    },
    {
      id: 'pz-05',
      codigo: 'PZ-05',
      categoria: 'pulseras',
      categoriaNombre: 'Pulsera Cristal',
      titulo: 'Pulsera de Violetas y Follaje',
      material: 'Cristal facetado morado, hojas de cristal verde y cuentas lila',
      detalles: 'Flores de cristal moradas y translúcidas, hojas verdes de cristal y cuentas lila',
      dimensiones: 'Circunferencia aproximada de 16.5 cm',
      disponibilidad: 'pedido',
      disponibilidadTexto: 'Bajo Pedido (5-10 días)',
      precio: '$120 MXN',
      descripcion: 'Accesorio tejido con flores de cristal moradas y translúcidas, hojas verdes de cristal que simulan follaje natural y cuentas lila que unifican la paleta violeta de la pieza.',
      cuidados: 'El cristal se limpia con paño seco. Evitar golpes contra superficies duras.',
      tiempoElaboracion: 'Elaboración artesanal sobre pedido en 5 a 10 días hábiles.',
      imagen: 'img/pulsera-violetas\.jpeg',
      alt: 'Pulsera de violetas con flores de cristal moradas translúcidas, hojas verdes y cuentas lila'
    },
    {
      id: 'pz-06',
      codigo: 'PZ-06',
      categoria: 'collares',
      categoriaNombre: 'Collar de Capas',
      titulo: 'Collar de Capas Estilo Coquette / Hada',
      material: 'Cadenas plateadas, perlas, cuentas de cristal y moños de listón satinado',
      detalles: 'Moños blancos satinados, cuentas azules translúcidas, perlas, flores colgantes y dije principal de Saturno iridiscente',
      dimensiones: 'Tres caídas de 38, 45 y 52 cm',
      disponibilidad: 'unica',
      disponibilidadTexto: 'Pieza Única',
      precio: '$185 MXN',
      descripcion: 'Collar de varias caídas con moños blancos satinados, cuentas azules translúcidas, perlas y flores colgantes, protagonizado por un llamativo dije central del planeta Saturno con acabado iridiscente.',
      cuidados: 'Colgar o guardar extendido para no deformar las cadenas. Evitar agua y perfume.',
      tiempoElaboracion: 'Pieza única de autor, disponible para entrega inmediata.',
      imagen: 'img/collar-coquette\.jpeg',
      alt: 'Collar de capas con moños blancos, perlas, cuentas azules y dije iridiscente de Saturno'
    },
    {
      id: 'pz-07',
      codigo: 'PZ-07',
      categoria: 'aretes',
      categoriaNombre: 'Aretes Colgantes',
      titulo: 'Aretes Colgantes de Campánulas Rosadas',
      material: 'Ganchos dorados, perlas, cristal facetado fucsia y flores de resina',
      detalles: 'Tiras de perlas, cristales fucsia faceteados y flores acampanadas en rosa pastel',
      dimensiones: 'Largo total de 6.5 cm aprox. por arete',
      disponibilidad: 'disponible',
      disponibilidadTexto: 'Disponible en Taller',
      precio: '$85 MXN',
      descripcion: 'Par de aretes de gancho dorado con tiras de perlas, cristales fucsia faceteados que capturan la luz y flores acampanadas en suave rosa pastel que se mecen con el movimiento.',
      cuidados: 'Guardar en estuche individual para proteger los cristales. Evitar rociar perfume con los aretes puestos.',
      tiempoElaboracion: 'Listo para envío en 1 a 3 días hábiles.',
      imagen: 'img/aretes-campanulas\.jpeg',
      alt: 'Par de aretes dorados colgantes con perlas, cristales fucsia y flores acampanadas rosa pastel'
    },
    {
      id: 'pz-08',
      codigo: 'PZ-08',
      categoria: 'anillos',
      categoriaNombre: 'Anillo Ajustable',
      titulo: 'Anillo Ajustable de Alambre y Flor',
      material: 'Alambre moldeado en espiral, cuentas rosas y perlas pequeñas',
      detalles: 'Espiral de alambre con cuentas rosa, perlas pequeñas y una flor central en tono rosa suave',
      dimensiones: 'Ajustable (equivale a tallas 6 a 9)',
      disponibilidad: 'disponible',
      disponibilidadTexto: 'Disponible en Taller',
      precio: '$70 MXN',
      descripcion: 'Anillo artesanal de alambre moldeado en espiral, decorado con cuentas rosa y perlas pequeñas que enmarcan una delicada flor central en tono rosa suave.',
      cuidados: 'Regular el ajuste con cuidado para no doblar el alambre. Guardar en lugar seco.',
      tiempoElaboracion: 'Listo para envío en 1 a 3 días hábiles.',
      imagen: 'img/anillo-alambre-flor\.jpeg',
      alt: 'Anillo ajustable de alambre en espiral con cuentas rosa, perlas y flor central rosa suave'
    },
    {
      id: 'pz-09',
      codigo: 'PZ-09',
      categoria: 'pulseras',
      categoriaNombre: 'Brazalete / Earcuff',
      titulo: 'Brazalete o Earcuff de Alambre Moldeado',
      material: 'Alambre plateado moldeado, cuentas de vidrio y dijes de resina',
      detalles: 'Espirales en los extremos, flor azul claro, cuentas amarillas y azules, y dijes de hoja y manzana',
      dimensiones: 'Arco rígido de 6 cm (usable como brazalete pequeño o earcuff)',
      disponibilidad: 'pedido',
      disponibilidadTexto: 'Bajo Pedido (5-10 días)',
      precio: '$90 MXN',
      descripcion: 'Joya rígida de alambre plateado con espirales en los extremos, adornada con una flor azul claro, cuentas amarillas y azules, y pequeños dijes de hoja y manzana que le dan un aire juguetón.',
      cuidados: 'Moldear con suavidad para no marcar el alambre. Evitar humedad excesiva.',
      tiempoElaboracion: 'Elaboración artesanal sobre pedido en 5 a 10 días hábiles.',
      imagen: 'img/brazalete-earcuff\.jpeg',
      alt: 'Brazalete rígido de alambre plateado con espirales, flor azul, cuentas amarillas y dijes de hoja y manzana'
    },
    {
      id: 'pz-10',
      codigo: 'PZ-10',
      categoria: 'aretes',
      categoriaNombre: 'Set de Aretes',
      titulo: 'Set de Dos Pares de Aretes Colgantes',
      material: 'Esferas de vidrio, cadenas plateadas, moños de listón y cristal transparente',
      detalles: 'Par 1: estrellas moradas, esferas violetas y cruces plateadas. Par 2: tiras de cuentas transparentes con detalles dorados y moños blancos',
      dimensiones: 'Par 1 de 5 cm y Par 2 de 6 cm aprox.',
      disponibilidad: 'unica',
      disponibilidadTexto: 'Pieza Única',
      precio: '$130 MXN',
      descripcion: 'Set de dos pares de aretes colgantes: uno combina estrellas moradas, esferas violetas y cruces plateadas de aire místico; el otro lleva tiras de cuentas transparentes con detalles dorados y moños blancos de estilo coquette.',
      cuidados: 'Guardar cada par en su bolsita aparte para evitar enredos. Limpiar con paño seco.',
      tiempoElaboracion: 'Set único disponible para entrega inmediata.',
      imagen: 'img/aretes-set-doble\.jpeg',
      alt: 'Set de dos pares de aretes colgantes: uno morado con estrellas y cruces, otro con cuentas transparentes y moños blancos'
    },
    {
      id: 'pz-11',
      codigo: 'PZ-11',
      categoria: 'pulseras',
      categoriaNombre: 'Pulsera Delicada',
      titulo: 'Pulsera Delicada de Tonos Pastel y Tulipanes',
      material: 'Cadena fina plateada, cuentas de cristal y dijes de flor',
      detalles: 'Cristales claros y rosados, estrellas translúcidas y colgantes de tulipán en tono durazno/rosa con hojas verdes',
      dimensiones: 'Cadena de 17 cm con extensión de 3 cm',
      disponibilidad: 'pedido',
      disponibilidadTexto: 'Bajo Pedido (5-10 días)',
      precio: '$125 MXN',
      descripcion: 'Cadena fina plateada intercalada con cuentas de cristal claras y rosadas, estrellas translúcidas y colgantes de flores tipo tulipán en tonos durazno y rosa con hojas verdes.',
      cuidados: 'Retirar antes de bañarse o hacer ejercicio. Guardar extendida para no enredar la cadena.',
      tiempoElaboracion: 'Elaboración artesanal sobre pedido en 5 a 10 días hábiles.',
      imagen: 'img/pulsera-pastel-tulipanes\.jpeg',
      alt: 'Pulsera delicada de cadena plateada con cristales pastel, estrellas translúcidas y tulipanes durazno'
    },
    {
      id: 'pz-12',
      codigo: 'PZ-12',
      categoria: 'collares',
      categoriaNombre: 'Colgante / Llavero',
      titulo: 'Colgante Triple o Llavero de Capas',
      material: 'Tres cadenas, cuentas de vidrio y dijes de resina',
      detalles: 'Corazón negro brillante, tulipán rosa con hoja verde, cuentas rosadas, esferas de colores y estrella verde',
      dimensiones: 'Tres cadenas de 30, 40 y 50 cm (funciona como colgante o llavero)',
      disponibilidad: 'disponible',
      disponibilidadTexto: 'Disponible en Taller',
      precio: '$105 MXN',
      descripcion: 'Estructura de tres cadenas con un dije de corazón negro brillante, un tulipán rosa con hoja verde, cuentas rosadas, esferas de colores y un dije de estrella verde; usable como colgante o llavero.',
      cuidados: 'Al usarlo como llavero, golpear suavemente para no despegar los dijes. Mantener seco.',
      tiempoElaboracion: 'Listo para envío en 1 a 3 días hábiles.',
      imagen: 'img/colgante-triple\.jpeg',
      alt: 'Colgante de tres cadenas con corazón negro, tulipán rosa, cuentas de colores y estrella verde'
    },
    {
      id: 'pz-13',
      codigo: 'PZ-13',
      categoria: 'pulseras',
      categoriaNombre: 'Pulsera Celestial',
      titulo: 'Pulsera Celestial con Dije de Flor Alada',
      material: 'Cuentas de vidrio, cristal pastel y dije de flor con alas',
      detalles: 'Cuentas celestes, amarillas translúcidas, estrellas de cristal pastel y dije central de flor con alas de ángel transparentes',
      dimensiones: 'Circunferencia aproximada de 16.5 cm',
      disponibilidad: 'pedido',
      disponibilidadTexto: 'Bajo Pedido (5-10 días)',
      precio: '$115 MXN',
      descripcion: 'Pulsera con cuentas celestes y amarillas translúcidas intercaladas con estrellas de cristal pastel, destacando un dije central en forma de flor con alas de ángel transparentes.',
      cuidados: 'Evitar golpes sobre el dije central. Limpiar con paño suave en seco.',
      tiempoElaboracion: 'Elaboración artesanal sobre pedido en 5 a 10 días hábiles.',
      imagen: 'img/pulsera-celestial\.jpeg',
      alt: 'Pulsera celeste con cuentas azules y amarillas, estrellas de cristal y flor con alas de ángel'
    },
    {
      id: 'pz-14',
      codigo: 'PZ-14',
      categoria: 'pulseras',
      categoriaNombre: 'Pulsera Temática',
      titulo: 'Pulsera de Cerezas y Tulipanes Rojos',
      material: 'Cadena fina, cristal facetado verde y rojo, y dijes de resina',
      detalles: 'Colgantes en forma de cerezas, tulipanes y estrellas en cristal brillante',
      dimensiones: 'Cadena de 17 cm con extensión de 3 cm',
      disponibilidad: 'disponible',
      disponibilidadTexto: 'Disponible en Taller',
      precio: '$100 MXN',
      descripcion: 'Pulsera de cadena fina con colgantes rojos y verdes en forma de cerezas, tulipanes y estrellas elaborados en cristal brillante que captan la luz con cada gesto.',
      cuidados: 'Los colgantes son delicados: evitar enganches con la ropa. Guardar en estuche.',
      tiempoElaboracion: 'Listo para envío en 1 a 3 días hábiles.',
      imagen: 'img/pulsera-cerezas\.jpeg',
      alt: 'Pulsera de cadena fina con colgantes de cristal en forma de cerezas rojas, tulipanes y estrellas'
    },
    {
      id: 'pz-15',
      codigo: 'PZ-15',
      categoria: 'collares',
      categoriaNombre: 'Gargantilla de Flor',
      titulo: 'Gargantilla Fina de Flor de Campanilla Azul',
      material: 'Cadena plateada doble, cuentas de vidrio azul y cristal transparente',
      detalles: 'Cuentas azul cielo, cristales transparentes, pequeñas estrellas y dije central de flor azul acampanada con hoja verde',
      dimensiones: 'Doble cadena de 40 cm con extensión de 5 cm',
      disponibilidad: 'pedido',
      disponibilidadTexto: 'Bajo Pedido (5-10 días)',
      precio: '$140 MXN',
      descripcion: 'Cadena plateada doble con cuentas azul cielo y cristales transparentes, pequeñas estrellas distribuidas a lo largo y un dije central colgante de flor azul acampanada con su hoja verde.',
      cuidados: 'Guardar extendida. Evitar contactos con agua para preservar el baño plateado.',
      tiempoElaboracion: 'Elaboración artesanal sobre pedido en 5 a 10 días hábiles.',
      imagen: 'img/gargantilla-campanilla-azul\.jpeg',
      alt: 'Gargantilla doble de cadena plateada con cuentas azul cielo y dije de flor de campanilla azul'
    },
    {
      id: 'pz-16',
      codigo: 'PZ-16',
      categoria: 'pulseras',
      categoriaNombre: 'Pulsera Doble Hilar',
      titulo: 'Pulsera de Estilo Gótico Suave / Cósmico Oscuro',
      material: 'Cuentas negras y ámbar, mariposa de cristal y estrella plateada',
      detalles: 'Dos hileras con cuentas negras, cuentas ámbar, dije de mariposa transparente y estrella estilizada plateada al centro',
      dimensiones: 'Dos hileras de 16 a 17 cm (ajustable)',
      disponibilidad: 'disponible',
      disponibilidadTexto: 'Disponible en Taller',
      precio: '$105 MXN',
      descripcion: 'Pulsera de dos hileras que combina cuentas negras con cuentas ámbar para lograr un look gótico suave, con un dije de mariposa transparente y una estrella estilizada plateada en el centro.',
      cuidados: 'Evitar golpes en la mariposa de cristal. Limpiar con paño seco.',
      tiempoElaboracion: 'Listo para envío en 1 a 3 días hábiles.',
      imagen: 'img/pulsera-gotica\.jpeg',
      alt: 'Pulsera doble de cuentas negras y ámbar con mariposa transparente y estrella plateada central'
    },
    {
      id: 'pz-17',
      codigo: 'PZ-17',
      categoria: 'llaveros',
      categoriaNombre: 'Llaveros Personalizados',
      titulo: 'Llaveros Religiosos y Personalizados (Par)',
      material: 'Aros metálicos, cuentas de vidrio, medallas religiosas y flores de cristal',
      detalles: 'Personalización con nombre "THAIS" o "LOVE", medalla religiosa, flores de cristal y detalles en verde y dorado',
      dimensiones: 'Aro de 3 cm con llavero de 8 a 10 cm de largo',
      disponibilidad: 'pedido',
      disponibilidadTexto: 'Bajo Pedido (5-10 días)',
      precio: '$80 MXN',
      descripcion: 'Par de llaveros con aros metálicos: uno lleva una tira con el nombre "THAIS", cuentas rojas y una medalla religiosa; el otro incluye la palabra "LOVE", detalles en verde y dorado, flores de cristal y una medalla de la Virgen con flor metálica al centro. Personalizable con otro nombre.',
      cuidados: 'Los dijes son piezas de resina y metal: evitar golpes fuertes y humedad prolongada.',
      tiempoElaboracion: 'Elaboración personalizada sobre pedido en 5 a 10 días hábiles.',
      imagen: 'img/llaveros-religiosos\.jpeg',
      alt: 'Par de llaveros personalizados: uno con nombre THAIS y medalla religiosa, otro con LOVE y medalla de la Virgen'
    }
  ];

  // Elementos DOM principales
  const contenedorCatalogo = document.getElementById('grid-productos');
  const contadorProductos = document.getElementById('contador-productos');
  const botonesFiltro = document.querySelectorAll('.btn-filter');
  const inputBusqueda = document.getElementById('buscador-catalogo');
  const modalDetalleEl = document.getElementById('modalDetalleJoya');
  const modalGaleriaEl = document.getElementById('modalGaleria');
  const formularioContacto = document.getElementById('form-contacto');

  // Inicialización de Modales de Bootstrap
  let bsModalDetalle = null;
  let bsModalGaleria = null;

  if (modalDetalleEl && typeof bootstrap !== 'undefined') {
    bsModalDetalle = new bootstrap.Modal(modalDetalleEl);
  }
  if (modalGaleriaEl && typeof bootstrap !== 'undefined') {
    bsModalGaleria = new bootstrap.Modal(modalGaleriaEl);
  }

  // Estado reactivo del catálogo
  let filtroActivo = 'todos';
  let terminoBusqueda = '';

  /**
   * Genera el enlace de WhatsApp codificado con un mensaje preconfigurado
   */
  function crearEnlaceWhatsApp(pieza = null, esPersonalizado = false, datosExtra = {}) {
    let mensaje = '';
    if (esPersonalizado) {
      mensaje = `¡Hola ${CONFIG.brandName}! Quiero consultar una pieza personalizada:\n` +
        `• Nombre: ${datosExtra.nombre || 'Interesado'}\n` +
        `• Teléfono: ${datosExtra.telefono || 'No especificado'}\n` +
        (datosExtra.correo ? `• Correo: ${datosExtra.correo}\n` : '') +
        `• Tipo de Joya: ${datosExtra.tipo || 'No especificado'}\n` +
        `• Gema preferida: ${datosExtra.gema || 'Por definir'}\n` +
        `• Medida o talla: ${datosExtra.medida || 'A consultar'}\n` +
        `• Mensaje: ${datosExtra.mensaje || 'Me gustaría conocer costos y tiempos.'}`;
    } else {
      mensaje = `¡Hola ${CONFIG.brandName}! Me interesa consultar la disponibilidad y cotizar la siguiente pieza del catálogo:\n` +
        `• Código de referencia: ${pieza.codigo}\n` +
        `• Pieza: "${pieza.titulo}"\n` +
        `¿Podrían brindarme más información sobre la entrega? Gracias.`;
    }
    return `https://wa.me/${CONFIG.whatsappNumber}?text=${encodeURIComponent(mensaje)}`;
  }

  /**
   * Renderiza las tarjetas del catálogo según filtros y búsqueda
   */
  function renderizarCatalogo() {
    if (!contenedorCatalogo) return;

    // Filtrar elementos
    const joyasFiltradas = catalogoJoyas.filter(joya => {
      const coincideFiltro = (filtroActivo === 'todos') || (joya.categoria === filtroActivo);
      const textoParaBuscar = `${joya.titulo} ${joya.categoriaNombre} ${joya.material} ${joya.detalles} ${joya.codigo}`.toLowerCase();
      const coincideBusqueda = terminoBusqueda === '' || textoParaBuscar.includes(terminoBusqueda.toLowerCase());
      return coincideFiltro && coincideBusqueda;
    });

    // Actualizar contador
    if (contadorProductos) {
      contadorProductos.textContent = `Mostrando ${joyasFiltradas.length} de ${catalogoJoyas.length} piezas`;
    }

    // Si no hay resultados
    if (joyasFiltradas.length === 0) {
      contenedorCatalogo.innerHTML = `
        <div class="col-12 text-center py-5">
          <div class="p-4 bg-white rounded-4 border border-light-subtle shadow-sm">
            <i class="bi bi-search text-muted fs-1 mb-3 d-block"></i>
            <h3 class="h5 font-serif text-dark mb-2">No se encontraron piezas con ese criterio</h3>
            <p class="text-muted small mb-3">Intenta buscar por otro término o restablecer los filtros de categoría.</p>
            <button type="button" class="btn btn-outline-dark btn-sm rounded-pill px-3" id="btn-reset-filters">
              Restablecer Filtros
            </button>
          </div>
        </div>
      `;
      const btnReset = document.getElementById('btn-reset-filters');
      if (btnReset) {
        btnReset.addEventListener('click', () => {
          filtroActivo = 'todos';
          terminoBusqueda = '';
          if (inputBusqueda) inputBusqueda.value = '';
          botonesFiltro.forEach(b => b.classList.toggle('active', b.dataset.filter === 'todos'));
          renderizarCatalogo();
        });
      }
      return;
    }

    // Renderizar tarjetas con Bootstrap Grid
    contenedorCatalogo.innerHTML = joyasFiltradas.map(joya => {
      const enlaceWa = crearEnlaceWhatsApp(joya);
      return `
        <div class="col-12 col-md-6 col-lg-4">
          <article class="joya-card h-100" data-id="${joya.id}">
            <div class="joya-img-wrap">
              <span class="badge-disponibilidad ${joya.disponibilidad}">
                ${joya.disponibilidadTexto}
              </span>
              <img src="${joya.imagen}" alt="${joya.alt}" loading="lazy" />
            </div>
            <div class="card-body p-4 d-flex flex-column">
              <span class="joya-category-tag">${joya.categoriaNombre} • ${joya.codigo}</span>
              <h3 class="joya-title h5 font-serif">${joya.titulo}</h3>
              <p class="joya-specs small mb-2"><i class="bi bi-stars me-1 text-warning"></i>${joya.detalles}</p>
              <p class="small text-muted mb-3 flex-grow-1">${joya.descripcion}</p>

              <div class="d-flex align-items-baseline justify-content-between mb-3 pt-2 border-top">
                <span class="joya-price">${joya.precio}</span>
                <span class="joya-price-ref">[Dato simulado/ejemplo]</span>
              </div>

              <div class="d-grid gap-2 d-sm-flex">
                <button type="button" class="btn btn-outline-dark btn-sm rounded-pill flex-grow-1 btn-ver-detalle" data-id="${joya.id}">
                  <i class="bi bi-eye me-1"></i> Ver Detalle
                </button>
                <a href="${enlaceWa}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm rounded-pill flex-grow-1" aria-label="Cotizar ${joya.titulo} por WhatsApp">
                  <i class="bi bi-whatsapp me-1"></i> Cotizar
                </a>
              </div>
            </div>
          </article>
        </div>
      `;
    }).join('');

    // Asignar eventos de apertura a botones 'Ver Detalle'
    document.querySelectorAll('.btn-ver-detalle').forEach(btn => {
      btn.addEventListener('click', () => {
        const joyaId = btn.getAttribute('data-id');
        abrirModalDetalle(joyaId);
      });
    });
  }

  /**
   * Despliega la información completa de la joya en el modal
   */
  function abrirModalDetalle(joyaId) {
    const joya = catalogoJoyas.find(j => j.id === joyaId);
    if (!joya || !modalDetalleEl) return;

    const modalTitle = document.getElementById('modalDetalleTitulo');
    const modalImg = document.getElementById('modalDetalleImg');
    const modalCategoria = document.getElementById('modalDetalleCategoria');
    const modalDisponibilidad = document.getElementById('modalDetalleDisponibilidad');
    const modalDescripcion = document.getElementById('modalDetalleDescripcion');
    const modalMaterial = document.getElementById('modalDetalleMaterial');
    const modalGema = document.getElementById('modalDetalleGema');
    const modalDimensiones = document.getElementById('modalDetalleDimensiones');
    const modalCuidados = document.getElementById('modalDetalleCuidados');
    const modalTiempo = document.getElementById('modalDetalleTiempo');
    const modalPrecio = document.getElementById('modalDetallePrecio');
    const modalCodigo = document.getElementById('modalDetalleCodigo');
    const modalBtnWa = document.getElementById('modalDetalleBtnWa');

    if (modalTitle) modalTitle.textContent = joya.titulo;
    if (modalImg) {
      modalImg.src = joya.imagen;
      modalImg.alt = joya.alt;
    }
    if (modalCategoria) modalCategoria.textContent = joya.categoriaNombre;
    if (modalCodigo) modalCodigo.textContent = joya.codigo;
    if (modalDisponibilidad) {
      modalDisponibilidad.className = `badge rounded-pill me-2 bg-${joya.disponibilidad === 'disponible' ? 'success' : joya.disponibilidad === 'unica' ? 'primary' : 'warning text-dark'}`;
      modalDisponibilidad.textContent = joya.disponibilidadTexto;
    }
    if (modalDescripcion) modalDescripcion.textContent = joya.descripcion;
    if (modalMaterial) modalMaterial.textContent = joya.material;
    if (modalGema) modalGema.textContent = joya.detalles;
    if (modalDimensiones) modalDimensiones.textContent = joya.dimensiones;
    if (modalCuidados) modalCuidados.textContent = joya.cuidados;
    if (modalTiempo) modalTiempo.textContent = joya.tiempoElaboracion;
    if (modalPrecio) modalPrecio.textContent = joya.precio;

    if (modalBtnWa) {
      modalBtnWa.href = crearEnlaceWhatsApp(joya);
      modalBtnWa.setAttribute('aria-label', `Cotizar ${joya.titulo} por WhatsApp`);
    }

    if (bsModalDetalle) {
      bsModalDetalle.show();
    }
  }

  /**
   * Abre modal de imagen para elementos de galería (operable por teclado)
   */
  function configurarGaleria() {
    const triggersGaleria = document.querySelectorAll('.galeria-trigger');
    const modalImg = document.getElementById('modalGaleriaImg');
    const modalTitulo = document.getElementById('modalGaleriaTitulo');
    const modalDesc = document.getElementById('modalGaleriaDesc');

    triggersGaleria.forEach(trigger => {
      trigger.addEventListener('click', () => {
        const item = trigger.closest('.galeria-item');
        if (!item) return;
        const img = item.querySelector('img');
        const titulo = item.dataset.titulo || 'Detalle del Atelier';
        const desc = item.dataset.desc || 'Proceso de orfebrería artesanal en plata y gemas vivas.';

        if (modalImg && img) {
          modalImg.src = img.src;
          modalImg.alt = img.alt;
        }
        if (modalTitulo) modalTitulo.textContent = titulo;
        if (modalDesc) modalDesc.textContent = desc;

        if (bsModalGaleria) {
          bsModalGaleria.show();
        }
      });
    });
  }

  /**
   * Validación en tiempo real del formulario (RF-09):
   * aplica estados is-valid / is-invalid al perder el foco o al editar campos ya validados.
   */
  function aplicarEstadoValidacion(campo) {
    if (!campo.required && campo.value.trim() === '') {
      campo.classList.remove('is-valid', 'is-invalid');
      return;
    }
    if (campo.checkValidity()) {
      campo.classList.remove('is-invalid');
      campo.classList.add('is-valid');
    } else {
      campo.classList.remove('is-valid');
      campo.classList.add('is-invalid');
    }
  }

  function configurarValidacionTiempoReal() {
    if (!formularioContacto) return;
    const campos = formularioContacto.querySelectorAll('input, select, textarea');
    campos.forEach(campo => {
      campo.addEventListener('blur', () => aplicarEstadoValidacion(campo));
      campo.addEventListener('input', () => {
        if (campo.classList.contains('is-valid') || campo.classList.contains('is-invalid')) {
          aplicarEstadoValidacion(campo);
        }
      });
      campo.addEventListener('change', () => aplicarEstadoValidacion(campo));
    });
  }

  /**
   * Scrollspy: resalta el enlace de navegación de la sección visible (RF-01)
   */
  function configurarScrollSpy() {
    const secciones = document.querySelectorAll('main section[id]');
    const enlaces = document.querySelectorAll('.navbar-nav .nav-link[href^="#"]');
    if (!secciones.length || !enlaces.length || !('IntersectionObserver' in window)) return;

    const observer = new IntersectionObserver((entradas) => {
      entradas.forEach(entrada => {
        if (entrada.isIntersecting) {
          enlaces.forEach(enlace => {
            enlace.classList.toggle('active', enlace.getAttribute('href') === `#${entrada.target.id}`);
          });
        }
      });
    }, { rootMargin: '-40% 0px -55% 0px' });

    secciones.forEach(seccion => observer.observe(seccion));
  }

  /**
   * Escuchadores de eventos para filtros de categorías
   */
  botonesFiltro.forEach(boton => {
    boton.addEventListener('click', () => {
      botonesFiltro.forEach(b => b.classList.remove('active'));
      boton.classList.add('active');
      filtroActivo = boton.dataset.filter || 'todos';
      renderizarCatalogo();
    });
  });

  /**
   * Buscador de piezas en tiempo real
   */
  if (inputBusqueda) {
    inputBusqueda.addEventListener('input', (e) => {
      terminoBusqueda = e.target.value.trim();
      renderizarCatalogo();
    });
  }

  /**
   * Validación del Formulario de Contacto y Envío Parametrizado a WhatsApp
   */
  if (formularioContacto) {
    formularioContacto.addEventListener('submit', (e) => {
      e.preventDefault();
      e.stopPropagation();

      // Marcar todos los campos con su estado de validación
      formularioContacto.querySelectorAll('input, select, textarea').forEach(aplicarEstadoValidacion);

      if (!formularioContacto.checkValidity()) {
        formularioContacto.classList.add('was-validated');
        return;
      }

      formularioContacto.classList.add('was-validated');

      const datosCliente = {
        nombre: document.getElementById('contacto-nombre')?.value || '',
        telefono: document.getElementById('contacto-telefono')?.value || '',
        correo: document.getElementById('contacto-correo')?.value || '',
        tipo: document.getElementById('contacto-tipo')?.value || '',
        gema: document.getElementById('contacto-gema')?.value || '',
        medida: document.getElementById('contacto-medida')?.value || '',
        mensaje: document.getElementById('contacto-mensaje')?.value || ''
      };

      const urlWhatsApp = crearEnlaceWhatsApp(null, true, datosCliente);

      // Mostrar confirmación visual amigable
      const alertContainer = document.getElementById('contacto-alert');
      if (alertContainer) {
        alertContainer.classList.remove('d-none');
        alertContainer.innerHTML = `
          <div class="alert alert-success d-flex align-items-center justify-content-between p-3 rounded-4 shadow-sm" role="alert">
            <div>
              <i class="bi bi-check-circle-fill fs-5 me-2 text-success"></i>
              <strong>¡Solicitud preparada con éxito!</strong> Redirigiendo a WhatsApp para finalizar la cotización...
            </div>
            <a href="${urlWhatsApp}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success rounded-pill px-3 ms-2">
              Abrir WhatsApp Ahora
            </a>
          </div>
        `;
      }

      // Abrir WhatsApp en nueva pestaña
      setTimeout(() => {
        window.open(urlWhatsApp, '_blank', 'noopener,noreferrer');
      }, 1000);
    });
  }

  /**
   * Cerrar menú colapsable de Bootstrap al hacer click en cualquier enlace (Mobile UX)
   */
  const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
  const navbarCollapse = document.querySelector('.navbar-collapse');
  if (navbarCollapse && typeof bootstrap !== 'undefined') {
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        if (navbarCollapse.classList.contains('show')) {
          const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
          if (bsCollapse) bsCollapse.hide();
        }
      });
    });
  }

  // Inicializar componentes al cargar
  renderizarCatalogo();
  configurarGaleria();
  configurarValidacionTiempoReal();
  configurarScrollSpy();
});
