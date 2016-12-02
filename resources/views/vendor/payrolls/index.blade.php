@extends('core::layouts.app-sidebar')

{{-- page title --}}
@section('title') Nómina Empleados @endsection
{{-- /page title --}}

{{-- view styles --}}
@section('styles')
@endsection
{{-- /view styles --}}

{{-- page content --}}
@section('content')
{{-- heading --}}
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-xs-12">
        <h2>Nómina Empleados</h2>
    </div>
</div>
{{-- /heading --}}

{{-- content --}}
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-lg-8 animated fadeInRight">
            <div class="ibox float-e-margins">
                {{-- box title --}}
                <div class="ibox-title">
                    <h5>Empleados Activos</h5>

                    {{-- heading menu --}}
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    {{-- /heading menu --}}

                </div>
                {{-- /box title --}}

                {{-- box content --}}
                <div class="ibox-content">
                    {!! Form::open(['route' => 'payrolls.calculate', 'method' => 'POST']) !!}
                        <button class="btn btn-primary" type="submit">
                            Calcular Salario de todos
                        </button>
                    {!! Form::close() !!}

                    <ul class="list-group">
                        @foreach($employees as $employee)
                        <li class="list-group-item">{{ $employee->name }}</li>
                        @endforeach
                    </ul>

                </div>
                {{-- /box content --}}

                {{-- box footer
                <div class="ibox-footer">
                    <span class="pull-right">
                        The righ side of the footer
                    </span>
                    This is simple footer example
                </div>
                --}}
                {{-- /box footer --}}
            </div>{{-- /ibox --}}
        </div>{{-- /col-**-** --}}
    </div>{{-- /row --}}
</div>
{{-- /content --}}
@endsection
{{-- /page content --}}

{{-- view scripts --}}
@section('scripts')
@endsection