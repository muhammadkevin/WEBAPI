<?php

namespace App\Htpp\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transformer\CommentdTransformer;
use Illuminate\Http\Request;
use Illuminate\Suport\Facades\DB;


class SearchController extends Controller
{
    public function search(Request $request){
        $cari = $request->cari;
        $artikel = array();

        //berdasarkan judul perkata
        $art = DB::table('artikel')
                    ->join('kategori', 'artikel.kategori_id','=','kategori.id')
                    ->join('foto_blog', 'artikel.id','=','foto_blog.artikel_id')
                    ->where('judul','like',"%".$cari."%")
                    ->orWhere('isi','like',"%".$cari."%")
                    ->orWhere('tanggal','like',"%".$cari."%")->get();
                     
        if(!empty($art[0]->id)){
            $artikel[] = fractal($art, new SearchTransformer());
        }else{
            $kategori = DB::table('kategori')
                ->join('artikel', 'kategori.id', '=', 'artikel.kategori_id')
                ->join('foto_blog', 'artikel.id', '=', 'foto_blog.artikel_id')
                ->where('kategori.kategori','like',"%".$cari."%")->get();
        }
        
        if(!empty($kategori[0]->id)){
            $artikel[] = fractal($kategori, new SearchTransformer());
        }else{
            $tag = DB::table('tag')
                ->join('artikel_tag', 'tag.id', '=', 'artikel_tag.tag_id')
                ->join('artikel', 'artikel.id', '=', 'artikel_tag.artikel_id')
                ->join('kategori', 'artikel.kategori_id','=','kategori.id')
                ->join('foto_blog', 'artikel.id', '=', 'foto_blog.artikel_id')
                ->where('nama_tag','like','%'.$cari.'%')->get();
        }

        if(!empty($tag[0]->id)){
            $artikel[] = fractal($tag, new SearchTransformer());
        }

        if(empty($artikel)){
            $artikel = "Pencarian Tidak Ditemukan";
        }

        return reponse()->json($artikel);
    }



}