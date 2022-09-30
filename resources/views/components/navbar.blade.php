<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">COMPRA & GANA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link active" href="{{ route('home') }}">{{__('Inicio')}}</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{__('Categorías')}}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Ejemplo</a></li>
                    <li><a class="dropdown-item" href="#">Ejemplo</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Ejemplo</a></li>
                </ul>
            </li>
            @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link"> <span>{{__('Entrar')}}</span></a>
                </li>
            @endif
            @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link"> <span>{{__('Registrarse')}}</span></a>
                </li>
            @endif
            
        @else
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                        @csrf
                    </form>
                    <a href="" class="nav-item" id="logoutBtn">{{__('SALIR')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ads.create') }}">
                    Nuevo anuncio
                    </a>
                    </li>
                    

                <li class="nav-item">
                    <a href="{{ route('ads.create') }}" class="nav-link"> {{__('Nuevo anuncio')}}
                    </a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
