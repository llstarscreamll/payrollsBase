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
	{!! Form::label('name', trans('company.form-labels.name')) !!}
	{!! Form::input('text', 'name', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('identity_card_type_id') ? 'has-error' : null }}'>
	{!! Form::label('identity_card_type_id', trans('company.form-labels.identity_card_type_id')) !!}
	{!! Form::select(
		'identity_card_type_id',
		$identity_card_type_id_list,
		Request::input('identity_card_type_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('identity_card_type_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('contributor_identity_card_number') ? 'has-error' : null }}'>
	{!! Form::label('contributor_identity_card_number', trans('company.form-labels.contributor_identity_card_number')) !!}
	{!! Form::input('text', 'contributor_identity_card_number', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('contributor_identity_card_number', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('verification_digit') ? 'has-error' : null }}'>
	{!! Form::label('verification_digit', trans('company.form-labels.verification_digit')) !!}
	{!! Form::input('number', 'verification_digit', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('verification_digit', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('company_taxpayer_type_id') ? 'has-error' : null }}'>
	{!! Form::label('company_taxpayer_type_id', trans('company.form-labels.company_taxpayer_type_id')) !!}
	{!! Form::select(
		'company_taxpayer_type_id',
		$company_taxpayer_type_id_list,
		Request::input('company_taxpayer_type_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('company_taxpayer_type_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('legal_company_nature_id') ? 'has-error' : null }}'>
	{!! Form::label('legal_company_nature_id', trans('company.form-labels.legal_company_nature_id')) !!}
	{!! Form::select(
		'legal_company_nature_id',
		$legal_company_nature_id_list,
		Request::input('legal_company_nature_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('legal_company_nature_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('legal_person_nature_id') ? 'has-error' : null }}'>
	{!! Form::label('legal_person_nature_id', trans('company.form-labels.legal_person_nature_id')) !!}
	{!! Form::select(
		'legal_person_nature_id',
		$legal_person_nature_id_list,
		Request::input('legal_person_nature_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('legal_person_nature_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('has_branches') ? 'has-error' : null }}'>
	{!! Form::label('has_branches', trans('company.form-labels.has_branches')) !!}
	<br>
	{!! Form::hidden('has_branches', '0') !!}
	{!! Form::checkbox(
		'has_branches',
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

	{!! $errors->first('has_branches', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('applay_1607_law') ? 'has-error' : null }}'>
	{!! Form::label('applay_1607_law', trans('company.form-labels.applay_1607_law')) !!}
	<br>
	{!! Form::hidden('applay_1607_law', '0') !!}
	{!! Form::checkbox(
		'applay_1607_law',
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

	{!! $errors->first('applay_1607_law', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('applay_1429_law') ? 'has-error' : null }}'>
	{!! Form::label('applay_1429_law', trans('company.form-labels.applay_1429_law')) !!}
	<br>
	{!! Form::hidden('applay_1429_law', '0') !!}
	{!! Form::checkbox(
		'applay_1429_law',
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

	{!! $errors->first('applay_1429_law', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('founded_at') ? 'has-error' : null }}'>
	{!! Form::label('founded_at', trans('company.form-labels.founded_at')) !!}
	{!! Form::input('text', 'founded_at', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('founded_at', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('address') ? 'has-error' : null }}'>
	{!! Form::label('address', trans('company.form-labels.address')) !!}
	{!! Form::input('text', 'address', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('municipality_id') ? 'has-error' : null }}'>
	{!! Form::label('municipality_id', trans('company.form-labels.municipality_id')) !!}
	{!! Form::select(
		'municipality_id',
		$municipality_id_list,
		Request::input('municipality_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('municipality_id', '<span class="text-danger">:message</span>') !!}
</div>
