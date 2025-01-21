<!-- Navigation -->
<nav>
    <a href="{{ route('home') }}">Inici</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('llibre_list') }}">Llibres</a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ route('autor_list') }}">Autor</a>
    &nbsp;&nbsp;&nbsp;
    @if (Auth::check())
    {{$usuari= Auth::user()->name}}
    <p>Usuari: {{$usuari}}</p>
    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
        &nbsp;&nbsp;&nbsp;
    @else
        <a href="{{ route('login') }}">Log In</a>
        &nbsp;&nbsp;&nbsp;
        <a href="{{ route('register') }}">Register</a>
    @endif
</nav>