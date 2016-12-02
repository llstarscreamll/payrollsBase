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
    @copyright  (c) 2015-2016, Johan Alvarez <llstarscreamll@hotmail.com>
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
    @if(in_array('company_taxpayer_type_id', $selectedTableColumns))
    <th class="company_taxpayer_type_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.company_taxpayer_type_id'), 'company_taxpayer_type_id') !!}
    </th>
    @endif
    @if(in_array('legal_company_nature_id', $selectedTableColumns))
    <th class="legal_company_nature_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_company_nature_id'), 'legal_company_nature_id') !!}
    </th>
    @endif
    @if(in_array('legal_person_nature_id', $selectedTableColumns))
    <th class="legal_person_nature_id">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.legal_person_nature_id'), 'legal_person_nature_id') !!}
    </th>
    @endif
    @if(in_array('has_branches', $selectedTableColumns))
    <th class="has_branches">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.has_branches'), 'has_branches') !!}
    </th>
    @endif
    @if(in_array('applay_1607_law', $selectedTableColumns))
    <th class="applay_1607_law">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.applay_1607_law'), 'applay_1607_law') !!}
    </th>
    @endif
    @if(in_array('applay_1429_law', $selectedTableColumns))
    <th class="applay_1429_law">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.applay_1429_law'), 'applay_1429_law') !!}
    </th>
    @endif
    @if(in_array('founded_at', $selectedTableColumns))
    <th class="founded_at">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.founded_at'), 'founded_at') !!}
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
    @if(in_array('created_at', $selectedTableColumns))
    <th class="created_at">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.created_at'), 'created_at') !!}
    </th>
    @endif
    @if(in_array('updated_at', $selectedTableColumns))
    <th class="updated_at">
        {!! UISearch::sortLink('companies.index', trans('company.table-columns.updated_at'), 'updated_at') !!}
    </th>
    @endif
    @if(!isset($hide_actions_column))
        <th class="actions-column">{{trans('core::shared.table-actions-column')}}</th>
    @endif
</tr>
