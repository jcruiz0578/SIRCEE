@extends('layouts.app')



@section('content')


<style>

body {
  padding-top: 7rem;

}


    input.formato,
    select.formato,
    textarea.formato {
        font-weight: bold;
        /*  box-shadow: 15px 15px 15px #999; */
        font-size: 1.2rem;
       /*  border-left: none;
        border-right: none;
        border-top: none;
 */
    }

    label {
        font-weight: bold;

        font-size: 0.8rem;
    }


    .card {
        background: rgba(76, 76, 76, 0.2);
        box-shadow: 15px 15px 15px #999;
        border-radius: 0rem 0rem 1rem 1rem;

        border-left: none;
        border-right: none;
        border-top: none;
    }

   /*  .form-control {
        border-left: none;
        border-right: none;
        border-top: none;
        border-bottom-width: .2rem
    } */
</style>



<div class="container-fluid justify-content-center  text-white col-md-6">

        <div class="card">
<div class="card-header  text-white  ml-3 mr-5" style="box-shadow: 15px 15px 15px #999;">
                        <h3 class="card-title font-weight-bold">Registro de Usuarios</h3>
                    </div>


            <div class="card-body">
                <div class="form-row   ">
                    <div class="form-group col-md-4 text-center">
                        <label for="">Usuario/Login</label>
                        <input type="text" name="login" id="login" class="form-control" />
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-9  text-center">
                        <label for="">Nombres y Apellidos</label>
                        <input type="text" name="name" id="name" class="form-control" />
                    </div>

                    <div class="form-group col-md-3 text-center">
                        <label for="">Categoria</label>
                        <select name="categoria" class="form-control">
                            <option value="N/A" disabled selected>N/A</option>
                            <option value="USUARIO">USUARIO</option>
                            <option value="OPERADOR">OPERADOR</option>
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                        </select>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-4  text-center">
                        <label for="">Status</label>
                        <select name="status" class="form-control">
                            <option value="N/A" disabled selected>N/A</option>
                            <option value="Activo">Activo</option>
                            <option value="No Activo">No Activo</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6  text-center">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control">


                    </div>




                </div>



                <div class="form-row  pt-3">

                    <div class="form-group col-md-6  text-center">
                        <label for="">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group col-md-6  text-center">
                        <label for="">Confirmar Contraseña</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                    </div>




                </div>








            </div>
        </div>
    </div>
</div>


@endsection
