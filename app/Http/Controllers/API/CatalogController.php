<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
        {
            $product = catalog::with('galleries')->find($id);

            if($catalog)
                return ResponseFormatter::success($catalog,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }


        if($slug)
        {
            $catalog = catalog::with('galleries')
                ->where('slug', $slug)
                ->first();

            if($catalog)
                return ResponseFormatter::success($catalog,'Data produk berhasil diambil');
            else
                return ResponseFormatter::error(null,'Data produk tidak ada', 404);
        }

        $catalog = catalog::with('galleries');

        if($name)
            $catalog->where('name', 'like', '%' . $name .'%');

        if($type)
            $catalog->where('type', 'like', '%' . $type .'%');

        if($price_from)
            $catalog->where('price', '>=', $price_from);

        if($price_to)
            $catalog->where('price', '<=', $price_to);

        return ResponseFormatter::success(
            $catalog->paginate($limit),
            'Data list produk berhasil diambil'
        );



    }
}
