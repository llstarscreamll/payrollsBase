{{--
    ****************************************************************************
    Botones de Index.
    ____________________________________________________________________________
    Muestra los botones o enlaces a acciones como eliminar o crear registros en
    la base dedatos. Esta vista es llamada desde la vista index.
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

<div class="row tools">
    <div class="col-md-6 action-buttons">
    @if (array_get(Request::get(config('modules.core.app.search-fields-prefix', 'search')), 'trashed_records', null) != 'onlyTrashed' && auth()->user()->can('legal-company-natures.destroy'))

    {{-- Formulario para borrar resgistros masivamente --}}
    {!! Form::open([
        'route' => ['legal-company-natures.destroy', 0],
        'method' => 'DELETE',
        'id' => 'deletemanyForm',
        'class' => 'form-inline display-inline'
    ]) !!}
        
        {{-- Botón que muestra ventana modal de confirmación para el envío del formulario para eliminar varios registro a la vez --}}
        <button title="{{trans('core::shared.delete-many-btn')}}"
                class="btn btn-default btn-sm many-action bootbox-dialog"
                role="button"
                data-toggle="tooltip"
                data-placement="top"
                {{-- Setup de ventana modal de confirmación --}}
                data-modalTitle="{{trans('core::shared.delete-btn')}}"
                data-modalMessage="{{trans('core::shared.modal-delete-many-message')}}"
                data-btnLabel="{{trans('core::shared.modal-delete-many-btn-confirm')}}"
                data-btnClassName="btn-danger"
                data-targetFormId="deletemanyForm"
                type="button">
            <span class="fa fa-minus-circle"></span>
            <span class="sr-only">{{trans('core::shared.delete-many-btn')}}</span>
        </button>
    
    {!! Form::close() !!}

    @endif


        @if(auth()->user()->can('legal-company-natures.create'))
            {{-- El boton que dispara la ventana modal con formulario de creación de registro --}}
            {{--*******************************************************************************************************************************
                Descomentar este bloque y comentar el bloque siguiente si se desea que el formulario de creación SI quede en la vista del index
                *******************************************************************************************************************************--}}
            <div class="display-inline" role="button"  data-toggle="tooltip" data-placement="top" title="{{trans('legalCompanyNature.index-create-btn')}}">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#create-form-modal">
                    <span class="glyphicon glyphicon-plus"></span>
                    <span class="sr-only">{{trans('legalCompanyNature.index-create-btn')}}</span>
                </button>
            </div>

            {{-- Formulario de creación de registro --}}
            @include('legalCompanyNatures.partials.index-create-form')

            {{-- Link que lleva a la página con el formulario de creación de registro --}}
            {{--******************************************************************************************************************************
                Descomentar este bloque y comentar el bloque anterior si se desea que el formulario de creación NO quede en la vista del index
            <a id="create-legal-company-natures-link" class="btn btn-default btn-sm" href="{!! route('legal-company-natures.create') !!}" role="button"  data-toggle="tooltip" data-placement="top" title="{{trans('legalCompanyNature.index-create-btn')}}">
                <span class="glyphicon glyphicon-plus"></span>
                <span class="sr-only">{{trans('legalCompanyNature.index-create-btn')}}</span>
            </a>
                ******************************************************************************************************************************--}}
        @endif
    </div>
</div>