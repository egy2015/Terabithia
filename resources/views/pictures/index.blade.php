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



    <div class="card-body">
        <table class="table table-bordered">
            <tr class="bg-light text-dark">
                <th width="20px" class="text-center">#</th>
                <th class="text-center">ID Gambar</th>
                <th class="text-center">ID Catalog</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Preview</th>
                <th width="280px" class="text-center">Action</th>
            </tr>

            @forelse ($catalogs as $post)
            
                <tr>
                    <td class="text-center">{{ ++$i }}</td>
                    <td class="text-center">{{$post->id}}</td>
                    <td class="text-center">{{ $post->catalogs_id }}</td>
                    <td>{{ $post->catalog->name }}</td>
                    <td><img src="{{ url($post->filename) }}" style="width: 100px; padding-top:20px"></td>
                    <td>
                        @if ($post->is_default == true)
                            Gambar Utama
                        @else
                            Bukan Gambar Utama
                        @endif
                    </td>

                    <td class="text-center">
                        <form action="{{ route('picture.destroy', $post->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-lg">
                                Hapus
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
    {{-- {!! $catalogs->links() !!} --}}

@endsection
