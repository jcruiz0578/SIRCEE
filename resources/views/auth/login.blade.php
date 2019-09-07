@extends('layouts.app')

@section('content')

{!! Html::style('css/estilo1.css') !!}

<!-- Custom styles for this template -->





<div class=" col-sm-10  col-md-6 col-lg-4   formato  ">

    <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
        {{ csrf_field() }}
        <div class="text-center mb-4 form-box ">
            <div class="form-top">
                <div class="form-top-right pt-2">
                    <img src="{{ asset('imagenes/usuario.png') }}" width="48" height="48" alt="Inicio de sesión">
                </div>
                <div class="form-top-left">
                    <h2>Iniciar Sesión</h2>
                </div>
                {{-- @if($errors->has('login')) <span class="help-block  text-danger parpadea">
                    <strong>{{$errors->first('login') }}</strong></span> @endif --}}
            </div>
        </div>

        <div class="form-group ">
            <input type="text" name="login" id="login" class="form-control @if($errors->has('login')) <span class='
                bg-danger text-white'> @endif " value="{{old('login')}}" placeholder="Usuario" required autofocus>
            @if($errors->has('login')) <span class="text-danger parpadea">
                <strong>{{$errors->first('login') }}</strong></span> @endif
            <label for="login">Usuario</label>

        </div>

        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            @if($errors->has('password')) <span class="help-block  text-danger parpadea">
                <strong>{{$errors->first('password') }}</strong></span> @endif
            <label for="password">Password</label>
        </div>
        <div class="form-group text-center mb-4 font-weight-bold">
            <select id="periodoescolar" name="periodoescolar" class="form-control text-center font-weight-bold">
                <option>N/A</option>
                <option selected>2018-2019</option>
                <option>2017-2018</option>
                <option>2016-2017</option>
                <option>2015-2016</option>
                <option>2014-2015</option>
                <option>2013-2014</option>
                <option>2012-2013</option>
                <option>2011-2012</option>
                <option>2010-2011</option>
                <option>2009-2010</option>
            </select>
            <label for="periodoescolar">Periodo Escolar</label>
        </div>
        <hr>
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            <span><i class="fas fa-cog fa-pulse"></i></span> Acceder
        </button>
        {{--  <a class="btn btn-link" href="{{ url('/password/reset') }}"> Olvidaste tu contraseña? </a> --}}
        <p class="mt-5 mb-3 text-muted text-center"><b>&copy; 2015-2019</b></p>
    </form>
</div>