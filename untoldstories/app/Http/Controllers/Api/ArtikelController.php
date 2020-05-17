<?php

namespace App\Http\Controllers\Api;
//libraries
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\artikel;

//transformer fractal APIS
use App\Transformer\ArtikelTransformer;



class ArtikelController extends Controller
{
    public function dashboard()
    {
        $artikel = artikel::find(1);
        $artikel = fractal()
                    ->collection($artikel)
                    ->transformWith(new ArtikelTransformer())
                    ->toArray();        
        return response()->json($artikel);
    }




}
