@extends('layouts.template')

@section('content')
    <div class="card mt-5 mb-5">
        <div class="card-header bg-primary text-white col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tambah Foto Pada Catalog</h2>
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
        <form action="{{ route('picture.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
           

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name" class="form-control-label">Nama Barang</label>
                        <select name="catalogs_id"
                                class="form-control @error('catalogs_id') is-invalid @enderror">
                            @foreach ($catalogs as $catalog)
                              <option value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                            @endforeach
                        </select>
                        @error('catalogs_id') <div class="text-muted">{{ $message }}</div> @enderror
                      </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Upload Foto Produk:</strong>
                        <input type="file" name="filename" value="" accept="image/*" class="form-control pt-2" style="height: 50px">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jadikan Foto Preview?</strong>
                        <br>
                        <label>
                            <input type="radio" name="is_default" value="1" class=""> Ya
                        </label>
                        &nbsp;
                        <label>
                            <input type="radio" name="is_default" value="0" checked class=""> Tidak
                        </label>
                    </div>
                </div>




                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
