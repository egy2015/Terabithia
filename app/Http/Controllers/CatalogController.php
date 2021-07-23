<?php


namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Http\Requests\CatalogRequest;
use Illuminate\Support\Str;
use App\Models\CatalogPicture;

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

    public function store(CatalogRequest $request)
    {
        $request['slug'] = Str::slug($request->name);
        $request = $request->all(); 
        Catalog::create($request);

        return redirect()->route('catalogs.index')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(Catalog $post)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('catalogs.show',$post->id) }}
        ///return view('catalogs.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Catalog::findOrFail($id);
        return view('catalogs.edit', compact('post'));
    }

    public function update(CatalogRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
 
        $item = Catalog::findOrFail($id);  
        $item->update($data);

        return redirect()->route('catalogs.index')
            ->with('success', 'Mantap dah bisa update');
    }

    public function destroy($id)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $post = Catalog::findOrFail($id);
        $post->delete();

        CatalogPicture::where('id', $id)->delete();

        return redirect()->route('catalogs.index')
            ->with('success', 'Data berhasil dimusnahkan!');
    }

    public function pictures(Request $request, $id)
    {
        $catalogs = Catalog::findorFail($id);
        $items = CatalogPicture::with('catalog')
            ->where('catalogs_id', $id)
            ->get();

        return view('catalogs.picture', compact('catalogs','items'));
    }
}
