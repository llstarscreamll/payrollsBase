<?php
/* @var $gen llstarscreamll\Crud\Providers\TestsGenerator */
/* @var $fields [] */
/* @var $request Request */
?>
{{--
    ****************************************************************************
    Show.
    ____________________________________________________________________________
    Muestra la vista de detalles de un registro.
    ****************************************************************************

    <?= $gen->getViewCopyRightDocBlock() ?>
    
    ****************************************************************************
--}}

@extends('<?=config('modules.crud.config.layout')?>')

{{-- page title --}}
@section('title') {{trans('<?= $gen->solveSharedResourcesNamespace() ?>.views.show').trans('<?=$gen->getLangAccess()?>.module.name-singular')}} @stop
{{-- /page title --}}

{{-- view styles --}}
@section('styles')
@endsection
{{-- /view styles --}}

{{-- page content --}}
@section('content')

{{-- heading --}}
@include('<?=$gen->viewsDirName()?>.partials.heading', ['small_title' => trans('<?= $gen->solveSharedResourcesNamespace() ?>.views.show')])
    
{{-- content --}}
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-xs-12 animated fadeInRight">
            <div class="ibox float-e-margins">

            {{-- box content --}}
            <div class="ibox-content">

                @include ('<?=config('modules.crud.config.layout-namespace')?>partials.notifications')

                {!! Form::model(
                    $<?=$gen->modelVariableName()?>,
                    [
                        'name' => 'show-<?=$gen->getDashedModelName()?>-form',
                        'data-show' => ($show = true)
                    ]
                ) !!}

                    <div class='form-group col-sm-6 {{$errors->has('id') ? 'has-error' : ''}}'>
                        {!! Form::label('id', trans('<?=$gen->getLangAccess()?>.form-labels.id')) !!}
                        {!! Form::input('text', 'id', null, ['class' => 'form-control', isset($show) ? 'disabled' : '']) !!}
                    </div>

                    <div class="clearfix"></div>

                    @include('<?=$gen->viewsDirName()?>.partials.form-fields', ['show' => ($show = true)])

                    <div class="clearfix"></div>

                    @include('<?=$gen->viewsDirName()?>.partials.hidden-form-fields', ['show' => ($show = true)])

                    <div class="clearfix"></div>

                    <div class="form-group col-sm-6">
                        @if(auth()->user()->can('<?=$gen->route()?>.edit'))
                            <a href="{{route('<?=$gen->route()?>.edit', $<?=$gen->modelVariableName()?>->id)}}" class="btn btn-warning" role="button">
                                <span class="glyphicon glyphicon-pencil"></span>
                                <span class="">{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.edit-btn')}}</span>
                            </a>
                        @endif

                        @if(auth()->user()->can('<?=$gen->route()?>.destroy'))
                            {{-- Formulario para eliminar registro --}}
                            {!! Form::open(['route' => ['<?=$gen->route()?>.destroy', $<?=$gen->modelVariableName()?>->id], 'method' => 'DELETE', 'class' => 'form-inline display-inline']) !!}
                                
                                {{-- Botón muestra ventana modal de confirmación para el envío de formulario de eliminar el registro --}}
                                <button type="<?= $request->has('use_modal_confirmation_on_delete') ? 'button' : 'submit' ?>"
                                        class="btn btn-danger <?= $request->has('use_modal_confirmation_on_delete') ? 'bootbox-dialog' : null ?>"
                                        role="button"
                                        data-toggle="tooltip"
                                        data-placement="top"
<?php if ($request->has('use_modal_confirmation_on_delete')) { ?>
                                        {{-- Setup de ventana modal de confirmación --}}
                                        data-modalMessage="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.modal-<?= $gen->getDestroyVariableName() ?>-message', ['item' => $<?=$gen->modelVariableName()?>->name])}}"
                                        data-modalTitle="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.modal-<?= $gen->getDestroyVariableName() ?>-title')}}"
                                        data-btnLabel="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.modal-<?= $gen->getDestroyVariableName() ?>-btn-confirm')}}"
                                        data-btnClassName="btn-danger"
<?php } else { ?>
                                        onclick="return confirm('{{ trans('<?=$gen->getLangAccess()?>.index.<?= $gen->getDestroyVariableName() ?>-confirm-message') }}')"
<?php } ?>
                                        title="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.<?= $gen->getDestroyVariableName() ?>-btn')}}">
                                    <span class="fa fa-<?= $gen->getDestroyVariableName() == 'trash' ? 'trash' : 'minus-circle' ?>"></span>
                                    <span class="">{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.<?= $gen->getDestroyVariableName() ?>-btn')}}</span>
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
<?php if ($request->get('include_assets', false)) { ?>
@include('<?=$gen->viewsDirName()?>.partials.form-assets')
<?php } ?>
@include('<?=$gen->viewsDirName()?>.partials.form-scripts')
@endsection()