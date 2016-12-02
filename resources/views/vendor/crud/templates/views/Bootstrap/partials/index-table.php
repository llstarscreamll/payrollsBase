<?php
/* @var $gen llstarscreamll\Crud\Providers\TestsGenerator */
/* @var $fields [] */
/* @var $request Request */
?>

{!! Form::open(['route' => '<?=$gen->route()?>.index', 'method' => 'GET', 'id' => 'searchForm']) !!}
{!! Form::close() !!}

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            {{-- Nombres de columnas de tabla --}}
            <tr class="header-row">
                <th class="checkbox-column"></th>
<?php foreach ($fields as $field) { ?>
<?php if (!$field->hidden) { ?>
                <th class="<?= $field->name ?>">
                    <a href="{{route('<?=$gen->route()?>.index',
                        array_merge(
                            Request::query(),
                            [
                            'sort' => '<?=$field->name?>',
                            'sortType' => (Request::input('sort') == '<?=$field->name?>' and Request::input('sortType') == 'asc') ? 'desc' : 'asc'
                            ]
                        )
                    )}}">
                        {{trans('<?=$gen->getLangAccess()?>.form-fields-short-name.<?=$field->name?>')}}
                        {!!Request::input('sort') == '<?=$field->name?>' ? '<i class="fa fa-sort-alpha-'.Request::input('sortType').'"></i>' : ''!!}
                    </a>
                </th>
