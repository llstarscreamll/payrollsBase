{{--
    ****************************************************************************
    Show.
    ____________________________________________________________________________
    Muestra la vista de detalles de un registro.
    ****************************************************************************

    Este archivo es parte de Payrolls.
    (c) Johan Alvarez <llstarscreamll@hotmail.com>
    Licensed under The MIT License (MIT).

    @package    Payrolls
    @version    0.1
    @author     Johan Alvarez
    @license    The MIT License (MIT)
    @copyright  (c) 2015-2017, Johan Alvarez <llstarscreamll@hotmail.com>
    @link       https://github.com/llstarscreamll
    
    ****************************************************************************
--}}

@extends('core::layouts.app-sidebar')

{{-- page title --}}
@section('title') {{trans('core::shared.views.show').trans('arlCompany.module.name-singular')}} @stop
{{-- /page title --}}

{{-- view styles --}}
@section('styles')
@endsection
{{-- /view styles --}}

{{-- page content --}}
@section('content')

{{-- heading --}}
@include('arlCompanies.partials.heading', ['small_title' => trans('core::shared.views.show')])
    
{{-- content --}}
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-xs-12 animated fadeInRight">
            <div class="ibox float-e-margins">

            {{-- box content --}}
            <div class="ibox-content">

                @include ('core::partials.notifications')

                {!! Form::model(
                    $arlCompany,
                    [
                        'name' => 'show-arl-companies-form',
                        'data-show' => ($show = true)
                    ]
                ) !!}

                    <div class='form-group col-sm-6 {{$errors->has('id') ? 'has-error' : ''}}'>
                        {!! Form::label('id', trans('arlCompany.form-labels.id')) !!}
                        {!! Form::input('text', 'id', null, ['class' => 'form-control', isset($show) ? 'disabled' : '']) !!}
                    </div>

                    <div class="clearfix"></div>

                    @include('arlCompanies.partials.form-fields', ['show' => ($show = true)])

                    <div class="clearfix"></div>

                    @include('arlCompanies.partials.hidden-form-fields', ['show' => ($show = true)])

                    <div class="clearfix"></div>

                    <div class="form-group col-sm-6">
                        @if(auth()->user()->can('arl-companies.edit'))
                            <a href="{{route('arl-companies.edit', $arlCompany->id)}}" class="btn btn-warning" role="button">
                                <span class="glyphicon glyphicon-pencil"></span>
                                <span class="">{{trans('core::shared.edit-btn')}}</span>
                            </a>
                        @endif

                        @if(auth()->user()->can('arl-companies.destroy'))
                            {{-- Formulario para eliminar registro --}}
                            {!! Form::open(['route' => ['arl-companies.destroy', $arlCompany->id], 'method' => 'DELETE', 'class' => 'form-inline display-inline']) !!}
                                
                                {{-- Botón muestra ventana modal de confirmación para el envío de formulario de eliminar el registro --}}
                                <button type="button"
                                        class="btn btn-danger bootbox-dialog"
                                        role="button"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        {{-- Setup de ventana modal de confirmación --}}
                                        data-modalMessage="{{trans('core::shared.modal-delete-message', ['item' => $arlCompany->name])}}"
                                        data-modalTitle="{{trans('core::shared.modal-delete-title')}}"
                                        data-btnLabel="{{trans('core::shared.modal-delete-btn-confirm')}}"
                                        data-btnClassName="btn-danger"
                                        title="{{trans('core::shared.delete-btn')}}">
                                    <span class="fa fa-minus-circle"></span>
                                    <span class="">{{trans('core::shared.delete-btn')}}</span>
                                </button>
                            
                            {!! Form::close() !!}
                        @endif
                    </div>

                    <div class="clearfix"></div>

                {!! Form::close() !!}

            </div>
            {{-- /box content --}}
            </div>{{-- /ibox --}}
        </div>{{-- /col-**-** --}}
    </div>{{-- /row --}}
</div>
{{-- /content --}}

@endsection
{{-- /page content --}}

{{-- view scripts--}}
@section('scripts')
@include('arlCompanies.partials.form-scripts')
@endsection()