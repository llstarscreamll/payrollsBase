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

<div class='form-group col-sm-6 {{ $errors->has('dni') ? 'has-error' : null }}'>
	{!! Form::label('dni', trans('employee.form-labels.dni')) !!}
	{!! Form::input('text', 'dni', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('dni', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('name') ? 'has-error' : null }}'>
	{!! Form::label('name', trans('employee.form-labels.name')) !!}
	{!! Form::input('text', 'name', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('lastname') ? 'has-error' : null }}'>
	{!! Form::label('lastname', trans('employee.form-labels.lastname')) !!}
	{!! Form::input('text', 'lastname', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('lastname', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('branch_id') ? 'has-error' : null }}'>
	{!! Form::label('branch_id', trans('employee.form-labels.branch_id')) !!}
	{!! Form::select(
		'branch_id',
		$branch_id_list,
		Request::input('branch_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('branch_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('contract_type') ? 'has-error' : null }}'>
	{!! Form::label('contract_type', trans('employee.form-labels.contract_type')) !!}
	{!! Form::select(
		'contract_type',
		$contract_type_list,
		Request::input('contract_type'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('contract_type', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('salary') ? 'has-error' : null }}'>
	{!! Form::label('salary', trans('employee.form-labels.salary')) !!}
	{!! Form::input('text', 'salary', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('salary', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('salary_type') ? 'has-error' : null }}'>
	{!! Form::label('salary_type', trans('employee.form-labels.salary_type')) !!}
	{!! Form::select(
		'salary_type',
		$salary_type_list,
		Request::input('salary_type'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('salary_type', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('occupational_risk_level') ? 'has-error' : null }}'>
	{!! Form::label('occupational_risk_level', trans('employee.form-labels.occupational_risk_level')) !!}
	{!! Form::select(
		'occupational_risk_level',
		$occupational_risk_level_list,
		Request::input('occupational_risk_level'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('occupational_risk_level', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('employee_taxpayer_type_id') ? 'has-error' : null }}'>
	{!! Form::label('employee_taxpayer_type_id', trans('employee.form-labels.employee_taxpayer_type_id')) !!}
	{!! Form::input('number', 'employee_taxpayer_type_id', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('employee_taxpayer_type_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('dependents_deduction') ? 'has-error' : null }}'>
	{!! Form::label('dependents_deduction', trans('employee.form-labels.dependents_deduction')) !!}
	{!! Form::input('number', 'dependents_deduction', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('dependents_deduction', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('average_EPS_contributions_last_year') ? 'has-error' : null }}'>
	{!! Form::label('average_EPS_contributions_last_year', trans('employee.form-labels.average_EPS_contributions_last_year')) !!}
	{!! Form::input('number', 'average_EPS_contributions_last_year', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('average_EPS_contributions_last_year', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('home_interest_deduction_last_year') ? 'has-error' : null }}'>
	{!! Form::label('home_interest_deduction_last_year', trans('employee.form-labels.home_interest_deduction_last_year')) !!}
	{!! Form::input('number', 'home_interest_deduction_last_year', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('home_interest_deduction_last_year', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('prepaid_medicine') ? 'has-error' : null }}'>
	{!! Form::label('prepaid_medicine', trans('employee.form-labels.prepaid_medicine')) !!}
	{!! Form::input('number', 'prepaid_medicine', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('prepaid_medicine', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('applay_2090_decree') ? 'has-error' : null }}'>
	{!! Form::label('applay_2090_decree', trans('employee.form-labels.applay_2090_decree')) !!}
	<br>
	{!! Form::hidden('applay_2090_decree', '0') !!}
	{!! Form::checkbox(
		'applay_2090_decree',
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

	{!! $errors->first('applay_2090_decree', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('contributor_subtype') ? 'has-error' : null }}'>
	{!! Form::label('contributor_subtype', trans('employee.form-labels.contributor_subtype')) !!}
	<br>
	{!! Form::hidden('contributor_subtype', '0') !!}
	{!! Form::checkbox(
		'contributor_subtype',
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

	{!! $errors->first('contributor_subtype', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('admitted_at') ? 'has-error' : null }}'>
	{!! Form::label('admitted_at', trans('employee.form-labels.admitted_at')) !!}
	{!! Form::input('text', 'admitted_at', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('admitted_at', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('egressed_at') ? 'has-error' : null }}'>
	{!! Form::label('egressed_at', trans('employee.form-labels.egressed_at')) !!}
	{!! Form::input('text', 'egressed_at', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('egressed_at', '<span class="text-danger">:message</span>') !!}
</div>
