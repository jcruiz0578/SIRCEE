<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


  <!--   {!! Html::style('css/bootstrap4.3.1.css') !!} -->

  {!! Html::style('css/app.css') !!}



    <title>Sistema Integrado de Registro de Estudiantes</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    {{-- <!--iconos  desde open-iconic  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" />
 --}}
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Styles -->

    <style>
        html,
        body {

            background: url("{{asset('/imagenes/1.jpg')}}");
            background-size: cover;
        }

        #navmenu {
            color: #636b6f;
            padding: 0 25px;
            font-size: 14px;
            font-weight: 200;
            letter-spacing: 0.1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>



</head>

<body>


    <header>
        <nav id="navmenu" class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
            <a class="navbar-brand" href="{{ url('/') }}"> <b>Inicio</b> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse " id="navbarCollapse">
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <ul class="navbar-nav mr-auto  navbar-right">

                </ul>

                <div class="form-inline my-4 my-lg-0">



                    <ul class="navbar-nav mr-auto  navbar-right">
                        <li class="nav-item active">
                            <a class="navbar-brand" href="{{ url('/login') }}"><b>Iniciar
                                    Sesión&nbsp;&nbsp;&nbsp;</b></a>
                        </li>
                        <li>
                            <a class="navbar-brand nav" href="{{ url('/register') }}"><b>Registarse</b></a>
                        </li>
                    </ul>


                </div>

            </div>



        </nav>
    </header>




    @yield('content')



    <!-- Scripts -->



    {!! Html::script('js/jquery-3.3.1.js') !!}
    {!! Html::script('js/popper.min.js') !!}
    {!! Html::script('js//bootstrap.min.js') !!}



    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

 --}}
</body>

</html>