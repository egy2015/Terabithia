<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class DataController extends Controller
{

    public function __construct()
    { }

    public function index()
    {
        $posts = Post::all();
        return response($posts);
    }
  

    public function show($id)
    {
        $posts = Post::where('id', $id)->get();
        return response($posts);
    }

    public function store(Request $request)
    {
        $posts = new Post();
        $posts->title = $request->input('title');
        $posts->price = $request->input('price');
        $posts->content = $request->input('content');
        $posts->save();

        return response('Data Berhasil Ditambahkan');
    }
  
  
    public function update(Request $request, $id)
    {
        $posts = Post::where('id', $id)->first();
        $posts->title = $request->input('title');
        $posts->price = $request->input('price');
        $posts->content = $request->input('content');
        $posts->save();

        return response('Data berhasil diubah');
    }
  
    public function destroy($id)
    {
        $posts = Post::where('id', $id)->first();
        $posts->delete();

        return response('Data' .$id. 'telah dihapus');
    }
}
