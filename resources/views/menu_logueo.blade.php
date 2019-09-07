<h2 class="text-center">
    <b>Período Escolar: <span class="text-danger"> {{$value =session()->get('periodoescolar')}}</span>
    </b>
</h2>

<div class="text-right pr-4">
    <span class="font-weight-bold text-danger">Categoria del Usuario: </span> <span class="font-weight-bold">
        {{Auth::user()->categoria }}</span>

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <span class="caret  text-primary font-weight-bold">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> Cerar Sesión </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}</form>
                </li>
            </ul>
        </li>

    </ul>


</div>