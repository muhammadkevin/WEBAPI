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
use App\Transformer\CommentdTransformer;



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
        $artikel = artikel::with(['Kategori', 'FotoBlog', 'Commentm.Commentd', 'Tag'])->find($id);
        
        $manager = new Fractal\Manager();
        if(isset($_GET['include'])){
            $manager->parseIncludes($_GET['include']);
        }

        if(empty($artikel->Commentm[0])){
            $artikel = fractal($artikel, new ArtikelTransformer())->toArray();   
            return response()->json($artikel);
        }else{
            // ambil comment teratas
            for ($i=0; $i < count($artikel->Commentm) ; $i++) { 
                $gabung[$i]['header'] = fractal($artikel->Commentm[$i]->Commentd[0], new CommentdTransformer()); 
                
                //ambil comment bawah
                for ($x=1; $x < count($artikel->Commentm[$i]->Commentd); $x++) { 
                    $gabung[$i]['isi'][] = fractal($artikel->Commentm[$i]->Commentd[$x], new CommentdTransformer());
                }
            }            

            $artikel = fractal($artikel, new ArtikelTransformer())->toArray();   
            return response()->json(['artikel'=>$artikel, 'komen'=>$gabung]);
        }
    }

    //pencarian berdasarkan tanggal
    public function gettanggal($param)
    {
        $tanggal = artikel::where('tanggal', $param)->get();
        $tanggal = fractal($tanggal, new ArtikelTransformer())->toArray();

        return response()->json($tanggal);
    }


}
