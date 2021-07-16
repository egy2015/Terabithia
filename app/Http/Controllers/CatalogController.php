<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $catalogs = Catalog::latest()->paginate(5);

        /// mengirimkan variabel $catalogs ke halaman views catalogs/index.blade.php
        /// include dengan number index
        return view('catalogs.index', compact('catalogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        /// menampilkan halaman create
        return view('catalogs.create');
    }

    public function store(Request $request, $data)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);



        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        Post::create($request->all());

        /// redirect jika sukses menyimpan data
        return redirect()->route('catalogs.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(Catalog $post)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('catalogs.show',$post->id) }}
        return view('catalogs.show', compact('post'));
    }

    public function edit(Catalog $post)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('catalogs.edit',$post->id) }}
        return view('catalogs.edit', compact('post'));
    }

    public function update(Request $request, Catalog $post)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $post->update($request->all());

        /// setelah berhasil mengubah data
        return redirect()->route('catalogs.index')
            ->with('success', 'Mantap dah bisa update');
    }

    public function destroy(Catalog $post)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $post->delete();

        return redirect()->route('catalogs.index')
            ->with('success', 'Data berhasil dimusnahkan!');
    }
}
