<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <title>Sistema Integral de Registro de Control de Estudios y Evaluación</title>
 
   <!--  {!! Html::style('css/bootstrap4.3.1.css') !!}
  -->

  {!! Html::style('css/app.css') !!}

<!-- ya el css de laravel tiene integrado fontawesome
 -->

 
<!-- 
    {!! Html::style('fontawesome/css/all.css') !!}

    {!! Html::script('fontawesome/js/all.js') !!}
 -->


    <style>
        .footer {
            font-size: .70rem;

        }

        #imgMembrete {

            z-index: 1;
            width: 100%;
            height: 4rem;
        }
    </style>


</head>

<body>
    <div class="table-responsive">
        <header class="navbar-fixed-top">
            <nav>
                <img id="imgMembrete" src="{{asset("/imagenes/MEMBRETE.jpg")}}">
                @include('menu')
                @include('menu_logueo')

            </nav>
        </header>


        <main>
            <section>
                @yield('content')
            </section>
        </main>



        <footer class="  text-center text-muted" style="font-size: 0.8rem">
            <hr style="background: linear-gradient(to right, red, yellow); height: 2px;">

            <b>Copyright© 2015: Todos los Derechos Reservados. SISTEMA INTEGRAL DE REGISTRO DE CONTROL DE
                ESTUDIOS Y
                EVALUACIÓN</b><br> <b><i>L.N.B. General en Jefe José Francisco Bermúdez, Urb.
                    Guayacán de las Flores, Sector 1, Calle # 5.</i></b><br> <b><i>Teléfonos: 0294-511-10.49
                    /0294-332-48.66 -
                    e-mail:lnbjfb@gmail.com - Twitter: @lnbjfb </i></b><br> <b>Realizado
                por: ING. JUAN CARLOS RUIZ H</b>

        </footer>
    </div>

    <!-- Scripts -->


    {!! Html::script('js/popper.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}




</body>

</html>