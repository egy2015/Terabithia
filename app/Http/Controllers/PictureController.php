<?php
 
namespace App\Http\Controllers;
 
use App\Models\Catalog;
use App\Models\CatalogPicture;
use Illuminate\Http\Request;
use App\Http\Requests\PictureRequest;
 
class PictureController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth'); 
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $catalogs = CatalogPicture::with('catalog')->get();
 
        return view('pictures.index')->with([
             'catalogs' => $catalogs
        ])->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catalogs = Catalog::all();
 
        return view('pictures.create')->with([
            'catalogs' => $catalogs 
        ]);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PictureRequest $request)
    {
        
        $catalogs = $request->all();
        $catalogs['filename'] = $request->file('filename')->store('assets/product', 'public');
 
        CatalogPicture::create($catalogs);
        return redirect('picture')->with('success', 'Data Berhasil Ditambahkan');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CatalogPicture::findOrFail($id);
        $item->delete();
 
        return redirect()->route('picture.index')->with('success', 'Data berhasil dimusnahkan!');
    }
}
 