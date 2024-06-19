<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
@php
    $routeName = request()->route()->getName()
@endphp
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a @class(['nav-link', 'active' => str_starts_with($routeName, 'blog.')]) aria-current="page" href="{{ route('blog.index') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
                <div class="navbar-nav ms-auto mb-2 mb-lq-0">
                    @auth
                        {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="nav-link">Se deconnecter</button>
                        </form>
                    @endauth
                    @guest
                        <div class="anv-item">
                            <a class="nav-link" href="{{ route('auth.login') }}">Se connecter</a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>