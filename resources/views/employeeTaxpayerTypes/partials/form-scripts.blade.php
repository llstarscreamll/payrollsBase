{{--
    ****************************************************************************
    Scripts de Formulario.
    ____________________________________________________________________________
    Contiene el código javascript usado en el formulario.
    ****************************************************************************

    Este archivo es parte de Payrolls.
    (c) Johan Alvarez <llstarscreamll@hotmail.com>
    Licensed under The MIT License (MIT).

    @package    Payrolls
    @version    0.1
    @author     Johan Alvarez
    @license    The MIT License (MIT)
    @copyright  (c) 2015-2016, Johan Alvarez <llstarscreamll@hotmail.com>
    @link       https://github.com/llstarscreamll
    
    ****************************************************************************
--}}

<script type="text/javascript">

    {{-- Configuración de Bootstrap DateTimePicker --}}
    
    {{-- Inicialización y configuración de Bootbox --}}
    initBootBoxComponent(
        '{{ trans('employeeTaxpayerType.index.modal-default-title') }}',
        '{{ trans('employeeTaxpayerType.index.modal-default-btn-confirmation') }}',
        'btn-primary',
        '{{ trans('core::shared.modal-default-btn-cancel') }}',
        'btn-default'
    );
    
</script>