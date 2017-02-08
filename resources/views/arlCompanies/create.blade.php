{{--
    ****************************************************************************
    Create.
    ____________________________________________________________________________
    Muestra la vista de creación de registros.
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
@section('title') {{ trans('arlCompany.index-create-btn') }} @endsection
{{-- /page title --}}

{{-- view styles --}}
@section('styles')
@endsection
{{-- /view styles --}}

{{-- page content --}}
@section('content')

{{-- heading --}}
@include('arlCompanies.partials.heading', ['small_title' => trans('core::shared.views.create')])
    
{{-- content --}}
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-xs-12 animated fadeInRight">
            <div class="ibox float-e-margins">

            {{-- box content --}}
            <div class="ibox-content">

                @include ('core::partials.notifications')
                
                {!! Form::open([
                    'route' => 'arl-companies.store',
                    'method' => 'POST',
                    'name' => 'create-arl-companies-form'
                ]) !!}

                    @include('arlCompanies.partials.form-fields')

                    <div class="clearfix"></div>
                    
                    <div class="form-group col-sm-6">
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            <span class="">{{trans('core::shared.create-btn')}}</span>
                        </button>
                        <span id="helpBlock" class="help-block">
                            {!!trans('core::shared.inputs-required-msg')!!}
                        </span>
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