<?php } ?>
<?php } ?>
                <th class="actions-column">{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.table-actions-column')}}</th>
            </tr>
            
            {{-- Elementos de Formulario de búqueda de tabla --}}
            <tr class="search-row">

                <td class="checkbox-column">{!! Form::checkbox('check_all', 'check_all', null, ['id' => 'check_all']) !!}</td>
<?php foreach ($fields as $field) { ?>
<?php if (!$field->hidden) { ?>
                <td class="<?= $field->name ?>"><?=$gen->getSearchInputStr($field, $gen->table_name)?></td>
<?php } ?>
<?php } ?>

                {{-- Los botones de búsqueda y limpieza del formulario --}}
                <td class="actions-column" style="min-width: 10em;">

                    {{-- Más opciones de filtros --}}
                    <div id="filters" class="dropdown display-inline"
                         data-toggle="tooltip"
                         data-placement="top"
                         title="{{ trans('<?= $gen->solveSharedResourcesNamespace() ?>.more-filters-btn-label') }}">
                        <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="sr-only">{{ trans('<?= $gen->solveSharedResourcesNamespace() ?>.more-filters-btn-label') }}</span>
                            <span class="glyphicon glyphicon-filter"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <li class="dropdown-header">{{ trans('<?= $gen->solveSharedResourcesNamespace() ?>.more-filters-btn-label') }}</li>
                            <li role="separator" class="divider"></li>
<?php if ($gen->hasDeletedAtColumn($fields)) { ?>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        {!! Form::radio('trashed_records', 'withTrashed', Request::input('trashed_records') == 'withTrashed' ? true : false, ['form' => 'searchForm']) !!} {{ trans('<?= $gen->solveSharedResourcesNamespace() ?>.filter-with-trashed-label') }}
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        {!! Form::radio('trashed_records', 'onlyTrashed', Request::input('trashed_records') == 'onlyTrashed' ? true : false, ['form' => 'searchForm']) !!} {{ trans('<?= $gen->solveSharedResourcesNamespace() ?>.filter-only-trashed-label') }}
                                    </label>
                                </div>
                            </li>
<?php } ?>
                        </ul>
                    </div>
                    
                    <button type="submit"
                            form="searchForm"
                            class="btn btn-primary btn-sm"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.search-btn-label')}}">
                        <span class="fa fa-search"></span>
                        <span class="sr-only">{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.search-btn-label')}}</span>
                    </button>

                    <a  href="{{route('<?=$gen->route()?>.index')}}"
                        class="btn btn-danger btn-sm"
                        role="button"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.clean-filters-btn-label')}}">
                        <span class="glyphicon glyphicon-remove"></span>
                        <span class="sr-only">{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.clean-filters-btn-label')}}</span>
                    </a>

                </td>

            </tr>
        </thead>

        <tbody>

            @forelse ( $records as $record )
            <tr class="item-{{ $record->id }} <?= $gen->hasDeletedAtColumn($fields) ? '{{ $record->trashed() ? \'danger\' : null }}': null ?> ">
            <td class="checkbox-column">{!! Form::checkbox('id[]', $record->id, null, ['id' => 'record-'.$record->id, 'class' => 'checkbox-table-item']) !!}</td>
<?php foreach ($fields as $field) { ?>
<?php if (!$field->hidden) { ?>
                <td class="<?= $field->name ?>">
<?php if (! $gen->isGuarded($field->name)) { ?>
<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
// importante dejar el span de del componenten x-editable de la forma en que está <span ...>$record</span> //
// para que no resalte espacios vacíos cuando esté ejecutandose...                                         //
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
                    {{-- Campo <?= $field->name ?> es editable --}}
                    <span <?= $gen->hasDeletedAtColumn($fields) ? '@if (! $record->trashed()) ' : null ?>class="<?=$gen->getInputXEditableClass($field)?>"
                          data-type="<?=$gen->getInputType($field)?>"
                          data-name="<?=$field->name?>"
                          data-placement="bottom"
                          data-emptytext="{{ trans('<?=$gen->getLangAccess()?>.index.x-editable.dafaultValue') }}"
                          data-value="{{ $record-><?=$field->name?> }}"
                          data-pk="{{ $record->{$record->getKeyName()} }}"
                          data-url="/<?=$gen->route()?>/{{ $record->{$record->getKeyName()} }}"
<?php if ($enum_source = $gen->getSourceForEnum($field)) { ?>
                          <?= $enum_source ?>
<?php }  ?>
                          <?= $gen->hasDeletedAtColumn($fields) ? '@endif' : null ?>>{{ <?=$gen->getRecordFieldData($field, '$record')?> }}</span>
<?php } else { ?>
                    {{-- El campo <?= $field->name ?> no es editable --}}
                    {{ <?=$gen->getRecordFieldData($field, '$record')?> }}
<?php } // end if ?>
                </td>
<?php } // end if ?>
<?php } // endforeach ?>
                
                {{-- Los botones de acción para cada registro --}}
                <td class="actions-column">
<?php if ($gen->hasDeletedAtColumn($fields)) { ?>
                @if ($record->trashed())

                    {{-- Formulario para restablecer el registro --}}
                    {!! Form::open(['route' => ['<?=$gen->route()?>.restore'], 'method' => 'PUT', 'class' => 'form-inline display-inline']) !!}

                        {!! Form::hidden('id[]', $record->id) !!}
                        
                        {{-- Botón que muestra ventana modal de confirmación para el envío del formulario de restablecer el registro --}}
                        <button type="<?= $request->has('use_modal_confirmation_on_delete') ? 'button' : 'submit' ?>"
                                class="btn btn-success btn-xs <?= $request->has('use_modal_confirmation_on_delete') ? 'bootbox-dialog' : null ?>"
                                role="button"
                                data-toggle="tooltip"
                                data-placement="top"
<?php if ($request->has('use_modal_confirmation_on_delete')) { ?>
                                {{-- Setup de ventana modal de confirmación --}}
                                data-modalTitle="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.modal-restore-title')}}"
                                data-modalMessage="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.modal-restore-message', ['item' => $record->name])}}"
                                data-btnLabel="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.modal-restore-confirm-btn')}}"
                                data-btnClassName="btn-success"
<?php } else { ?>
                                onclick="return confirm('{{trans('<?=$gen->getLangAccess()?>.index.restore-confirm-message')}}')"
<?php } ?>
                                title="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.restore-btn')}}">
                            <span class="fa fa-mail-reply"></span>
                            <span class="sr-only">{{trans('<?=$gen->getLangAccess()?>.index.restore-item-button')}}</span>
                        </button>
                    
                    {!! Form::close() !!}

                @else
<?php } ?>
                    {{-- Botón para ir a los detalles del registro --}}
                    <a  href="{{route('<?=$gen->route()?>.show', $record->id)}}"
                        class="btn btn-primary btn-xs"
                        role="button"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.show-btn')}}">
                        <span class="fa fa-eye"></span>
                        <span class="sr-only">{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.show-btn')}}</span>
                    </a>

                    {{-- Botón para ir a formulario de actualización del registro --}}
                    <a  href="{{route('<?=$gen->route()?>.edit', $record->id)}}"
                        class="btn btn-warning btn-xs" role="button"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.edit-btn-label')}}">
                        <span class="glyphicon glyphicon-pencil"></span>
                        <span class="sr-only">{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.edit-btn-label')}}</span>
                    </a>

                    {{-- Formulario para eliminar registro --}}
                    {!! Form::open(['route' => ['<?=$gen->route()?>.destroy', $record->id], 'method' => 'DELETE', 'class' => 'form-inline display-inline']) !!}
                        
                        {{-- Botón muestra ventana modal de confirmación para el envío de formulario de eliminar el registro --}}
                        <button type="<?= $request->has('use_modal_confirmation_on_delete') ? 'button' : 'submit' ?>"
                                class="btn btn-danger btn-xs <?= $request->has('use_modal_confirmation_on_delete') ? 'bootbox-dialog' : null ?>"
                                role="button"
                                data-toggle="tooltip"
                                data-placement="top"
<?php if ($request->has('use_modal_confirmation_on_delete')) { ?>
                                {{-- Setup de ventana modal de confirmación --}}
                                data-modalMessage="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.modal-delete-message', ['item' => $record->name])}}"
                                data-modalTitle="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.modal-delete-title')}}"
                                data-btnLabel="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.modal-delete-btn-confirm-label')}}"
                                data-btnClassName="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.modal-delete-btn-confirm-class-name')}}"
<?php } else { ?>
                                onclick="return confirm('{{ trans('<?=$gen->getLangAccess()?>.index.delete-confirm-message') }}')"
<?php } ?>
                                title="{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.trash-btn-label')}}">
                            <span class="fa fa-trash"></span>
                            <span class="sr-only">{{trans('<?= $gen->solveSharedResourcesNamespace() ?>.trash-btn-label')}}</span>
                        </button>
                    
                    {!! Form::close() !!}
<?php if ($gen->hasDeletedAtColumn($fields)) { ?>
                @endif
<?php } ?>
                </td>
                    
            </tr>

            @empty

                <tr>
                    <td class="empty-table" colspan="<?=count($fields)+2?>">
                        <div  class="alert alert-warning">
                            {{trans('<?=$gen->getLangAccess()?>.index.no-records-found')}}
                        </div>
                    </td>
                </tr>

            @endforelse

        </tbody>
    
    </table>
</div>

{!! $records->appends(Request::query())->render() !!}

<div>
    <strong>Notas:</strong>
    <ul>
<?php if ($gen->hasDeletedAtColumn($fields)) { ?>
        <li>Los registros que están "Eliminados", se muestran con <span class="bg-danger">Fondo Rojo</span>.</li>
<?php } ?>
    </ul>
</div>