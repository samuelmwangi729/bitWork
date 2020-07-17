<nav class="navbar navbar-expand-md">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}" height="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li><a class="nav-link" href="/Freelancers" id="nav-link">Find Freelancers</a></li>
                <li><a class="nav-link" href="/HowItWorks" id="nav-link">How It Works</a></li>
                <li><a class="nav-link active" href="/Projects" id="nav-link">Find Projects</a></li>
                <li><a class="nav-link" href="/register" id="nav-link">Join Us</a></li>
                <li><a class="nav-link" href="/login" id="nav-link">Login</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
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
                @endguest
            </ul>
        </div>
    </div>
</nav>