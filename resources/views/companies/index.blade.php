{{--
    ****************************************************************************
    Vista Index.
    ____________________________________________________________________________
    En esta vista se muestra una tabla con registros de la base de datos (ver
    partials.index-table), se muestran botones a acciones y/o links de acceso a
    otras secciones, por ejemplo eliminar o crear registros (revisar
    partials.index-buttons).
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

@extends('core::layouts.app-sidebar')

{{-- page title --}}
@section('title') {{trans('company.module.name')}} @endsection
{{-- /page title --}}

{{-- view styles --}}
@section('styles')
@endsection
{{-- /view styles --}}

{{-- page content --}}
@section('content')

{{-- heading --}}
@include('companies.partials.heading')

{{-- content --}}
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-xs-12 animated fadeInRight">
            <div class="ibox float-e-margins">

            {{-- box content --}}
            <div class="ibox-content">
                
                {{-- botonera --}}
                @include('companies.partials.index-buttons')
                
                {{-- notificaciones --}}
                @include('core::partials.notifications')
                
                {{-- tabla de datos --}}
                @include('companies.partials.index-table')

            </div>
            {{-- /box content --}}

            {{-- box footer --}}
            <div class="ibox-footer">
                <span class="pull-right version-info">
                    <strong>v0.1</strong>
                </span>
                <div class="clearfix"></div>
            </div>
            {{-- /box footer --}}
            </div>{{-- /ibox --}}
        </div>{{-- /col-**-** --}}
    </div>{{-- /row --}}
</div>
{{-- /content --}}

@endsection
{{-- /page content --}}

{{-- view scripts--}}
@section('scripts')
@include('companies.partials.form-scripts')
<script>
    $(document).ready(function() {
        $(".select2-ids").select2({tags: true, language: "es"});
        {{-- Inicializa las mejoras de selección en la tabla --}}
        setupTableSelectionAddons();
        {{-- Inicializa el componente iCheck --}}
        initiCheckPlugin();
        {{-- Previene que se esconda el dropdown al hacer clic en sus elementos hijos --}}
        preventDropDownHide();
        {{-- Inicializa el componente BootstrapSwitch --}}
        $(".bootstrap_switch").bootstrapSwitch();
    });

    {{-- Configuración regional para Bootstrap DateRangePicker --}}
    dateRangePickerLocaleSettings = @include('core::shared.dateRangePickerLocales')

    {{-- Algunos rangos de fecha predeterminados para Bootstrap DateRangePicker --}}
    dateRangePickerRangesSettings = @include('core::shared.dateRangePickerRanges')

    let dateRangeFields = [
        {
            field: 'input.plugin-date',
            format: 'YYYY-MM-DD',
            with_time_picker: false,
            opens: 'center',
        },
        {
            field: 'input.plugin-datetime',
            format: 'YYYY-MM-DD HH:mm:ss',
            with_time_picker: true,
            opens: 'left',
        }
    ];

    {{-- Configuración de Bootstrap DateRangePicker --}}
    setupDateRangePickers(
        dateRangeFields,
        dateRangePickerLocaleSettings,
        dateRangePickerRangesSettings
    );
</script>
@endsection