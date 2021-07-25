@extends('layouts.template')

@section('content')

    <div class="card row mt-5 mb-5">
        <div class="card-header bg-primary text-white col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Index Foto Produk Catalog</h2>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    @forelse ($items as $catalogs)

        <div class="card-body">
            <table class="table table-bordered">
                <tr class="bg-light text-dark">
                    <th class="text-center">ID Gambar</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Preview</th>
                    <th width="280px" class="text-center">Action</th>
                </tr>

                <tr>
                    <td class="text-center">{{ $catalogs->id }}</td>
                    <td>{{ $catalogs->catalog->name }}</td>
                    <td><img src="{{ url($catalogs->filename) }}" style="width: 100px; padding-top:20px"></td>
                    <td>
                        @if ($catalogs->is_default == true)
                            Gambar Utama
                        @else
                            Bukan Gambar Utama
                        @endif
                    </td>

                    <td class="text-center">
                        <form action="{{ route('picture.destroy', $catalogs->catalog->id) }}" method="post"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-lg">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center bg-secondary p-5">
                        <strong>Data tidak tersedia</strong>
                    </td>
                </tr>
    @endforelse
    </table>
    </div>

@endsection
