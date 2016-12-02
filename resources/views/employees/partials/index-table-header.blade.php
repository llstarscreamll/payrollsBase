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
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.id'), 'id') !!}
    </th>
    @endif
    @if(in_array('dni', $selectedTableColumns))
    <th class="dni">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.dni'), 'dni') !!}
    </th>
    @endif
    @if(in_array('name', $selectedTableColumns))
    <th class="name">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.name'), 'name') !!}
    </th>
    @endif
    @if(in_array('lastname', $selectedTableColumns))
    <th class="lastname">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.lastname'), 'lastname') !!}
    </th>
    @endif
    @if(in_array('branch_id', $selectedTableColumns))
    <th class="branch_id">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.branch_id'), 'branch_id') !!}
    </th>
    @endif
    @if(in_array('contract_type', $selectedTableColumns))
    <th class="contract_type">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.contract_type'), 'contract_type') !!}
    </th>
    @endif
    @if(in_array('salary', $selectedTableColumns))
    <th class="salary">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.salary'), 'salary') !!}
    </th>
    @endif
    @if(in_array('salary_type', $selectedTableColumns))
    <th class="salary_type">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.salary_type'), 'salary_type') !!}
    </th>
    @endif
    @if(in_array('occupational_risk_level', $selectedTableColumns))
    <th class="occupational_risk_level">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.occupational_risk_level'), 'occupational_risk_level') !!}
    </th>
    @endif
    @if(in_array('employee_taxpayer_type_id', $selectedTableColumns))
    <th class="employee_taxpayer_type_id">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.employee_taxpayer_type_id'), 'employee_taxpayer_type_id') !!}
    </th>
    @endif
    @if(in_array('dependents_deduction', $selectedTableColumns))
    <th class="dependents_deduction">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.dependents_deduction'), 'dependents_deduction') !!}
    </th>
    @endif
    @if(in_array('average_EPS_contributions_last_year', $selectedTableColumns))
    <th class="average_EPS_contributions_last_year">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.average_EPS_contributions_last_year'), 'average_EPS_contributions_last_year') !!}
    </th>
    @endif
    @if(in_array('home_interest_deduction_last_year', $selectedTableColumns))
    <th class="home_interest_deduction_last_year">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.home_interest_deduction_last_year'), 'home_interest_deduction_last_year') !!}
    </th>
    @endif
    @if(in_array('prepaid_medicine', $selectedTableColumns))
    <th class="prepaid_medicine">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.prepaid_medicine'), 'prepaid_medicine') !!}
    </th>
    @endif
    @if(in_array('applay_2090_decree', $selectedTableColumns))
    <th class="applay_2090_decree">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.applay_2090_decree'), 'applay_2090_decree') !!}
    </th>
    @endif
    @if(in_array('contributor_subtype', $selectedTableColumns))
    <th class="contributor_subtype">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.contributor_subtype'), 'contributor_subtype') !!}
    </th>
    @endif
    @if(in_array('admitted_at', $selectedTableColumns))
    <th class="admitted_at">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.admitted_at'), 'admitted_at') !!}
    </th>
    @endif
    @if(in_array('egressed_at', $selectedTableColumns))
    <th class="egressed_at">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.egressed_at'), 'egressed_at') !!}
    </th>
    @endif
    @if(in_array('created_at', $selectedTableColumns))
    <th class="created_at">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.created_at'), 'created_at') !!}
    </th>
    @endif
    @if(in_array('updated_at', $selectedTableColumns))
    <th class="updated_at">
        {!! UISearch::sortLink('employees.index', trans('employee.table-columns.updated_at'), 'updated_at') !!}
    </th>
    @endif
    @if(!isset($hide_actions_column))
        <th class="actions-column">{{trans('core::shared.table-actions-column')}}</th>
    @endif
</tr>
