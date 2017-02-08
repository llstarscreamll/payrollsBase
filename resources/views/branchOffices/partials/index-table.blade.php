{{--
    ****************************************************************************
    Tabla Index.
    ____________________________________________________________________________
    Muestra tabla con los registros de la base de datos, cada fila tiene enlaces
    de acceso rápidos a acciones como eliminar, editar o ver detalles del
    registro.

    Usa de los siguientes partials:
    - partials.index-table-header
    - partials.index-table-search
    - partials.index-table-body

    Los links de paginación de los datos se muestran a continuación de la tabla.

    Hay una zona de notas donde se hace aclaraciones de como son mostrados los
    datos mostrados en la tabla.
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

{!! Form::open(['route' => 'branch-offices.index', 'method' => 'GET', 'id' => 'searchForm']) !!}
{!! Form::close() !!}

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            {{-- header de la tabla --}}
            @include('branchOffices.partials.index-table-header')

            {{-- formulario de búsqueda --}}
            @include('branchOffices.partials.index-table-search')
        </thead>

        <tbody>
            {{-- body de tabla --}}
            @include('branchOffices.partials.index-table-body')
        </tbody>
    </table>
</div>

{!! $records->appends(Request::query())->render() !!}

<div class="table-notes">
    <strong>Notas:</strong>
    <ul>
    </ul>
</div>