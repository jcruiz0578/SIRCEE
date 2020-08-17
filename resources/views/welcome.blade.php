@extends('layouts.app')
@section('content')
<!-- Styles -->
<style>
	html,
	body {
		background: url("{{asset('/imagenes/fondo.jpg')}}");
		-webkit-background-size: cover;
		background-size: cover;
		/* 	font-family: 'Raleway', sans-serif;
		font-weight: 100; */
		height: 100vh;
		margin: 0px;
	}

	.full-height {
		height: 100vh;
	}

	.flex-center {
		align-items: center;
		display: flex;
		justify-content: center;
	}

	.position-ref {
		position: relative;
	}

	.top-right {
		position: absolute;
		right: 10px;
		top: 18px;
	}

	.content {
		text-align: center;
		font-family: 'Raleway', sans-serif;
		font-weight: 100;

	}

	.title {
		font-size: 6rem;


	}

	.links>a {
		/* color: #636b6f;*/
		color: #636b6f;
		padding: 0 25px;
		font-size: 14px;
		font-weight: 600;
		letter-spacing: .1rem;
		text-decoration: none;
		text-transform: uppercase;
	}

	.m-b-md {
		margin-bottom: 80px;
	}
</style>

<body style=''>
	<div class="flex-center position-ref full-height">
		@if (Route::has('login'))
		<div class="top-right links">
			<a href="{{ url('/login') }}">
				<font color="RED">Iniciar Sesión</font>
			</a> {{-- <a href="{{ url('/register') }}">
				<font color="RED">Registrarse</font>
			</a> --}}
		</div>
		@endif
		<div class="content">
			<div class="title m-b-md">   <img id="sigma" src="{{asset("/imagenes/sigma.png")}}"></div>
			<div class="links">
				<a href="#">Documentación</a> <a href="#">Noticias</a> <a href="#">Twitter</a> <a href="#">MPPE</a> <a
					href="#"><b>JCRGLOBALTECH C.A</b></a>
			</div>
		</div>
	</div>
</body>
@endsection
