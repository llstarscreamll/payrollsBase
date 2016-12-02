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
        {!! UISearch::sortLink('employee-taxpayer-types.index', trans('employeeTaxpayerType.table-columns.id'), 'id') !!}
    </th>
    @endif
    @if(in_array('name', $selectedTableColumns))
    <th class="name">
        {!! UISearch::sortLink('employee-taxpayer-types.index', trans('employeeTaxpayerType.table-columns.name'), 'name') !!}
    </th>
    @endif
    @if(in_array('created_at', $selectedTableColumns))
    <th class="created_at">
        {!! UISearch::sortLink('employee-taxpayer-types.index', trans('employeeTaxpayerType.table-columns.created_at'), 'created_at') !!}
    </th>
    @endif
    @if(in_array('updated_at', $selectedTableColumns))
    <th class="updated_at">
        {!! UISearch::sortLink('employee-taxpayer-types.index', trans('employeeTaxpayerType.table-columns.updated_at'), 'updated_at') !!}
    </th>
    @endif
    @if(!isset($hide_actions_column))
        <th class="actions-column">{{trans('core::shared.table-actions-column')}}</th>
    @endif
</tr>
