@extends('layouts.template')

@section('content')
    <div class="card row mt-5 mb-5">
        <div class="card-header bg-primary text-white col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Index Catalog</h2>
            </div>
            {{-- <div class="float-right">
                <a class="btn btn-success" href="{{ route('catalogs.create') }}"> Create Post</a>
            </div> --}}
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
                <th>ID</th>
                <th>Nama</th>
                <th>Jenis Produk</th>
                <th>Harga</th>
                <th>Unit</th>
                <th width="280px" class="text-center">Action</th>
            </tr>
            @forelse ($catalogs as $post)
                <tr>
                    <td class="text-center">{{ ++$i }}</td>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->type }}</td>
                    <td>Rp.{{ $post->price }}</td>
                    <td>{{ $post->quantity }} pcs</td>
                    <td class="text-center">
                        <form action="{{ route('catalogs.destroy', $post->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ url('catalogs/'. $post->id.'/picture') }}"><i class="fa fa-eye"></i></a>

                            <a class="btn btn-primary btn-sm" href="{{ route('catalogs.edit', $post->id) }}"><i class="fa fa-pencil"></i></a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="7" class="text-center bg-secondary p-5">
                    <strong>Data tidak tersedia</strong>
                  </td>
                </tr>
            @endforelse
        </table>
    </div>
    {!! $catalogs->links() !!}

@endsection
