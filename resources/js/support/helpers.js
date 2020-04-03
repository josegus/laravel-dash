/**
 * Build and absolute url to some path
 *
 * @param stringUrl
 * @param afterUrl
 * @returns {string}
 */
window.url = function (stringUrl, afterUrl = null) {
    let baseUrl = document.head.querySelector('meta[name="base-url"]').content;
    let url = baseUrl + '/' + stringUrl;

    if (afterUrl === null) {
        return url;
    }

    afterUrl = afterUrl.toString();

    if (afterUrl.startsWith('/') === false) {
        afterUrl = `/${ afterUrl }`;
    }

    return url + afterUrl;
};

/**
 * Get csrf-token value present on meta header
 *
 * @returns string
 */
window.token = function () {
    return document.head.querySelector('meta[name="csrf-token"]').content;
};

/**
 * Get csrf-token with name and value object
 *
 * @returns {{"X-CSRF-TOKEN": string}}
 */
window.tokenWithKey = function () {
    return {
        'X-CSRF-TOKEN': token()
    };
};

window.lockScreen = function () {
    const loader = document.getElementsByClassName('js-loader')[0];

    if (loader) {
        loader.style.display = 'flex';
    }
};

window.unlockScreen = function () {
    const loader = document.getElementsByClassName('js-loader')[0];

    if (loader) {
        loader.style.display = 'none';
    }
};

window.onload = function () {
    unlockScreen();
};

/**
 * The base config parameter to start datatable
 *
 * @param config
 * @returns {{}}
 */
window.dataTable = function (config) {
    const base = {
        processing: true,
        serverSide: true,
        ajax: {
            headers: config.ajax.headers,
            url: config.ajax.url,
            type: 'get',
            data: config.ajax.data,
            dataType: 'json',
            success: config.ajax.success,
            error: config.ajax.error || function (err) {
                console.log(err);
            }
        },
        columns: config.columns,
        columnDefs: config.columnDefs,
        responsive: true,
        pagingType: 'full_numbers',
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    };

    return  { ...config, ...base };
};

// Confirm submit
document.addEventListener('submit', function (event) {
    const form = event.target;

    if (form.dataset.lock !== 'false') {
        lockScreen();
        return;
    }

    if (form.dataset.confirm === 'true') {
        let question = form.dataset.question || '¿Está seguro de continuar?';

        let confirmed = confirm(question);

        if (!confirmed) {
            event.preventDefault();
        }
    }
});
