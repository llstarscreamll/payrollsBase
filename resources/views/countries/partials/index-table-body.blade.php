{{--
    ****************************************************************************
    El cuerpo de la tabla.
    ____________________________________________________________________________
    Aquí se muestran los datos devueltos por la consulta ejecutada en el
    controlador según los criterios que haya dado el usuario.

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

@forelse ( $records as $record )
    @if(!isset($hide_checkboxes_column))
    <tr class="item-{{ $record->id }}  ">
    @endif
    <td class="checkbox-column">
        {!! Form::checkbox('id[]', $record->id, null, ['id' => 'record-'.$record->id, 'class' => 'checkbox-table-item']) !!}
    </td>
        @if(in_array('id', $selectedTableColumns))
        <td class="id">
            {{ $record->id }}
        </td>
        @endif
        @if(in_array('name', $selectedTableColumns))
        <td class="name">
            {{ $record->name }}
        </td>
        @endif
        
        @if(!isset($hide_actions_column))
        {{-- Los botones de acción para cada registro --}}
        <td class="actions-column">
            {{-- Botón para ir a los detalles del registro --}}
            <a  href="{{route('countries.show', $record->id)}}"
                class="btn btn-primary btn-xs"
                role="button"
                data-toggle="tooltip"
                data-placement="top"
                title="{{trans('core::shared.show-btn')}}">
                <span class="fa fa-eye"></span>
                <span class="sr-only">{{trans('core::shared.show-btn')}}</span>
            </a>

            @if(auth()->user()->can('countries.edit'))
                {{-- Botón para ir a formulario de actualización del registro --}}
                <a  href="{{route('countries.edit', $record->id)}}"
                    class="btn btn-warning btn-xs" role="button"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="{{trans('core::shared.edit-btn')}}">
                    <span class="glyphicon glyphicon-pencil"></span>
                    <span class="sr-only">{{trans('core::shared.edit-btn')}}</span>
                </a>
            @endif

            @if(auth()->user()->can('countries.destroy'))
                {{-- Formulario para eliminar registro --}}
                {!! Form::open(['route' => ['countries.destroy', $record->id], 'method' => 'DELETE', 'class' => 'form-inline display-inline']) !!}
                    
                    {{-- Botón muestra ventana modal de confirmación para el envío de formulario de eliminar el registro --}}
                    <button type="button"
                            class="btn btn-danger btn-xs bootbox-dialog"
                            role="button"
                            data-toggle="tooltip"
                            data-placement="top"
                            {{-- Setup de ventana modal de confirmación --}}
                            data-modalMessage="{{trans('core::shared.modal-delete-message', ['item' => $record->name])}}"
                            data-modalTitle="{{trans('core::shared.modal-delete-title')}}"
                            data-btnLabel="{{trans('core::shared.modal-delete-btn-confirm')}}"
                            data-btnClassName="btn-danger"
                            title="{{trans('core::shared.delete-btn')}}">
                        <span class="fa fa-minus-circle"></span>
                        <span class="sr-only">{{trans('core::shared.delete-btn')}}</span>
                    </button>
                
                {!! Form::close() !!}
            @endif
        </td>
        @endif
    </tr>

@empty

    <tr>
        <td class="empty-table" colspan="4">
            <div  class="alert alert-warning">
                {{trans('core::shared.no-records-found')}}
            </div>
        </td>
    </tr>

@endforelse