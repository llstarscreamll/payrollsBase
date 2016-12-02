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
    @copyright  (c) 2015-2016, Johan Alvarez <llstarscreamll@hotmail.com>
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
    @if(in_array('dni', $selectedTableColumns))
    <td class="dni">
        {!! UISearch::searchField('bigint', 'dni') !!}
    </td>
    @endif
    @if(in_array('name', $selectedTableColumns))
    <td class="name">
        {!! UISearch::searchField('varchar', 'name') !!}
    </td>
    @endif
    @if(in_array('lastname', $selectedTableColumns))
    <td class="lastname">
        {!! UISearch::searchField('varchar', 'lastname') !!}
    </td>
    @endif
    @if(in_array('branch_id', $selectedTableColumns))
    <td class="branch_id">
        {!! UISearch::searchField('MUL', 'branch_id', '', $branch_id_list) !!}
    </td>
    @endif
    @if(in_array('contract_type', $selectedTableColumns))
    <td class="contract_type">
        {!! UISearch::searchField('enum', 'contract_type', '', $contract_type_list) !!}
    </td>
    @endif
    @if(in_array('salary', $selectedTableColumns))
    <td class="salary">
        {!! UISearch::searchField('bigint', 'salary') !!}
    </td>
    @endif
    @if(in_array('salary_type', $selectedTableColumns))
    <td class="salary_type">
        {!! UISearch::searchField('enum', 'salary_type', '', $salary_type_list) !!}
    </td>
    @endif
    @if(in_array('occupational_risk_level', $selectedTableColumns))
    <td class="occupational_risk_level">
        {!! UISearch::searchField('enum', 'occupational_risk_level', '', $occupational_risk_level_list) !!}
    </td>
    @endif
    @if(in_array('employee_taxpayer_type_id', $selectedTableColumns))
    <td class="employee_taxpayer_type_id">
        {!! UISearch::searchField('MUL', 'employee_taxpayer_type_id', '', $employee_taxpayer_type_id_list) !!}
    </td>
    @endif
    @if(in_array('dependents_deduction', $selectedTableColumns))
    <td class="dependents_deduction">
        {!! UISearch::searchField('int', 'dependents_deduction') !!}
    </td>
    @endif
    @if(in_array('average_EPS_contributions_last_year', $selectedTableColumns))
    <td class="average_EPS_contributions_last_year">
        {!! UISearch::searchField('int', 'average_EPS_contributions_last_year') !!}
    </td>
    @endif
    @if(in_array('home_interest_deduction_last_year', $selectedTableColumns))
    <td class="home_interest_deduction_last_year">
        {!! UISearch::searchField('int', 'home_interest_deduction_last_year') !!}
    </td>
    @endif
    @if(in_array('prepaid_medicine', $selectedTableColumns))
    <td class="prepaid_medicine">
        {!! UISearch::searchField('int', 'prepaid_medicine') !!}
    </td>
    @endif
    @if(in_array('applay_2090_decree', $selectedTableColumns))
    <td class="applay_2090_decree">
        {!! UISearch::searchField('tinyint', 'applay_2090_decree') !!}
    </td>
    @endif
    @if(in_array('contributor_subtype', $selectedTableColumns))
    <td class="contributor_subtype">
        {!! UISearch::searchField('tinyint', 'contributor_subtype') !!}
    </td>
    @endif
    @if(in_array('admitted_at', $selectedTableColumns))
    <td class="admitted_at">
        {!! UISearch::searchField('date', 'admitted_at') !!}
    </td>
    @endif
    @if(in_array('egressed_at', $selectedTableColumns))
    <td class="egressed_at">
        {!! UISearch::searchField('date', 'egressed_at') !!}
    </td>
    @endif
    @if(in_array('created_at', $selectedTableColumns))
    <td class="created_at">
        {!! UISearch::searchField('timestamp', 'created_at') !!}
    </td>
    @endif
    @if(in_array('updated_at', $selectedTableColumns))
    <td class="updated_at">
        {!! UISearch::searchField('timestamp', 'updated_at') !!}
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
                    trans('employee.table-columns'),
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
        <a  href="{{route('employees.index')}}"
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