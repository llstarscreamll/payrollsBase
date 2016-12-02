<?php

return [
    
    /**
     * Este archivo contiene los strings de idioma de uso común en todo el
     * sistema, como por ejemplo labels de botones, opciones de ventanas
     * modales, etc.
     */
    
    'table-actions-column' => 'Acciones',
    'empty-value' => '---',

    // labels de botones
    'create-btn' => 'Crear',
    'show-btn' => 'Ver detalles',
    'edit-btn' => 'Editar',
    'trash-btn' => 'Mover a Papelera',
    'delete-btn' => 'Eliminar',
    'restore-btn' => 'Restaurar',

    // labels de botones de acción masiva
    'restore-many-btn' => 'Restaurar seleccionados',
    'trash-many-btn' => 'Mover seleccionados a papelera',
    'delete-many-btn' => 'Eliminar seleccionados',

    // filtros de index
    'more-filters-btn' => 'Más Filtros',
    'search-btn' => 'Buscar',
    'clean-filters-btn' => 'Limpiar filtros',
    'more-filters-table-columns' => 'Mostra/Ocultar Columnas',

    // opciones comunes de filtros de búsqueda
    'filter-with-trashed' => 'Con Reg. Borrados',
    'filter-only-trashed' => 'Sólo Reg. Borrados',

    // nombres predeterminados de vistas
    'views' => [
        'index' => 'Index',
        'create' => 'Crear',
        'show' => 'Detalles',
        'edit' => 'Editar',
    ],
    
    // otros mensajes
    'inputs-required-msg' => 'Los campos marcados con <strong>*</strong> son requeridos.',
    'no-records-found' => 'No se encontraron registros...',

    // ventana modal de confirmación para restaurar registro
    'modal-restore-title' => 'Está seguro?',
    'modal-restore-message' => 'La información de :item será Restaurada...',
    'modal-restore-btn-confirm' => 'Restaurar',

    // ventana modal de confirmación para restaurar varios registros
    'modal-restore-many-title' => 'Está seguro?',
    'modal-restore-many-message' => 'Los elementos seleccionados serán Restaurados...',
    'modal-restore-many-btn-confirm' => 'Restaurar Todos',

    // ventana modal de confirmación para mover a papelera un registro
    'modal-trash-title' => 'Está seguro?',
    'modal-trash-message' => 'La información de :item será Movida a la Papelera...',
    'modal-trash-btn-confirm' => 'Mover',

    // ventana modal de confirmación para mover a papelera varios registros
    'modal-trash-many-title' => 'Está seguro?',
    'modal-trash-many-message' => 'Los elementos seleccionados serán Movidos a Papelera...',
    'modal-trash-many-btn-confirm' => 'Mover Todos',

    // ventana modal de confirmación para eliminar un registro
    'modal-delete-title' => 'Está seguro?',
    'modal-delete-message' => 'La información de :item será ELIMINADA...',
    'modal-delete-btn-confirm' => 'Eliminar',

    // ventana modal de confirmación para eliminar varios registros
    'modal-delete-many-title' => 'Está seguro?',
    'modal-delete-many-message' => 'Los elementos seleccionados serán ELIMINADOS...',
    'modal-delete-many-btn-confirm' => 'Eliminar Todos',

    // textos de opciones por defecto de plugin Bootbox de ventanas modales
    'modal-default-title' => 'Está Seguro?',
    'modal-default-btn-confirmation' => 'Confirmar',
    'modal-default-btn-cancel' => 'Cancelar',

    // para el componente Bootstrap dateRangePicker
    'daterangepicker' => [
        'applyLabel' => 'Aplicar',
        'cancelLabel' => 'Limpiar',
        'fromLabel' => 'Desde',
        'toLabel' => 'Hasta',
        'separator' => ' - ',
        'weekLabel' => 'S',
        'customRangeLabel' => 'Personalizado',
        'daysOfWeek' => "['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi','Sa']",
        'monthNames' => "['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']",
        'firstDay' => '1',
        // rangos predeterminados
        'range_today' => 'Hoy',
        'range_yesterday' => 'Ayer',
        'range_last_7_days' => 'Últimos 7 días',
        'range_last_30_days' => 'Últimos 30 días',
        'range_this_month' => 'Este mes',
        'range_last_month' => 'Mes pasado',
    ],
];
