<nav class="navbar navbar-expand-md navbar-dark custom-nav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Cebu Health') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @if (Auth::check())
                    @if(Auth::user()->RoleID == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Account.index') }}">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Data.index')}}">Data Entry</a>
                        </li>
                    @elseif(Auth::user()->RoleID == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Data.create') }}">Add Entry</a>
                        </li>
                    @endif
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if(Auth::check()) 
                    @if (Auth::user()->RoleID == 1)
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
            </ul>
        
        </div>
    
    </div>
</nav>