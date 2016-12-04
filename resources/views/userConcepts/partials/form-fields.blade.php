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
    @copyright  (c) 2015-2016, Johan Alvarez <llstarscreamll@hotmail.com>
    @link       https://github.com/llstarscreamll
    
    ****************************************************************************
--}}

<div class='form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : null }}'>
	{!! Form::label('name', trans('userConcept.form-labels.name')) !!}
	{!! Form::input('text', 'name', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('type') ? 'has-error' : null }}'>
	{!! Form::label('type', trans('userConcept.form-labels.type')) !!}
	{!! Form::select(
		'type',
		$type_list,
		Request::input('type'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('type', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('is_wage') ? 'has-error' : null }}'>
	{!! Form::label('is_wage', trans('userConcept.form-labels.is_wage')) !!}
	<br>
	{!! Form::hidden('is_wage', '0') !!}
	{!! Form::checkbox(
		'is_wage',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('is_wage', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('apply_1393_law') ? 'has-error' : null }}'>
	{!! Form::label('apply_1393_law', trans('userConcept.form-labels.apply_1393_law')) !!}
	<br>
	{!! Form::hidden('apply_1393_law', '0') !!}
	{!! Form::checkbox(
		'apply_1393_law',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('apply_1393_law', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('retention') ? 'has-error' : null }}'>
	{!! Form::label('retention', trans('userConcept.form-labels.retention')) !!}
	<br>
	{!! Form::hidden('retention', '0') !!}
	{!! Form::checkbox(
		'retention',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('retention', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('ibc_health') ? 'has-error' : null }}'>
	{!! Form::label('ibc_health', trans('userConcept.form-labels.ibc_health')) !!}
	<br>
	{!! Form::hidden('ibc_health', '0') !!}
	{!! Form::checkbox(
		'ibc_health',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('ibc_health', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('ibc_pension') ? 'has-error' : null }}'>
	{!! Form::label('ibc_pension', trans('userConcept.form-labels.ibc_pension')) !!}
	<br>
	{!! Form::hidden('ibc_pension', '0') !!}
	{!! Form::checkbox(
		'ibc_pension',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('ibc_pension', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('ibc_arl') ? 'has-error' : null }}'>
	{!! Form::label('ibc_arl', trans('userConcept.form-labels.ibc_arl')) !!}
	<br>
	{!! Form::hidden('ibc_arl', '0') !!}
	{!! Form::checkbox(
		'ibc_arl',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('ibc_arl', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('ccf_base') ? 'has-error' : null }}'>
	{!! Form::label('ccf_base', trans('userConcept.form-labels.ccf_base')) !!}
	<br>
	{!! Form::hidden('ccf_base', '0') !!}
	{!! Form::checkbox(
		'ccf_base',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('ccf_base', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('sena_base') ? 'has-error' : null }}'>
	{!! Form::label('sena_base', trans('userConcept.form-labels.sena_base')) !!}
	<br>
	{!! Form::hidden('sena_base', '0') !!}
	{!! Form::checkbox(
		'sena_base',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('sena_base', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('icbf_base') ? 'has-error' : null }}'>
	{!! Form::label('icbf_base', trans('userConcept.form-labels.icbf_base')) !!}
	<br>
	{!! Form::hidden('icbf_base', '0') !!}
	{!! Form::checkbox(
		'icbf_base',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('icbf_base', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('severance_base') ? 'has-error' : null }}'>
	{!! Form::label('severance_base', trans('userConcept.form-labels.severance_base')) !!}
	<br>
	{!! Form::hidden('severance_base', '0') !!}
	{!! Form::checkbox(
		'severance_base',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('severance_base', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('premium_base') ? 'has-error' : null }}'>
	{!! Form::label('premium_base', trans('userConcept.form-labels.premium_base')) !!}
	<br>
	{!! Form::hidden('premium_base', '0') !!}
	{!! Form::checkbox(
		'premium_base',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('premium_base', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('provisioning_holiday') ? 'has-error' : null }}'>
	{!! Form::label('provisioning_holiday', trans('userConcept.form-labels.provisioning_holiday')) !!}
	<br>
	{!! Form::hidden('provisioning_holiday', '0') !!}
	{!! Form::checkbox(
		'provisioning_holiday',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('provisioning_holiday', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('money_holiday_base') ? 'has-error' : null }}'>
	{!! Form::label('money_holiday_base', trans('userConcept.form-labels.money_holiday_base')) !!}
	<br>
	{!! Form::hidden('money_holiday_base', '0') !!}
	{!! Form::checkbox(
		'money_holiday_base',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('money_holiday_base', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('holidays_enjoyed') ? 'has-error' : null }}'>
	{!! Form::label('holidays_enjoyed', trans('userConcept.form-labels.holidays_enjoyed')) !!}
	<br>
	{!! Form::hidden('holidays_enjoyed', '0') !!}
	{!! Form::checkbox(
		'holidays_enjoyed',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('holidays_enjoyed', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('holiday_contract_settlement') ? 'has-error' : null }}'>
	{!! Form::label('holiday_contract_settlement', trans('userConcept.form-labels.holiday_contract_settlement')) !!}
	<br>
	{!! Form::hidden('holiday_contract_settlement', '0') !!}
	{!! Form::checkbox(
		'holiday_contract_settlement',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('holiday_contract_settlement', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('indemnity') ? 'has-error' : null }}'>
	{!! Form::label('indemnity', trans('userConcept.form-labels.indemnity')) !!}
	<br>
	{!! Form::hidden('indemnity', '0') !!}
	{!! Form::checkbox(
		'indemnity',
		1,
		null,
		[
			'class' => 'bootstrap_switch',
			'data-size' => 'medium',
			'data-on-text' => 'Si',
			'data-off-text' => 'No',
			'data-on-color' => 'primary',
			'data-off-color' => 'default',
			isset($show) ? 'disabled' : null,
		])
	!!}

	{!! $errors->first('indemnity', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>
