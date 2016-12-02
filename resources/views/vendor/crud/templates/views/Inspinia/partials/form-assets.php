{{--
    ****************************************************************************
    Los Assets del Formulario.
    ____________________________________________________________________________
    Contiene los assets utilizados en el formulario de creación o edición.
    ****************************************************************************

    <?= $gen->getViewCopyRightDocBlock() ?>
    
    ****************************************************************************
--}}

<?php if ($gen->hasSelectFields($fields)) { ?>
    {{-- Bootstrap-Select --}}
    <link href="{{ asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/dist/js/i18n/defaults-es_CL.min.js') }}"></script>
<?php } ?>
<?php if ($gen->hasTinyintTypeField($fields)) { ?>
    {{-- BootstrapSwitch --}}
    <link href="{{ asset('plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<?php } ?>
<?php if ($gen->hasDateFields($fields) || $gen->hasDateTimeFields($fields)) { ?>
    {{-- Bootstrap DateTimePicker --}}
    <link rel="stylesheet" href="{{ asset('plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"/>
    <script src="{{ asset('plugins/moment/min/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<?php } ?>
<?php
/**
 * si se quiere usar ventanas modales de confirmación para acciones como eliminar
 * registros u otras, incluimos el componente Bootbox para generarles fácilmente
 * y con un setup mínimo.
 */
?>
<?php if ($request->has('use_modal_confirmation_on_delete')) { ?>
    {{-- Bootbox --}}
    <script src="{{ asset('plugins/bootbox/bootbox.js') }}" type="text/javascript"></script>
<?php } ?>