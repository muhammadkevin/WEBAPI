<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//model
use App\artikel;
use App\kategori;
use App\tag;


use App\Transformer\Search\ArtikelSearchTransformer;
use App\Transformer\Search\KategoriSearchTransformer;
use App\Transformer\Search\TagSearchTransformer;





class SearchController extends Controller
{
    public function search(Request $request){
        $cari = $request->cari;

        $art = artikel::with(['Kategori','FotoBlog'])->when(
                $request->cari, function ($query) use ($request){
                    $query->where('judul', 'like', "%" . $request->cari . "%") 
                    ->orWhere('isi', 'like', "%" . $request->cari . "%") 
                    ->orWhere('tanggal', 'like', "%" . $request->cari . "%");  
                })->get();
    
        $kategori = kategori::when(
            $request->cari, function ($query) use ($request){
                $query->where('kategori', 'like', "%" . $request->cari . "%"); 
            })->get();

        $tag = tag::when(
            $request->cari, function ($query) use ($request){
                $query->where('nama_tag', 'like', "%" . $request->cari . "%"); 
            })->get();


        if(!empty($art)){
            $artikel[] = fractal($art, new ArtikelSearchTransformer());
        }
        
        if(!empty($kategori)){
            $artikel[] = fractal($kategori, new KategoriSearchTransformer());
        }

        if(!empty($tag)){
            $artikel[] = fractal($tag, new TagSearchTransformer());
        }


        return response()->json($artikel);
    }



}