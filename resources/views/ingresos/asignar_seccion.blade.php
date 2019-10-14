@extends('plantilla')
@section('content')
@include('errors/errors')



{!! Html::style('css/jquery.dataTables.min.css') !!}


<h2 class="text-center  font-weight-bold">
    Asignación de Sección
</h2>

@include('mensajes')



<div class="container-fluid  table-responsive">

    <div class="form-row justify-content-end">



        <div class="form-group col-md-1">
            <b>Sección:</b><select name="seccion" id="seccion" class="form-control text-center  font-weight-bold">
                <option>N/A</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
                <option>E</option>
                <option>F</option>
                <option>G</option>
                <option>H</option>
                <option>I</option>
                <option>U</option>
            </select>
        </div>




        <div class="form-group     col-md-2  align-self-end ">
            <button type="submit" id="enviar" class="btn btn-primary  form-control font-weight-bold enviar"
                style="height: 4rem; "><span><i class="fa fa-list-alt"></i> Asignar/Cambiar</button>
        </div>




    </div>




    <div style="text-align: left; float: left">

        <b> Ha seleccionado:</b> <input type="text" name="numero" id="numero" class="formato" value="0" size="1"
            style="border: none; font-size: 18px; height: auto; width: 50px; text-align: center">
        <b>Registros</b>
    </div>



    <table id="tabla1" class="table  table-hover  table-bordered text-center " style="width: 100%">
        <thead class="text-white bg-primary">
            <tr class="font-weight-bold">
                <th>N°</th>
                <th>Código</th>
                <th>Cedula Id</th>
                <th>Apellidos y Nombres</th>
                <th>sexo</th>
                <th>Fech. Nac</th>
                <th>Año</th>
                <th>Secc</th>


            </tr>
        </thead>
        <tbody>


        </tbody>

        <tfoot class="text-white bg-primary">
            <tr class="font-weight-bold">
                <th></th>
                <th>Código</th>
                <th>Cedula Id</th>
                <th>Apellidos y Nombres</th>
                <th>sexo</th>
                <th>Fech. Nac</th>
                <th>Año</th>
                <th>Secc</th>
            </tr>
    </table>





</div>
{!! Html::script('js/jquery-3.3.1.js') !!}

{!! Html::script('js/jquery.dataTables.min.js') !!}

{!! Html::script('js/operaciones/asignar_seccion.js') !!}


@endsection
