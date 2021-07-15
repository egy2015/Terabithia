@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Ceritanya Halaman Index Foto</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('photo.create') }}"> Create Post</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>ID</th>
            <th>Preview</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($photo as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->id }}</td>
            <td> <img src="{{ asset('img/album/' . $post->filename) }}" width="200px"></td>
            <td class="text-center">
                <form action="{{ route('photo.destroy',$post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $photo->links() !!}
 
@endsection