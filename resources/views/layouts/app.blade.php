<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/themify-icons/themify-icons.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="ti-hand-open"></span> {{ config('app.name', 'Hand4Help') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('requester.create') ? 'active' : '' }}" href="{{ route('requester.create') }}"><span class="ti-heart-broken {{ request()->routeIs('requester.create') ? 'text-danger' : '' }}"></span> {{ __('Ask for help') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('volunteer.create') ? 'active' : '' }}" href="{{ route('volunteer.create') }}"><span class="ti-medall {{ request()->routeIs('volunteer.create') ? 'text-success' : '' }}"></span> {{ __('Offer to help') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('login') }}"><span class="ti-help-alt"></span> {{ __('About us') }}</a>
                            </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('language', 'sr') }}">{{ __('SR') }}</a>
                            </li>
                                                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('language', 'en') }}">{{ __('EN') }}</a>
                            </li>
                                                    <li class="nav-item">
                                <a class="nav-link" href="{{ route('language', 'al') }}">{{ __('AL') }}</a>
                            </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="ti-user"></span> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(auth()->user()->role=='admin')
                                    <a class="dropdown-item" href="{{route('requester.index')}}">{{__('Requests')}}</a>
                                    <a class="dropdown-item" href="{{route('volunteer.index')}}">{{__('Volunteers')}}</a>
                                        <div class="dropdown-divider"></div>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
    @yield('script')
</body>
</html>
