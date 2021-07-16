<!DOCTYPE html>
<html>

<head>

    <title>Ceritanya Halaman Index - SimpleDataParser</title>
    <link rel="icon" href="{!! asset('img/icon.png') !!}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ URL::asset('css/stisla.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/stislacomponent.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css')}}">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}



</head>

<body>

    <div class="sidenav">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="login-brand">
                <img src="{{ URL::asset('img/logologin.png') }}" alt="logo" width="100" class="center shadow-light ">
                <img style="margin-top: 5px" class="navbar-brand" src="{{ URL::asset('img/brand.png') }}"
                    href="{{ route('catalogs.index') }}">
            </div>
        </button>



        <div class="container">
            <h3>Barang</h3>
            <a href="{{ route('catalogs.index') }}" class=" {{ request()->is('/catalogs') ? 'active' : '' }}"><li class="ion ion-eye"> </li>Lihat Barang</a>
            <a href="{{ route('catalogs.create') }}">Tambah Barang</a>


            <h3>Foto Barang</h3>
            <a href="#">Lihat Data Foto</a>
            <a href="#" class="far fa-plus {{ request()->is('/photo/create') ? 'active' : '' }}">Tambah Foto
                Produk</a>

            <h3>Data Transaksi</h3>
            <a href="#">Lihat Transaksi</a>
        </div>



        <a class="mid">
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
