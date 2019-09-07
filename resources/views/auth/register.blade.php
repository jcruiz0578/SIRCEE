@extends('layouts.app')



@section('content')


<style>

body {
  padding-top: 4rem;

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

.form-control{
font-weight: bold;

}


</style>



<div class="container-fluid justify-content-center  text-white col-md-6">

        <div class="card">
<div class="card-header  text-white  ml-3 mr-5" style="box-shadow: 15px 15px 15px #999;">


    <h3 class="card-title font-weight-bold"><span>     <img src="{{ asset('imagenes/usuario.png') }}" width="48" height="48" alt="Registro Usuario">   </span>   Registro de Usuarios </h3>
</div>


            <div class="card-body">
<form method="POST" action="{{ route('register') }}">
                        @csrf


                <div class="form-row   ">
                    <div class="form-group col-md-4 text-center">
                        <label for="">Usuario/Login</label>

                        <input type="text" name="login" id="login" class="form-control  @error('login') is-invalid @enderror"  value="{{ old('login') }}" required autocomplete="name" autofocus/>

@error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-8  text-center">
                        <label for="">Nombres y Apellidos</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        onkeyup = 'this.value = this.value.toUpperCase()'     required autocomplete="name"/>

@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                    </div>

                    <div class="form-group col-md-4 text-center">
                        <label for="">Categoria</label>
                        <select name="categoria" id="categoria" class="form-control "  value="{{ old('categoria') }}" >
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
                        <select name="status" id="status" class="form-control"  value="{{ old('status') }}">
                            <option value="N/A" disabled selected>N/A</option>
                            <option value="Activo">ACTIVO</option>
                            <option value="No Activo">NO ACTIVO</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6  text-center">
                        <label for="">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">


@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                    </div>




                </div>



                <div class="form-row  pt-3">

                    <div class="form-group col-md-6  text-center">
                        <label for="">Contraseña</label>
                        <input id="password"  name="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                    </div>

                    <div class="form-group col-md-6  text-center">
                        <label for="">Confirmar Contraseña</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>




                </div>


<div class="form-row  pt-3">
      <div class="form-group col-md-12  text-center  ">
<button type="submit" class=" form-control  btn btn-primary font-weight-bold" >
                                    {{ __('Registrar') }}
                                </button>
      </div>

</div>



</form>

            </div>
        </div>
    </div>
</div>


@endsection
