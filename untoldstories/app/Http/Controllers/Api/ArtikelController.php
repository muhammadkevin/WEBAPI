<?php

namespace App\Http\Controllers\Api;
//libraries
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\artikel;
use App\foto_blog;

//transformer fractal APIS
use App\Transformer\ArtikelTransformer;
use App\Transformer\FotoBlogTransformer;



class ArtikelController extends Controller
{
    public function dashboard()
    {
        $artikel = artikel::orderBy('id', 'DESC')->with(['Kategori', 'FotoBlog'])->get();
        $artikel = fractal($artikel, new ArtikelTransformer())->toArray();        
        return response()->json($artikel);
    }

    public function artikel($id)
    {
        $ftb = foto_blog::with(['Kategori', 'FotoBlog'])->find($id);
        $ftb = fractal($ftb, new FotoBlogTransformer())->toArray();        
        return response()->json($ftb);
    }



}
