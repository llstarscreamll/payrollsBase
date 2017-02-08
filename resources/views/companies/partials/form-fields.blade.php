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

<div class='form-group col-sm-6 {{ $errors->has('person_type') ? 'has-error' : null }}'>
	{!! Form::label('person_type', trans('company.form-labels.person_type')) !!}
	{!! Form::input('text', 'person_type', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('person_type', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('address') ? 'has-error' : null }}'>
	{!! Form::label('address', trans('company.form-labels.address')) !!}
	{!! Form::input('text', 'address', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
</div>

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

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('dane_activity_code') ? 'has-error' : null }}'>
	{!! Form::label('dane_activity_code', trans('company.form-labels.dane_activity_code')) !!}
	{!! Form::input('text', 'dane_activity_code', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('dane_activity_code', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('phone') ? 'has-error' : null }}'>
	{!! Form::label('phone', trans('company.form-labels.phone')) !!}
	{!! Form::input('text', 'phone', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('phone', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('fax') ? 'has-error' : null }}'>
	{!! Form::label('fax', trans('company.form-labels.fax')) !!}
	{!! Form::input('text', 'fax', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('fax', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('email') ? 'has-error' : null }}'>
	{!! Form::label('email', trans('company.form-labels.email')) !!}
	{!! Form::input('text', 'email', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('legal_rep_identity_card_type_id') ? 'has-error' : null }}'>
	{!! Form::label('legal_rep_identity_card_type_id', trans('company.form-labels.legal_rep_identity_card_type_id')) !!}
	{!! Form::select(
		'legal_rep_identity_card_type_id',
		$legal_rep_identity_card_type_id_list,
		Request::input('legal_rep_identity_card_type_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('legal_rep_identity_card_type_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('legal_rep_identity_card_number') ? 'has-error' : null }}'>
	{!! Form::label('legal_rep_identity_card_number', trans('company.form-labels.legal_rep_identity_card_number')) !!}
	{!! Form::input('text', 'legal_rep_identity_card_number', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('legal_rep_identity_card_number', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('legal_rep_verification_digit') ? 'has-error' : null }}'>
	{!! Form::label('legal_rep_verification_digit', trans('company.form-labels.legal_rep_verification_digit')) !!}
	{!! Form::input('number', 'legal_rep_verification_digit', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('legal_rep_verification_digit', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('legal_rep_first_name') ? 'has-error' : null }}'>
	{!! Form::label('legal_rep_first_name', trans('company.form-labels.legal_rep_first_name')) !!}
	{!! Form::input('text', 'legal_rep_first_name', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('legal_rep_first_name', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('legal_rep_middle_name') ? 'has-error' : null }}'>
	{!! Form::label('legal_rep_middle_name', trans('company.form-labels.legal_rep_middle_name')) !!}
	{!! Form::input('text', 'legal_rep_middle_name', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('legal_rep_middle_name', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('legal_rep_first_surname') ? 'has-error' : null }}'>
	{!! Form::label('legal_rep_first_surname', trans('company.form-labels.legal_rep_first_surname')) !!}
	{!! Form::input('text', 'legal_rep_first_surname', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('legal_rep_first_surname', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('legal_rep_last_surname') ? 'has-error' : null }}'>
	{!! Form::label('legal_rep_last_surname', trans('company.form-labels.legal_rep_last_surname')) !!}
	{!! Form::input('text', 'legal_rep_last_surname', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('legal_rep_last_surname', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('legal_rep_email') ? 'has-error' : null }}'>
	{!! Form::label('legal_rep_email', trans('company.form-labels.legal_rep_email')) !!}
	{!! Form::input('text', 'legal_rep_email', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('legal_rep_email', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('contact_first_name') ? 'has-error' : null }}'>
	{!! Form::label('contact_first_name', trans('company.form-labels.contact_first_name')) !!}
	{!! Form::input('text', 'contact_first_name', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('contact_first_name', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('contact_last_name') ? 'has-error' : null }}'>
	{!! Form::label('contact_last_name', trans('company.form-labels.contact_last_name')) !!}
	{!! Form::input('text', 'contact_last_name', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('contact_last_name', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('contact_cell_phone') ? 'has-error' : null }}'>
	{!! Form::label('contact_cell_phone', trans('company.form-labels.contact_cell_phone')) !!}
	{!! Form::input('text', 'contact_cell_phone', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('contact_cell_phone', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('contact_email') ? 'has-error' : null }}'>
	{!! Form::label('contact_email', trans('company.form-labels.contact_email')) !!}
	{!! Form::input('text', 'contact_email', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('contact_email', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('contributor_class_id') ? 'has-error' : null }}'>
	{!! Form::label('contributor_class_id', trans('company.form-labels.contributor_class_id')) !!}
	{!! Form::select(
		'contributor_class_id',
		$contributor_class_id_list,
		Request::input('contributor_class_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('contributor_class_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('presentation_form') ? 'has-error' : null }}'>
	{!! Form::label('presentation_form', trans('company.form-labels.presentation_form')) !!}
	{!! Form::input('text', 'presentation_form', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('presentation_form', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('contributor_type_id') ? 'has-error' : null }}'>
	{!! Form::label('contributor_type_id', trans('company.form-labels.contributor_type_id')) !!}
	{!! Form::select(
		'contributor_type_id',
		$contributor_type_id_list,
		Request::input('contributor_type_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('contributor_type_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('payroll_type_id') ? 'has-error' : null }}'>
	{!! Form::label('payroll_type_id', trans('company.form-labels.payroll_type_id')) !!}
	{!! Form::select(
		'payroll_type_id',
		$payroll_type_id_list,
		Request::input('payroll_type_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('payroll_type_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('arl_company_id') ? 'has-error' : null }}'>
	{!! Form::label('arl_company_id', trans('company.form-labels.arl_company_id')) !!}
	{!! Form::select(
		'arl_company_id',
		$arl_company_id_list,
		Request::input('arl_company_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('arl_company_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('arl_department_id') ? 'has-error' : null }}'>
	{!! Form::label('arl_department_id', trans('company.form-labels.arl_department_id')) !!}
	{!! Form::select(
		'arl_department_id',
		$arl_department_id_list,
		Request::input('arl_department_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('arl_department_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('law_1429_from_2010') ? 'has-error' : null }}'>
	{!! Form::label('law_1429_from_2010', trans('company.form-labels.law_1429_from_2010')) !!}
	<br>
	{!! Form::hidden('law_1429_from_2010', '0') !!}
	{!! Form::checkbox(
		'law_1429_from_2010',
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

	{!! $errors->first('law_1429_from_2010', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('law_1607_from_2012') ? 'has-error' : null }}'>
	{!! Form::label('law_1607_from_2012', trans('company.form-labels.law_1607_from_2012')) !!}
	<br>
	{!! Form::hidden('law_1607_from_2012', '0') !!}
	{!! Form::checkbox(
		'law_1607_from_2012',
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

	{!! $errors->first('law_1607_from_2012', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('commercial_registration_date') ? 'has-error' : null }}'>
	{!! Form::label('commercial_registration_date', trans('company.form-labels.commercial_registration_date')) !!}
	{!! Form::input('text', 'commercial_registration_date', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('commercial_registration_date', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('payment_method') ? 'has-error' : null }}'>
	{!! Form::label('payment_method', trans('company.form-labels.payment_method')) !!}
	{!! Form::input('text', 'payment_method', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('payment_method', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('bank_id') ? 'has-error' : null }}'>
	{!! Form::label('bank_id', trans('company.form-labels.bank_id')) !!}
	{!! Form::select(
		'bank_id',
		$bank_id_list,
		Request::input('bank_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('bank_id', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('bank_account_type') ? 'has-error' : null }}'>
	{!! Form::label('bank_account_type', trans('company.form-labels.bank_account_type')) !!}
	{!! Form::input('text', 'bank_account_type', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('bank_account_type', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('bank_account_number') ? 'has-error' : null }}'>
	{!! Form::label('bank_account_number', trans('company.form-labels.bank_account_number')) !!}
	{!! Form::input('text', 'bank_account_number', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('bank_account_number', '<span class="text-danger">:message</span>') !!}
</div>

<div class='form-group col-sm-6 {{ $errors->has('payment_frequency') ? 'has-error' : null }}'>
	{!! Form::label('payment_frequency', trans('company.form-labels.payment_frequency')) !!}
	{!! Form::input('text', 'payment_frequency', null, ['class' => 'form-control', isset($show) ? 'disabled' : null]) !!}

	{!! $errors->first('payment_frequency', '<span class="text-danger">:message</span>') !!}
</div>

<div class="clearfix"></div>

<div class='form-group col-sm-6 {{ $errors->has('pila_payment_operator_id') ? 'has-error' : null }}'>
	{!! Form::label('pila_payment_operator_id', trans('company.form-labels.pila_payment_operator_id')) !!}
	{!! Form::select(
		'pila_payment_operator_id',
		$pila_payment_operator_id_list,
		Request::input('pila_payment_operator_id'),
		[
			'class' => 'form-control selectpicker',
			'data-live-search' => 'false',
			'data-size' => '5',
			'title' => '---',
			'data-selected-text-format' => 'count > 0',
			isset($show) ? 'disabled' : null,
		]
	) !!}

	{!! $errors->first('pila_payment_operator_id', '<span class="text-danger">:message</span>') !!}
</div>
