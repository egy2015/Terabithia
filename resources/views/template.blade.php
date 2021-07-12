<!DOCTYPE html>
<html>
<head>
    <title>Ceritanya Halaman Index - SimpleDataParser</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }} ">
</head>
<body>
 
    <div class="sidenav">
        <img class="navbar-brand" src="{{ URL::asset('img/brand.png');}}" href="{{ route('posts.index') }}">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#">Tentang kami</a>
        <a href="#">Panduan</a>
        <a href="#">Jalur Pribadi</a>
        
        <a> 
                 <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class=" btn btn-danger underline text-sm text-gray-600 hover:text-gray-900">
                  {{ __('Log Out') }} <u>{{ Auth::user()->name }}</u>
            </button>
        </form>
        </a>
      </div>

<div class="container">
    @yield('content')
</div>
 
    {{-- <link rel="script" href="{{ URL::asset('js/sidenav.js'); }}" > --}}
</body>
</html>