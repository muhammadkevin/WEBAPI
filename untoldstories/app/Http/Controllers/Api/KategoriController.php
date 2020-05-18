<?php
namespace App\Http\Controllers\Api;

//libraries
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\kategori;

//transformer
use App\Transformer\KategoriTransformer;



class KategoriController extends Controller
{
    public function allkategori(){
        $kategori = kategori::all();

        $kategori = fractal($kategori, new KategoriTransformer())->toArray();
        return response()->json($kategori);
    }


    
}
