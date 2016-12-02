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
    @if(in_array('company_id', $selectedTableColumns))
    <td class="company_id">
        {!! UISearch::searchField('MUL', 'company_id', '', $company_id_list) !!}
    </td>
    @endif
    @if(in_array('name', $selectedTableColumns))
    <td class="name">
        {!! UISearch::searchField('varchar', 'name') !!}
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
                    trans('branch.table-columns'),
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
        <a  href="{{route('branches.index')}}"
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