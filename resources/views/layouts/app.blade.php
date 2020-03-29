<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciador de Posts</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<style>
    .navbar {
        margin-bottom: 40px;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="/">Laravel 6 Blog</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="{{route('posts.index')}}" class="nav-link">Posts</a>
                </li>
                <li class="nav-item active">
                    <a href="{{route('categories.index')}}" class="nav-link">Categorias</a>
                </li>
            </ul>
        @endauth
    </div>
    @auth
      <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toogle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{auth()->user()->name}}

                    @if (auth()->user()->profile->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->profile->avatar) }}" alt="Foto de {auth()->user()->name}}" class="rounded-circle" width="50">
                    @endif
                    <span class="caret"></span>
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                        @csrf
                    </form>

                    <a href="{{ route('profile.index') }}" class="dropdown-item">Profile</a>
                </div>
            </li>
      </ul>
    @endauth
    </nav>

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>
