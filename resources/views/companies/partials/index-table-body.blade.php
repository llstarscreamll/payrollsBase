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
    @copyright  (c) 2015-2017, Johan Alvarez <llstarscreamll@hotmail.com>
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
        @if(in_array('identity_card_type_id', $selectedTableColumns))
        <td class="identity_card_type_id">
            {{ $record->identityCardType ? $record->identityCardType->name : '' }}
        </td>
        @endif
        @if(in_array('contributor_identity_card_number', $selectedTableColumns))
        <td class="contributor_identity_card_number">
            {{ $record->contributor_identity_card_number }}
        </td>
        @endif
        @if(in_array('verification_digit', $selectedTableColumns))
        <td class="verification_digit">
            {{ $record->verification_digit }}
        </td>
        @endif
        @if(in_array('legal_company_nature_id', $selectedTableColumns))
        <td class="legal_company_nature_id">
            {{ $record->legalCompanyNature ? $record->legalCompanyNature->name : '' }}
        </td>
        @endif
        @if(in_array('person_type', $selectedTableColumns))
        <td class="person_type">
            {{ $record->person_type }}
        </td>
        @endif
        @if(in_array('address', $selectedTableColumns))
        <td class="address">
            {{ $record->address }}
        </td>
        @endif
        @if(in_array('municipality_id', $selectedTableColumns))
        <td class="municipality_id">
            {{ $record->municipality ? $record->municipality->name : '' }}
        </td>
        @endif
        @if(in_array('dane_activity_code', $selectedTableColumns))
        <td class="dane_activity_code">
            {{ $record->dane_activity_code }}
        </td>
        @endif
        @if(in_array('phone', $selectedTableColumns))
        <td class="phone">
            {{ $record->phone }}
        </td>
        @endif
        @if(in_array('fax', $selectedTableColumns))
        <td class="fax">
            {{ $record->fax }}
        </td>
        @endif
        @if(in_array('email', $selectedTableColumns))
        <td class="email">
            {{ $record->email }}
        </td>
        @endif
        @if(in_array('legal_rep_identity_card_type_id', $selectedTableColumns))
        <td class="legal_rep_identity_card_type_id">
            {{ $record->legalRepentityCardType ? $record->legalRepentityCardType->name : '' }}
        </td>
        @endif
        @if(in_array('legal_rep_identity_card_number', $selectedTableColumns))
        <td class="legal_rep_identity_card_number">
            {{ $record->legal_rep_identity_card_number }}
        </td>
        @endif
        @if(in_array('legal_rep_verification_digit', $selectedTableColumns))
        <td class="legal_rep_verification_digit">
            {{ $record->legal_rep_verification_digit }}
        </td>
        @endif
        @if(in_array('legal_rep_first_name', $selectedTableColumns))
        <td class="legal_rep_first_name">
            {{ $record->legal_rep_first_name }}
        </td>
        @endif
        @if(in_array('legal_rep_middle_name', $selectedTableColumns))
        <td class="legal_rep_middle_name">
            {{ $record->legal_rep_middle_name }}
        </td>
        @endif
        @if(in_array('legal_rep_first_surname', $selectedTableColumns))
        <td class="legal_rep_first_surname">
            {{ $record->legal_rep_first_surname }}
        </td>
        @endif
        @if(in_array('legal_rep_last_surname', $selectedTableColumns))
        <td class="legal_rep_last_surname">
            {{ $record->legal_rep_last_surname }}
        </td>
        @endif
        @if(in_array('legal_rep_email', $selectedTableColumns))
        <td class="legal_rep_email">
            {{ $record->legal_rep_email }}
        </td>
        @endif
        @if(in_array('contact_first_name', $selectedTableColumns))
        <td class="contact_first_name">
            {{ $record->contact_first_name }}
        </td>
        @endif
        @if(in_array('contact_last_name', $selectedTableColumns))
        <td class="contact_last_name">
            {{ $record->contact_last_name }}
        </td>
        @endif
        @if(in_array('contact_cell_phone', $selectedTableColumns))
        <td class="contact_cell_phone">
            {{ $record->contact_cell_phone }}
        </td>
        @endif
        @if(in_array('contact_email', $selectedTableColumns))
        <td class="contact_email">
            {{ $record->contact_email }}
        </td>
        @endif
        @if(in_array('contributor_class_id', $selectedTableColumns))
        <td class="contributor_class_id">
            {{ $record->contributorClass ? $record->contributorClass->name : '' }}
        </td>
        @endif
        @if(in_array('presentation_form', $selectedTableColumns))
        <td class="presentation_form">
            {{ $record->presentation_form }}
        </td>
        @endif
        @if(in_array('contributor_type_id', $selectedTableColumns))
        <td class="contributor_type_id">
            {{ $record->contributorType ? $record->contributorType->name : '' }}
        </td>
        @endif
        @if(in_array('payroll_type_id', $selectedTableColumns))
        <td class="payroll_type_id">
            {{ $record->payrollType ? $record->payrollType->name : '' }}
        </td>
        @endif
        @if(in_array('arl_company_id', $selectedTableColumns))
        <td class="arl_company_id">
            {{ $record->arlCompany ? $record->arlCompany->name : '' }}
        </td>
        @endif
        @if(in_array('arl_department_id', $selectedTableColumns))
        <td class="arl_department_id">
            {{ $record->arlDepartment ? $record->arlDepartment->name : '' }}
        </td>
        @endif
        @if(in_array('law_1429_from_2010', $selectedTableColumns))
        <td class="law_1429_from_2010">
            {{ $record->law_1429_from_2010 }}
        </td>
        @endif
        @if(in_array('law_1607_from_2012', $selectedTableColumns))
        <td class="law_1607_from_2012">
            {{ $record->law_1607_from_2012 }}
        </td>
        @endif
        @if(in_array('commercial_registration_date', $selectedTableColumns))
        <td class="commercial_registration_date">
            {{ $record->commercial_registration_date }}
        </td>
        @endif
        @if(in_array('payment_method', $selectedTableColumns))
        <td class="payment_method">
            {{ $record->payment_method }}
        </td>
        @endif
        @if(in_array('bank_id', $selectedTableColumns))
        <td class="bank_id">
            {{ $record->bank ? $record->bank->name : '' }}
        </td>
        @endif
        @if(in_array('bank_account_type', $selectedTableColumns))
        <td class="bank_account_type">
            {{ $record->bank_account_type }}
        </td>
        @endif
        @if(in_array('bank_account_number', $selectedTableColumns))
        <td class="bank_account_number">
            {{ $record->bank_account_number }}
        </td>
        @endif
        @if(in_array('payment_frequency', $selectedTableColumns))
        <td class="payment_frequency">
            {{ $record->payment_frequency }}
        </td>
        @endif
        @if(in_array('pila_payment_operator_id', $selectedTableColumns))
        <td class="pila_payment_operator_id">
            {{ $record->pilaPaymentOperator ? $record->pilaPaymentOperator->name : '' }}
        </td>
        @endif
        
        @if(!isset($hide_actions_column))
        {{-- Los botones de acción para cada registro --}}
        <td class="actions-column">
            {{-- Botón para ir a los detalles del registro --}}
            <a  href="{{route('companies.show', $record->id)}}"
                class="btn btn-primary btn-xs"
                role="button"
                data-toggle="tooltip"
                data-placement="top"
                title="{{trans('core::shared.show-btn')}}">
                <span class="fa fa-eye"></span>
                <span class="sr-only">{{trans('core::shared.show-btn')}}</span>
            </a>

            @if(auth()->user()->can('companies.edit'))
                {{-- Botón para ir a formulario de actualización del registro --}}
                <a  href="{{route('companies.edit', $record->id)}}"
                    class="btn btn-warning btn-xs" role="button"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="{{trans('core::shared.edit-btn')}}">
                    <span class="glyphicon glyphicon-pencil"></span>
                    <span class="sr-only">{{trans('core::shared.edit-btn')}}</span>
                </a>
            @endif

            @if(auth()->user()->can('companies.destroy'))
                {{-- Formulario para eliminar registro --}}
                {!! Form::open(['route' => ['companies.destroy', $record->id], 'method' => 'DELETE', 'class' => 'form-inline display-inline']) !!}
                    
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
        <td class="empty-table" colspan="42">
            <div  class="alert alert-warning">
                {{trans('core::shared.no-records-found')}}
            </div>
        </td>
    </tr>

@endforelse