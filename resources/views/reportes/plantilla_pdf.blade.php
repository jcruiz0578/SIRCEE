<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <title>Sistema Integral de Registro de Control de Estudios y Evaluación</title>
<!-- 
    {!! Html::style('css/bootstrap4.3.1.css') !!} -->


    {!! Html::style('css/app.css') !!}



    <style>
        #imgMembrete {

            z-index: 1;
            width: 100%;
            height: 4rem;
        }
    </style>


</head>

<body>
    <div class="container-fluid">
        <header class="navbar-fixed-top">
            <nav>
                <img id="imgMembrete" src="{{asset("/imagenes/MEMBRETE.jpg")}}">


            </nav>
        </header>


        <main>
            <section>
                @yield('content')
            </section>
        </main>


        <footer class=" text-center text-center  navbar-fixed-bottom" style="font-size: 0.8rem">
            <hr style="height: 2px;">

            <b><i>“15 de febrero de 2019 - Bicentenario del Congreso de Angostura”</i></b> <b><i> <br> Urb.
                    Guayacán de las Flores, Sector 1, Calle # 5. Carúpano - Edo. Sucre</i></b><br>
            <b><i>Teléfonos: 0294-511-10.49/0294-332-48.66 - e-mail:lnbjfb@gmail.com - Twitter: @lnbjfb </i></b>
        </footer>

    </div>


</body>




</html>