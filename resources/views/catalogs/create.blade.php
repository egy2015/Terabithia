@extends('layouts.template')

@section('content')
    <div class="card mt-5 mb-5">
        <div class="card-header bg-primary text-white col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tambah Produk Baru</h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <form action="{{ route('catalogs.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Produk:</strong>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                            placeholder="Nama Barang">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kategori Produk:</strong>
                        <input type="text" value="{{ old('type') }}" name="type" class="form-control"
                            placeholder="Kategori">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Harga:</strong>
                        <input type="number" value="{{ old('price') }}" name="price" class="form-control"
                            placeholder="Harga">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jumlah Barang:</strong>
                        <input type="number" value="{{ old('quantity') }}" name="quantity" class="form-control"
                            placeholder="Jumlau Unit">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Deskripsi Produk:</strong>
                        <textarea class="ckeeditor form-control" style="height:150px" value="{{ old('description') }}"
                            name="description" placeholder="Deskripsi barang"></textarea>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
