{{--
    ****************************************************************************
    Campos de formulario.
    ____________________________________________________________________________
    Contiene los campos del formulario de creación, actualización o detalles del
    registro.
    Si se desea que sean mostrados en modo deshabilitado, pasar la variable
    $show = true cuando sea llamada esta vista, util para el caso en que sólo se
    quiera visualizar los datos sin riesgo a que se hagan cambios.
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

<div class='form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : null }}'>
	{!! Form::label('name', trans('contributorType.form-labels.name')) !!}
	{!! Form::input('text', 'name', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('short_name') ? 'has-error' : null }}'>
	{!! Form::label('short_name', trans('contributorType.form-labels.short_name')) !!}
	{!! Form::input('text', 'short_name', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('short_name', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>
