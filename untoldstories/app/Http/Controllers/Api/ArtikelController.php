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
        $artikel = artikel::with(['Kategori', 'FotoBlog'])->find($id);
        $artikel = fractal($artikel, new ArtikelTransformer())->toArray();        
        return response()->json($artikel);
    }

    public function kategori($id)
    {
    	$kategoris = kategori::find($id);
        $artikel = artikel::where('kategori_id', $id)->paginate(6);
        
        for ($i=0; $i < count($artikel); $i++) { 
            $tgl[$i] = Layout::bulan($artikel[$i]->tanggal);
        }
        
    	return view('kategori', compact('kategoris', 'artikel', 'tgl'));
    }


}
