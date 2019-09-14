<style>
    .navbar {
        background-image: linear-gradient(to right, #14b2e9, yellow, #3652a3, #91eee8);
    }
    .navbar-light .navbar-nav .nav-link {
        color: black;
    }
    .navbar-nav>li {
        padding-left: 0.35rem;
        padding-right: 0.35rem;
    }
</style>
<nav id="navar-menu" class="navbar navbar-fixed-top navbar-expand-md navbar-light   bg-light">
    <a class="navbar-brand" href="#"> <img id="sigma" style="width:7rem " src="{{asset("/imagenes/sigma.png")}}"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/home')}}">INICIO <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><b>Estudiantes</b></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="{{url('/home')}}">Consulta</a>
                    <a class="dropdown-item" href="{{url('ingresos/consultar_secciones')}}">Asignación de Sección</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('calificaciones/llenar')}}">Calificaciones</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><b>Personal</b></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Consulta</a>
                    <a class="dropdown-item" href="#">Operaciones</a>
                    <a class="dropdown-item" href="#">Asignación Periodo Escolar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><b>Secciones</b></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Consulta</a>
                    <a class="dropdown-item" href="#">Operaciones</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><b>Reportes y Estadisticas</b></a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="{{url('matricula/general')}}">Matriclula por Año/Sexo Actual</a>
                    <a class="dropdown-item" href="#">Matriclula por Año/Sexo Inicial</a>
                    <a class="dropdown-item" href="#">Matriclula por Año/Sexo Ingresos</a>
                    <a class="dropdown-item" href="#">Matriclula por Año/Sexo Egresos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('ingresos/constancia_estudios')}}">Constancia de Estudio</a>
                    <a class="dropdown-item" href="{{url('reportes/constancia_estudio')}}">Constancia de Estudio2</a>
                </div>
            </li>
        </ul>
        <div class="navbar-nav  mr-5">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="dropdown01" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-tools"></i> <b>Sistema</b></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Usuarios</a>
                    <a class="dropdown-item" href="#">Respaldo</a>
                    <a class="dropdown-item" href="#">Restaurar</a>
                   <a  class="dropdown-item font-weight-bold" style="color: red" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Salir del Sistema</a>
                </div>
            </li>
        </div>
    </div>
</nav>