<!DOCTYPE html>
<html>

<head>

    <title>Ceritanya Halaman Index - SimpleDataParser</title>
    <link rel="icon" href="{!! asset('img/icon.png') !!}" />
    {{-- Style --}}
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }} ">
    <link rel="stylesheet" href="{{ URL::asset('css/stisla.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/stislacomponent.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}



</head>

<body>

    <div id='wrapper'>
        <div class="card main-sidebar bg-dark">
            <aside id="sidebar-wrapper">

                <div class="login-brand">
                    <img src="{{ URL::asset('img/logologin.png') }}" alt="logo" width="100"
                        class="center shadow-light ">
                    <img style="margin-top: 5px" class="navbar-brand" src="{{ URL::asset('img/brand.png') }}"
                        href="{{ route('catalogs.index') }}">
                </div>



                <div class="container">
                    <h3>Barang</h3>
                    <ul style="list-style-type:none">
                        <li><a href="{{ route('catalogs.index') }}" class="text-white"><i
                                    class="fa fa-eye">&nbsp;</i>Lihat Barang<a></li>
                        <li><a href="{{ route('catalogs.create') }}" class="text-white"><i
                                    class="fa fa-plus">&nbsp;</i>Tambah Barang</a></li>
                    </ul>
                    <h3>Foto Barang</h3>
                    <ul style="list-style-type:none">
                        <li><a class="text-white" href="{{ route('picture.index') }}"><i
                                    class="fa fa-eye">&nbsp;</i>Lihat Data Foto</a></li>
                        <li><a class="text-white" href="{{ route('picture.create') }}"><i
                                    class="fa fa-plus">&nbsp;</i>Tambah Foto Produk</a></li>
                    </ul>

                    <h3>Data Transaksi</h3>
                    <ul style="list-style-type:none">
                        <li><a class="text-white" href="{{ route('transactions.index') }}"><i
                                    class="fa fa-eye">&nbsp;</i>Lihat Transaksi</a></li>
                    </ul>
                </div>



                <ul style="list-style-type:none">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit"
                                class=" btn has-icon btn-danger underline text-sm text-gray-600 hover:text-gray-900">

                                {{ __('Log Out') }} |
                                <u>
                                    @isset(Auth::user()->name)
                                    {{ Auth::user()->name }}
                                    @endisset
                                </u>

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

    <script>
        ClassicEditor
            .create(document.querySelector('.ckeeditor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->

    {{-- Script --}}
    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
</body>

</html>
