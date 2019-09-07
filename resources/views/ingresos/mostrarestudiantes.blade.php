@extends('plantilla')
@section('content')
@include('errors/errors')



{!! Html::style('css/jquery.dataTables.min.css') !!}


<h2 class="text-center  font-weight-bold">
    Búsqueda e Historial del Estudiante
</h2>
<br>
{!! Form::open(['route' => 'ingresos.search', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
{!! csrf_field() !!}
<div class="form-group ">
    {!!Form::text('busqueda', null, ['class' => 'form-control ml-4', 'id' => 'busqueda', 'value' => '',
    'placeholder'=>'Cédula Id' ] ) !!}
    <button type="submit" class="btn btn-primary"><span><i class="fa fa-search"></i></span>Buscar</button>
    <a href="{{ url('ingresos/create') }}" class="btn btn-success"><i class="far fa-file-alt"></i> Nuevo Ingreso</a>
</div>
{!! Form::close() !!}
@include('mensajes')
<br>


<div class="container-fluid  table-responsive">

    <table id="tabla1" class="table  table-hover  table-bordered text-center" style="width: 100%">
        <thead class="text-white bg-primary">
            <tr class="font-weight-bold">

                <th>Código</th>
                <th>Cedula Id</th>
                <th>Apellidos y Nombres</th>
                <th>sexo</th>
                <th>Año y Secc</th>
                <th>Status</th>
                <th>Operaciones</th>

            </tr>
        </thead>
        <tbody>

            @if (count($users) > 0)

            @foreach ($users as $user)
            <tr>

                <td>{{ $user->id_ingreso }}</td>
                <td>{{ $user->cedulaest }}</td>
                <td>{{ $estudiantes = $user->apellidosest.", ". $user->nombresest }}</td>
                <td>{{ $user->sexoest }}</td>
                <td>{{ $user->anoest." ".$user->seccion }}</td>
                <td>{{ $user->status }}</td>
                <td><a href="{{ url('ingresos/search_individual', array($user->id_ingreso, $user->cedulaest, $mensaje='mostrar' )) }}"
                        class="btn btn-primary"><i class="fas fa-tools"></i> Operaciones</a></td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot class="text-white bg-primary">
            <tr class="font-weight-bold">

                <th>Código</th>
                <th>Cedula Id</th>
                <th>Apellidos y Nombres</th>
                <th>sexo</th>
                <th>Año y Secc</th>
                <th>Status</th>
                <th>Operaciones</th>

            </tr>

        </tfoot>
    </table>

    {{-- {{ $users->links() }} --}}

    {{-- con bootstrap 4  --}}

    {{-- {{ $users->links('pagination::bootstrap-4') }} --}}



</div>
{!! Html::script('js/jquery-3.3.1.js') !!}

{!! Html::script('js/jquery.dataTables.min.js') !!}




<script>
    $(document).ready(function() {
 $('#tabla1').DataTable( {

 scrollY: "400px",
 scrollX: true,
 scrollCollapse: true,
// "order": [[4, 'asc'], [1, 'Desc']],


paging: true,
pageLength: 35,
lengthMenu: [[10, 25, 35, -1], [10, 25, 35, "All"]],
order:false,
paging: true,
processing: true,
//serverSide: true,




language: {
    "lengthMenu": "Mostrar _MENU_ registros",
"search": "Buscar:",
"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
"infoEmpty": "Mostrando 0 a 0 de 0 registros",
"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",

"paginate": {
"first": "Primero",
"last": "Ultimo",
"next": "Próximo",
"previous": "Anterior"
},
}


} );

} );
</script>

@endsection
