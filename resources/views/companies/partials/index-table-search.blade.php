{{--
    ****************************************************************************
    Los campos del formulario de búsqueda de tabla.
    ____________________________________________________________________________
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

<tr class="search-row">
    @if(!isset($hide_checkboxes_column))
    <td class="checkbox-column">
        {!! Form::checkbox('check_all', 'check_all', null, ['id' => 'check_all']) !!}
    </td>
    @endif
    @if(in_array('id', $selectedTableColumns))
    <td class="id">
        {!! UISearch::searchField('PRI', 'id') !!}
    </td>
    @endif
    @if(in_array('name', $selectedTableColumns))
    <td class="name">
        {!! UISearch::searchField('varchar', 'name') !!}
    </td>
    @endif
    @if(in_array('identity_card_type_id', $selectedTableColumns))
    <td class="identity_card_type_id">
        {!! UISearch::searchField('MUL', 'identity_card_type_id', '', $identity_card_type_id_list) !!}
    </td>
    @endif
    @if(in_array('contributor_identity_card_number', $selectedTableColumns))
    <td class="contributor_identity_card_number">
        {!! UISearch::searchField('bigint', 'contributor_identity_card_number') !!}
    </td>
    @endif
    @if(in_array('verification_digit', $selectedTableColumns))
    <td class="verification_digit">
        {!! UISearch::searchField('int', 'verification_digit') !!}
    </td>
    @endif
    @if(in_array('legal_company_nature_id', $selectedTableColumns))
    <td class="legal_company_nature_id">
        {!! UISearch::searchField('MUL', 'legal_company_nature_id', '', $legal_company_nature_id_list) !!}
    </td>
    @endif
    @if(in_array('person_type', $selectedTableColumns))
    <td class="person_type">
        {!! UISearch::searchField('varchar', 'person_type') !!}
    </td>
    @endif
    @if(in_array('address', $selectedTableColumns))
    <td class="address">
        {!! UISearch::searchField('varchar', 'address') !!}
    </td>
    @endif
    @if(in_array('municipality_id', $selectedTableColumns))
    <td class="municipality_id">
        {!! UISearch::searchField('MUL', 'municipality_id', '', $municipality_id_list) !!}
    </td>
    @endif
    @if(in_array('dane_activity_code', $selectedTableColumns))
    <td class="dane_activity_code">
        {!! UISearch::searchField('varchar', 'dane_activity_code') !!}
    </td>
    @endif
    @if(in_array('phone', $selectedTableColumns))
    <td class="phone">
        {!! UISearch::searchField('varchar', 'phone') !!}
    </td>
    @endif
    @if(in_array('fax', $selectedTableColumns))
    <td class="fax">
        {!! UISearch::searchField('varchar', 'fax') !!}
    </td>
    @endif
    @if(in_array('email', $selectedTableColumns))
    <td class="email">
        {!! UISearch::searchField('varchar', 'email') !!}
    </td>
    @endif
    @if(in_array('legal_rep_identity_card_type_id', $selectedTableColumns))
    <td class="legal_rep_identity_card_type_id">
        {!! UISearch::searchField('MUL', 'legal_rep_identity_card_type_id', '', $legal_rep_identity_card_type_id_list) !!}
    </td>
    @endif
    @if(in_array('legal_rep_identity_card_number', $selectedTableColumns))
    <td class="legal_rep_identity_card_number">
        {!! UISearch::searchField('bigint', 'legal_rep_identity_card_number') !!}
    </td>
    @endif
    @if(in_array('legal_rep_verification_digit', $selectedTableColumns))
    <td class="legal_rep_verification_digit">
        {!! UISearch::searchField('int', 'legal_rep_verification_digit') !!}
    </td>
    @endif
    @if(in_array('legal_rep_first_name', $selectedTableColumns))
    <td class="legal_rep_first_name">
        {!! UISearch::searchField('varchar', 'legal_rep_first_name') !!}
    </td>
    @endif
    @if(in_array('legal_rep_middle_name', $selectedTableColumns))
    <td class="legal_rep_middle_name">
        {!! UISearch::searchField('varchar', 'legal_rep_middle_name') !!}
    </td>
    @endif
    @if(in_array('legal_rep_first_surname', $selectedTableColumns))
    <td class="legal_rep_first_surname">
        {!! UISearch::searchField('varchar', 'legal_rep_first_surname') !!}
    </td>
    @endif
    @if(in_array('legal_rep_last_surname', $selectedTableColumns))
    <td class="legal_rep_last_surname">
        {!! UISearch::searchField('varchar', 'legal_rep_last_surname') !!}
    </td>
    @endif
    @if(in_array('legal_rep_email', $selectedTableColumns))
    <td class="legal_rep_email">
        {!! UISearch::searchField('varchar', 'legal_rep_email') !!}
    </td>
    @endif
    @if(in_array('contact_first_name', $selectedTableColumns))
    <td class="contact_first_name">
        {!! UISearch::searchField('varchar', 'contact_first_name') !!}
    </td>
    @endif
    @if(in_array('contact_last_name', $selectedTableColumns))
    <td class="contact_last_name">
        {!! UISearch::searchField('varchar', 'contact_last_name') !!}
    </td>
    @endif
    @if(in_array('contact_cell_phone', $selectedTableColumns))
    <td class="contact_cell_phone">
        {!! UISearch::searchField('varchar', 'contact_cell_phone') !!}
    </td>
    @endif
    @if(in_array('contact_email', $selectedTableColumns))
    <td class="contact_email">
        {!! UISearch::searchField('varchar', 'contact_email') !!}
    </td>
    @endif
    @if(in_array('contributor_class_id', $selectedTableColumns))
    <td class="contributor_class_id">
        {!! UISearch::searchField('MUL', 'contributor_class_id', '', $contributor_class_id_list) !!}
    </td>
    @endif
    @if(in_array('presentation_form', $selectedTableColumns))
    <td class="presentation_form">
        {!! UISearch::searchField('varchar', 'presentation_form') !!}
    </td>
    @endif
    @if(in_array('contributor_type_id', $selectedTableColumns))
    <td class="contributor_type_id">
        {!! UISearch::searchField('MUL', 'contributor_type_id', '', $contributor_type_id_list) !!}
    </td>
    @endif
    @if(in_array('payroll_type_id', $selectedTableColumns))
    <td class="payroll_type_id">
        {!! UISearch::searchField('MUL', 'payroll_type_id', '', $payroll_type_id_list) !!}
    </td>
    @endif
    @if(in_array('arl_company_id', $selectedTableColumns))
    <td class="arl_company_id">
        {!! UISearch::searchField('MUL', 'arl_company_id', '', $arl_company_id_list) !!}
    </td>
    @endif
    @if(in_array('arl_department_id', $selectedTableColumns))
    <td class="arl_department_id">
        {!! UISearch::searchField('MUL', 'arl_department_id', '', $arl_department_id_list) !!}
    </td>
    @endif
    @if(in_array('law_1429_from_2010', $selectedTableColumns))
    <td class="law_1429_from_2010">
        {!! UISearch::searchField('tinyint', 'law_1429_from_2010') !!}
    </td>
    @endif
    @if(in_array('law_1607_from_2012', $selectedTableColumns))
    <td class="law_1607_from_2012">
        {!! UISearch::searchField('tinyint', 'law_1607_from_2012') !!}
    </td>
    @endif
    @if(in_array('commercial_registration_date', $selectedTableColumns))
    <td class="commercial_registration_date">
        {!! UISearch::searchField('date', 'commercial_registration_date') !!}
    </td>
    @endif
    @if(in_array('payment_method', $selectedTableColumns))
    <td class="payment_method">
        {!! UISearch::searchField('varchar', 'payment_method') !!}
    </td>
    @endif
    @if(in_array('bank_id', $selectedTableColumns))
    <td class="bank_id">
        {!! UISearch::searchField('MUL', 'bank_id', '', $bank_id_list) !!}
    </td>
    @endif
    @if(in_array('bank_account_type', $selectedTableColumns))
    <td class="bank_account_type">
        {!! UISearch::searchField('varchar', 'bank_account_type') !!}
    </td>
    @endif
    @if(in_array('bank_account_number', $selectedTableColumns))
    <td class="bank_account_number">
        {!! UISearch::searchField('varchar', 'bank_account_number') !!}
    </td>
    @endif
    @if(in_array('payment_frequency', $selectedTableColumns))
    <td class="payment_frequency">
        {!! UISearch::searchField('varchar', 'payment_frequency') !!}
    </td>
    @endif
    @if(in_array('pila_payment_operator_id', $selectedTableColumns))
    <td class="pila_payment_operator_id">
        {!! UISearch::searchField('MUL', 'pila_payment_operator_id', '', $pila_payment_operator_id_list) !!}
    </td>
    @endif
    
    @if(!isset($hide_actions_column))
    {{-- Botones de búsqueda, limpieza del formulario y opciones de búsqueda --}}
    <td class="actions-column" style="min-width: 10em;">

        {{-- Más opciones de filtros --}}
        <div class="dropdown display-inline-table"
             data-toggle="tooltip"
             data-placement="top"
             title="{{ trans('core::shared.more-filters-btn') }}">
            
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="sr-only">{{ trans('core::shared.more-filters-btn') }}</span>
                <span class="glyphicon glyphicon-filter"></span>
            </button>

            <ul class="dropdown-menu dropdown-menu-right prevent-hide" arialedby="dropdownMenu1">
                <li class="dropdown-header">{{ trans('core::shared.more-filters-btn') }}</li>
                <li role="separator" class="divider"></li>

                {{-- Las columnas de la tabla a mostrar u ocultar --}}
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">{{ trans('core::shared.more-filters-table-columns') }}</li>
                
                {!! UISearch::makeCheckboxesArray(
                    'table_columns[]',
                    trans('company.table-columns'),
                    $selectedTableColumns
                ) !!}

            </ul>
        </div>
        
        {{-- Ejecuta la búsqueda --}}
        <button type="submit"
                form="searchForm"
                class="btn btn-primary btn-sm"
                data-toggle="tooltip"
                data-placement="top"
                title="{{trans('core::shared.search-btn')}}">
            <span class="fa fa-search"></span>
            <span class="sr-only">{{trans('core::shared.search-btn')}}</span>
        </button>

        {{-- Recarga la página restableciendo los campos de búsqueda --}}
        <a  href="{{route('companies.index')}}"
            class="btn btn-danger btn-sm"
            role="button"
            data-toggle="tooltip"
            data-placement="top"
            title="{{trans('core::shared.clean-filters-btn')}}">
            <span class="glyphicon glyphicon-remove"></span>
            <span class="sr-only">{{trans('core::shared.clean-filters-btn')}}</span>
        </a>

    </td>
    @endif
</tr>