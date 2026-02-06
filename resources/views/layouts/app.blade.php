<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Exam')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Exam</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">

                @auth
                    @if(Route::has('tickets.index'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tickets.index') }}">Мои обращения</a>
                        </li>
                    @endif

                    @if(auth()->user()->isAdmin() && Route::has('admin.tickets.index'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.tickets.index') }}">Админка</a>
                        </li>
                    @endif

                    @if(Route::has('profile.edit'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.edit') }}">Профиль</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link">Выйти</button>
                        </form>
                    </li>
                @endauth

                @guest
                    @if(Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                    @endif

                    @if(Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endguest

            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
