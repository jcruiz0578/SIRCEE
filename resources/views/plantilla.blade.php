<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <title>Sistema Integral de Gestión Matricular Avanzado</title>
  
  {!! Html::style('css/app.css') !!}
 

<!-- ya el css de laravel tiene integrado fontawesome
 -->

    {{-- {!! Html::style('fontawesome/css/all.css') !!}
    {!! Html::script('fontawesome/js/all.js') !!} --}}


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
            <b>Copyright© 2019: Todos los Derechos Reservados. SISTEMA INTEGRAL DE GESTIÓN MATRICULAR AVANZADO</b><br> <b><i>L.N.B. General en Jefe José Francisco Bermúdez, Urb.
                    Guayacán de las Flores, Sector 1, Calle # 5.</i></b><br> <b><i>Teléfonos: 0294-511-10.49
                    /0294-332-48.66 -
                    e-mail:lnbjfb@gmail.com - Twitter: @lnbjfb </i></b><br> <b>Realizado
                por: ING. JUAN CARLOS RUIZ H</b>
        </footer>
    </div>
    <!-- Scripts -->

    {{-- {!! Html::script('js/app.js') !!} --}}

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script> 
    {!! Html::script('js/bootstrap.min.js') !!}




   



</body>
</html>
