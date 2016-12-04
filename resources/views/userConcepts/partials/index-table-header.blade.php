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
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.id'), 'id') !!}
    </th>
    @endif
    @if(in_array('name', $selectedTableColumns))
    <th class="name">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.name'), 'name') !!}
    </th>
    @endif
    @if(in_array('type', $selectedTableColumns))
    <th class="type">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.type'), 'type') !!}
    </th>
    @endif
    @if(in_array('is_wage', $selectedTableColumns))
    <th class="is_wage">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.is_wage'), 'is_wage') !!}
    </th>
    @endif
    @if(in_array('apply_1393_law', $selectedTableColumns))
    <th class="apply_1393_law">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.apply_1393_law'), 'apply_1393_law') !!}
    </th>
    @endif
    @if(in_array('retention', $selectedTableColumns))
    <th class="retention">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.retention'), 'retention') !!}
    </th>
    @endif
    @if(in_array('ibc_health', $selectedTableColumns))
    <th class="ibc_health">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.ibc_health'), 'ibc_health') !!}
    </th>
    @endif
    @if(in_array('ibc_pension', $selectedTableColumns))
    <th class="ibc_pension">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.ibc_pension'), 'ibc_pension') !!}
    </th>
    @endif
    @if(in_array('ibc_arl', $selectedTableColumns))
    <th class="ibc_arl">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.ibc_arl'), 'ibc_arl') !!}
    </th>
    @endif
    @if(in_array('ccf_base', $selectedTableColumns))
    <th class="ccf_base">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.ccf_base'), 'ccf_base') !!}
    </th>
    @endif
    @if(in_array('sena_base', $selectedTableColumns))
    <th class="sena_base">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.sena_base'), 'sena_base') !!}
    </th>
    @endif
    @if(in_array('icbf_base', $selectedTableColumns))
    <th class="icbf_base">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.icbf_base'), 'icbf_base') !!}
    </th>
    @endif
    @if(in_array('severance_base', $selectedTableColumns))
    <th class="severance_base">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.severance_base'), 'severance_base') !!}
    </th>
    @endif
    @if(in_array('premium_base', $selectedTableColumns))
    <th class="premium_base">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.premium_base'), 'premium_base') !!}
    </th>
    @endif
    @if(in_array('provisioning_holiday', $selectedTableColumns))
    <th class="provisioning_holiday">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.provisioning_holiday'), 'provisioning_holiday') !!}
    </th>
    @endif
    @if(in_array('money_holiday_base', $selectedTableColumns))
    <th class="money_holiday_base">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.money_holiday_base'), 'money_holiday_base') !!}
    </th>
    @endif
    @if(in_array('holidays_enjoyed', $selectedTableColumns))
    <th class="holidays_enjoyed">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.holidays_enjoyed'), 'holidays_enjoyed') !!}
    </th>
    @endif
    @if(in_array('holiday_contract_settlement', $selectedTableColumns))
    <th class="holiday_contract_settlement">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.holiday_contract_settlement'), 'holiday_contract_settlement') !!}
    </th>
    @endif
    @if(in_array('indemnity', $selectedTableColumns))
    <th class="indemnity">
        {!! UISearch::sortLink('user-concepts.index', trans('userConcept.table-columns.indemnity'), 'indemnity') !!}
    </th>
    @endif
    @if(!isset($hide_actions_column))
        <th class="actions-column">{{trans('core::shared.table-actions-column')}}</th>
    @endif
</tr>
