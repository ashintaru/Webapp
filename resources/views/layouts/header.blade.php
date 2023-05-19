<nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <div>
{{--                    <div class="row">--}}
{{--                        <div class="col-3">--}}
{{--                            <img src="{{asset('assets/img/peso_logo.png')}}" alt="" height="90">--}}
{{--                        </div>--}}
{{--                        <div class="col-9">ow--}}
{{--                            <h1>PESO <span class="text-white">CABUYAO CITY</span></h1>--}}
{{--                            Public Employment Service Office--}}
{{--                        </div>--}}
{{--                    </div>--}}
                <img src="{{asset('assets/img/pesologo.png')}}"  height="70" width="100%">
            </div>

        </a>
        <button class="navbar-toggler" style="font-size: 20px" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="container-fluid clearfix">
        <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- <li class="nav-item">
                    <a href="{{ url('logIn') }}" class="nav-link active text-white">Login</a>
                </li>
             --}}
                    {{-- <li class="nav-item"><a href="{{ url('/event-view') }}" class="nav-link text-sm text-white-700 dark:text-white-500 underline text-white">Event</a></li> --}}
                    <li class="nav-item"><a href="#search" class="nav-link text-sm text-white-700 dark:text-white-500 underline text-white">Job Search</a></li>
                    <li class="nav-item"><a href="#list" class="nav-link text-sm text-white-700 dark:text-white-500 underline text-white">Job List</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link text-sm text-white-700 dark:text-white-500 underline text-white">Contact</a></li>
                @auth
                    <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link text-sm text-white-700 dark:text-white-500 underline text-white">Home</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-sm text-white-700 dark:text-white-500 underline text-white">Log in </a></li>
{{-- 
                    @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link text-sm text-white-700 dark:text-white-500 underline text-white">Register</a>  </li>
                    @endif --}}
                @endauth
                {{-- @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/home') }}" class="nav-link active text-white">Home</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('jobPage')}}">Job</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Event</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link text-white">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link text-white">Register</a>
                        </li>
                        @endif
                    @endauth
                @endif --}}
{{--                    <form class="d-flex">--}}
{{--                        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">--}}
{{--                        <button type="submit" class="btn text-white" style="background-color: #2e6ca4">Search</button>--}}
{{--                    </form> --}}
            </ul>
        </div>
    </div>
</nav>
