@extends('template')
 
@section('content')
    <table class="table table-bordered">
        <tr class="bg-success text-white">
            <th width="20px" class="text-center">#</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Produk</th>
            <th>Foto</th>
            <th>Preview</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        {{-- @foreach ($posts as $post) --}}
        <tr>
            {{-- <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->id }}</td>
            <td>{{ $post->name}}</td>
            <td>{{ $post->type}}</td>
            <td>Rp.{{ $post->price}}</td>
            <td>{{$post->quantity}} pcs</td>
            <td class="text-center">
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Foto</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td> --}}
        </tr>
        {{-- @endforeach --}}
    </table>
@endsection