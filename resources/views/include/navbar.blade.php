<nav class="navbar navbar-expand-md navbar-light shadow">
    <div class="container">
        <img src="{{ asset('storage/Icon.png') }}" class="col-sm-5 col-md-3 col-lg-2 col-xl-2">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @if (Auth::check())
                    @if(Auth::user()->RoleID == 1)
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::current()->getName() == 'Dashboard') ? 'active' : '' }}" href="{{ route('Dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::current()->getName() == 'Account.index') ? 'active' : '' }}" href="{{ route('Account.index') }}">User Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::current()->getName() == 'Data.index') ? 'active' : '' }}" href="{{ route('Data.index')}}">Data Entry</a>
                        </li>
                    @elseif(Auth::user()->RoleID == 2)
                        <li class="nav-item">
                            <a class="nav-link {{(Route::current()->getName() == 'Data.DataEntryIndex') ? 'active' : ''}}" href="{{ route('Data.DataEntryIndex', ['name' => Auth::user()->username]) }}">Data Entry</a>
                        </li>
                    @endif
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if(Auth::check()) 
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->RoleID == 1)
                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    <div class="dropdown-divider"></div>
                                @endif
                            @endif
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