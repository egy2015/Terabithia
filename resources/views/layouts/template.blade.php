<!DOCTYPE html>
<html>

<head>

    <title>Ceritanya Halaman Index - SimpleDataParser</title>
    <link rel="icon" href="{!! asset('img/icon.png') !!}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ URL::asset('css/stisla.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/stislacomponent.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}



</head>

<body>

<div id='wrapper'>
    <div class="main-sidebar bg-dark">
        <aside id="sidebar-wrapper">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="login-brand">
                    <img src="{{ URL::asset('img/logologin.png') }}" alt="logo" width="100"
                        class="center shadow-light ">
                    <img style="margin-top: 5px" class="navbar-brand" src="{{ URL::asset('img/brand.png') }}"
                        href="{{ route('catalogs.index') }}">
                </div>
            </button>



            <div class="container">
                <h3>Barang</h3>
                <ul style="list-style-type:none">
                    <li><a href="{{ route('catalogs.index') }}" class="nav-link">Lihat Barang<a></li>
                    <li><a href="{{ route('catalogs.create') }}" class="nav-link">Tambah Barang</a></li>
                </ul>
                <h3>Foto Barang</h3>
                <ul style="list-style-type:none">
                    <li><a class="nav-link" href="{{ route('picture.index') }}">Lihat Data Foto</a></li>
                    <li><a class="nav-link" href="{{ route('picture.create') }}">Tambah Foto Produk</a></li>
                </ul>

                <h3>Data Transaksi</h3>
                <ul style="list-style-type:none">
                    <li><a class="nav-link" href="{{ route('transactions.index') }}"> Lihat Transaksi</a></li>
                </ul>
            </div>



            <ul style="list-style-type:none">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class=" btn has-icon btn-danger underline text-sm text-gray-600 hover:text-gray-900">
                            {{ __('Log Out') }} | <u>{{ Auth::user()->name }}</u>
                        </button>
                    </form>
                </li>
            </ul>
        </aside>
    </div>
</div>

    <div class="container container-fluid">
        @yield('content')
    </div>

      <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!-- Menu Toggle Script -->
</body>

</html>
