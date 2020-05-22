<?php

namespace App\Http\Controllers\Api;
//libraries
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Fractal;

//models
use App\artikel;
use App\foto_blog;

//transformer fractal API
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
        $artikel = artikel::with(['Kategori', 'FotoBlog', 'Commentm.Commentd'])->find($id);
        
        $manager = new Fractal\Manager();
        if(isset($_GET['include'])){
            $manager->parseIncludes($_GET['include']);
        }

        $artikel = fractal($artikel, new ArtikelTransformer())->toArray();   
        return response()->json($artikel);
    }

    //pencarian berdasarkan tanggal
    public function getTanggal($param)
    {
        $tanggal = artikel::where('tanggal', $param)->get();
        // $tanggal = fractal($tanggal, new ArtikelTransformer())->toArray();

        return response()->json($taggal);
    }


}
