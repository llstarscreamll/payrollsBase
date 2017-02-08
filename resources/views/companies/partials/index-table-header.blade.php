{{--
    ****************************************************************************
    Los nombres de las columnas de la tabla.
    ____________________________________________________________________________
    Aquí se muestran los nombres de columnas de la tabla, los cuales son enlaces
    que ordenan los resultados de la consulta ascendente o descendentemente.

    En caso de que se desee reutilizar esta vista y esconder la columna de los
    checkbox, al llamar esta vista enviar la variable:
    $hide_checkboxes_column = true

    Si se desea ocultar la columna de acciones, al llamar la vista enviar la
    variable:
    $hide_actions_column = true
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

<tr class="header-row">
    @if(!isset($hide_checkboxes_column))
        <th class="checkbox-column"></th>
    @endif
    @if(in_array('id', $selectedTableColumns))
    <th class="id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.id'), 'id') !!}
    </th>
    @endif
    @if(in_array('name', $selectedTableColumns))
    <th class="name">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.name'), 'name') !!}
    </th>
    @endif
    @if(in_array('identity_card_type_id', $selectedTableColumns))
    <th class="identity_card_type_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.identity_card_type_id'), 'identity_card_type_id') !!}
    </th>
    @endif
    @if(in_array('contributor_identity_card_number', $selectedTableColumns))
    <th class="contributor_identity_card_number">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.contributor_identity_card_number'), 'contributor_identity_card_number') !!}
    </th>
    @endif
    @if(in_array('verification_digit', $selectedTableColumns))
    <th class="verification_digit">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.verification_digit'), 'verification_digit') !!}
    </th>
    @endif
    @if(in_array('legal_company_nature_id', $selectedTableColumns))
    <th class="legal_company_nature_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_company_nature_id'), 'legal_company_nature_id') !!}
    </th>
    @endif
    @if(in_array('person_type', $selectedTableColumns))
    <th class="person_type">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.person_type'), 'person_type') !!}
    </th>
    @endif
    @if(in_array('address', $selectedTableColumns))
    <th class="address">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.address'), 'address') !!}
    </th>
    @endif
    @if(in_array('municipality_id', $selectedTableColumns))
    <th class="municipality_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.municipality_id'), 'municipality_id') !!}
    </th>
    @endif
    @if(in_array('dane_activity_code', $selectedTableColumns))
    <th class="dane_activity_code">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.dane_activity_code'), 'dane_activity_code') !!}
    </th>
    @endif
    @if(in_array('phone', $selectedTableColumns))
    <th class="phone">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.phone'), 'phone') !!}
    </th>
    @endif
    @if(in_array('fax', $selectedTableColumns))
    <th class="fax">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.fax'), 'fax') !!}
    </th>
    @endif
    @if(in_array('email', $selectedTableColumns))
    <th class="email">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.email'), 'email') !!}
    </th>
    @endif
    @if(in_array('legal_rep_identity_card_type_id', $selectedTableColumns))
    <th class="legal_rep_identity_card_type_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_rep_identity_card_type_id'), 'legal_rep_identity_card_type_id') !!}
    </th>
    @endif
    @if(in_array('legal_rep_identity_card_number', $selectedTableColumns))
    <th class="legal_rep_identity_card_number">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_rep_identity_card_number'), 'legal_rep_identity_card_number') !!}
    </th>
    @endif
    @if(in_array('legal_rep_verification_digit', $selectedTableColumns))
    <th class="legal_rep_verification_digit">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_rep_verification_digit'), 'legal_rep_verification_digit') !!}
    </th>
    @endif
    @if(in_array('legal_rep_first_name', $selectedTableColumns))
    <th class="legal_rep_first_name">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_rep_first_name'), 'legal_rep_first_name') !!}
    </th>
    @endif
    @if(in_array('legal_rep_middle_name', $selectedTableColumns))
    <th class="legal_rep_middle_name">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_rep_middle_name'), 'legal_rep_middle_name') !!}
    </th>
    @endif
    @if(in_array('legal_rep_first_surname', $selectedTableColumns))
    <th class="legal_rep_first_surname">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_rep_first_surname'), 'legal_rep_first_surname') !!}
    </th>
    @endif
    @if(in_array('legal_rep_last_surname', $selectedTableColumns))
    <th class="legal_rep_last_surname">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_rep_last_surname'), 'legal_rep_last_surname') !!}
    </th>
    @endif
    @if(in_array('legal_rep_email', $selectedTableColumns))
    <th class="legal_rep_email">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_rep_email'), 'legal_rep_email') !!}
    </th>
    @endif
    @if(in_array('contact_first_name', $selectedTableColumns))
    <th class="contact_first_name">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.contact_first_name'), 'contact_first_name') !!}
    </th>
    @endif
    @if(in_array('contact_last_name', $selectedTableColumns))
    <th class="contact_last_name">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.contact_last_name'), 'contact_last_name') !!}
    </th>
    @endif
    @if(in_array('contact_cell_phone', $selectedTableColumns))
    <th class="contact_cell_phone">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.contact_cell_phone'), 'contact_cell_phone') !!}
    </th>
    @endif
    @if(in_array('contact_email', $selectedTableColumns))
    <th class="contact_email">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.contact_email'), 'contact_email') !!}
    </th>
    @endif
    @if(in_array('contributor_class_id', $selectedTableColumns))
    <th class="contributor_class_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.contributor_class_id'), 'contributor_class_id') !!}
    </th>
    @endif
    @if(in_array('presentation_form', $selectedTableColumns))
    <th class="presentation_form">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.presentation_form'), 'presentation_form') !!}
    </th>
    @endif
    @if(in_array('contributor_type_id', $selectedTableColumns))
    <th class="contributor_type_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.contributor_type_id'), 'contributor_type_id') !!}
    </th>
    @endif
    @if(in_array('payroll_type_id', $selectedTableColumns))
    <th class="payroll_type_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.payroll_type_id'), 'payroll_type_id') !!}
    </th>
    @endif
    @if(in_array('arl_company_id', $selectedTableColumns))
    <th class="arl_company_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.arl_company_id'), 'arl_company_id') !!}
    </th>
    @endif
    @if(in_array('arl_department_id', $selectedTableColumns))
    <th class="arl_department_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.arl_department_id'), 'arl_department_id') !!}
    </th>
    @endif
    @if(in_array('law_1429_from_2010', $selectedTableColumns))
    <th class="law_1429_from_2010">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.law_1429_from_2010'), 'law_1429_from_2010') !!}
    </th>
    @endif
    @if(in_array('law_1607_from_2012', $selectedTableColumns))
    <th class="law_1607_from_2012">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.law_1607_from_2012'), 'law_1607_from_2012') !!}
    </th>
    @endif
    @if(in_array('commercial_registration_date', $selectedTableColumns))
    <th class="commercial_registration_date">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.commercial_registration_date'), 'commercial_registration_date') !!}
    </th>
    @endif
    @if(in_array('payment_method', $selectedTableColumns))
    <th class="payment_method">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.payment_method'), 'payment_method') !!}
    </th>
    @endif
    @if(in_array('bank_id', $selectedTableColumns))
    <th class="bank_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.bank_id'), 'bank_id') !!}
    </th>
    @endif
    @if(in_array('bank_account_type', $selectedTableColumns))
    <th class="bank_account_type">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.bank_account_type'), 'bank_account_type') !!}
    </th>
    @endif
    @if(in_array('bank_account_number', $selectedTableColumns))
    <th class="bank_account_number">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.bank_account_number'), 'bank_account_number') !!}
    </th>
    @endif
    @if(in_array('payment_frequency', $selectedTableColumns))
    <th class="payment_frequency">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.payment_frequency'), 'payment_frequency') !!}
    </th>
    @endif
    @if(in_array('pila_payment_operator_id', $selectedTableColumns))
    <th class="pila_payment_operator_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.pila_payment_operator_id'), 'pila_payment_operator_id') !!}
    </th>
    @endif
    @if(!isset($hide_actions_column))
        <th class="actions-column">{{trans('core::shared.table-actions-column')}}</th>
    @endif
</tr>
