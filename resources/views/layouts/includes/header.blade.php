<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @if (!Auth::guest())
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="#" class="btn btn-link">Dashboard</a></li>
                    @can ('list-ticket')
                        <li><a href="{{ route('ticket.index') }}" class="btn btn-link">Tickets</a></li>
                    @endcan
                    @can ('create-ticket')
                        <li class="active"><a href="{{ route('ticket.report') }}" class="btn btn-link">Reportar</a></li>
                    @endcan
                    @can ('see-auxiliares')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-power-off"></i> Auxiliares <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('category.index') }}">Categorias</a></li>
                                <li><a href="{{ route('priority.index') }}">Prioridades</a></li>
                                <li><a href="#">Departamentos</a></li>
                            </ul>
                        </li>
                    @endcan
                </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Acesso</a></li>
                    <li><a href="{{ route('register') }}">Registre-se</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @can ('edit-profile')
                                <li><a href="{{ route('user.profile') }}"><i class="fa fa-gears" aria-hidden="true"></i> Configurações da conta</a></li>
                            @endcan
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" class="logout"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
