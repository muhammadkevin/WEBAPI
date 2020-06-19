<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\ClassTambahan\Layout;
use App\kategori;
use App\artikel;
use App\commentm;
use App\commentd;
use App\foto_blog;
use App\tag;


class ArtikelController extends Controller
{
    public function dashboard()
    {
    	$artikel = artikel::orderBy('id', 'DESC')->with(['Kategori'])->paginate(5);

        for ($i=0; $i < count($artikel); $i++) { 
            $art = explode('</p>', $artikel[$i]->isi);
            $isidepan[$i] = $art[0];
        }
        
        for($t=0; $t < count($artikel); $t++){
            $tgl[$t] = Layout::bulan($artikel[$t]->tanggal); 
        }

    	return view('dashboard', compact('artikel', 'isidepan', 'tgl'));
    }

    public function artikel($id)
    {
        $artikel = artikel::find($id);
        
        //membuat tanggal
        $tanggal = Layout::bulan($artikel->tanggal);
        
        //membuat kategori
        $kategori = kategori::find($artikel->kategori_id);

        //next prev
        $art = artikel::all();
            if ($id == count($art)) {
                $next = null; 
            }else{
                $next = artikel::find($id+1);
            }
            if ($id == 1) {
                $prev = null;
            }else{
                $prev = artikel::find($id-1);
            }

        //comment
        $comment = commentm::with('Commentd')->where('artikel_id', $id)->get();
        $cekcm = count($comment);
        if ($cekcm < 1 ) {
            $jumlahcomment = 0;   
        }else{
            for ($i=0; $i < count($comment); $i++) { 
                $cm[$i] = count(commentd::where('commentm_id', $comment[$i]->id)->get());
            }
            $jumlahcomment = array_sum($cm);
        }

    	return view('artikel', ['artikel' => $artikel, 'tanggal' => $tanggal, 'kategori' => $kategori, 'next' => $next, 'prev' => $prev, 'comment' => $comment, 'jumlahcomment' => $jumlahcomment]);
    }

    //tambahcomment
    public function commentpost(Request $request){
        if (empty($request->id)) {
            commentm::create(['artikel_id' => $request->artikel_id]);
            $findId = DB::table('commentm')->max('id');
            commentd::create([
                'commentm_id' => $findId,
                'isi' => $request->isi,
                'email' => $request->email,
                'nama' => $request->nama
            ]);    
        }else{
            commentd::create([
                'commentm_id' => $request->id,
                'isi' => $request->isi,
                'email' => $request->email,
                'nama' => $request->nama
            ]);
        }
        return redirect()->back();
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

    public function tag($id)
    {
        $tag = tag::with(['Artikel.Tag'])->where('id',$id)->get();
        
        for($t=0; $t < count($tag[0]->Artikel); $t++){
            $tgl[$t] = Layout::bulan($tag[0]->Artikel[$t]->tanggal); 
        }
        
        return view('tag', ['tag'=>$tag, 'tanggal' => $tgl]);
    }

    public function about()
    {
        return view('about'); 
    } 

    public function cari(Request $request)
    {
        $cari = $request->cari;
        
        $artikel = DB::table('artikel')
		->where('judul','like',"%".$cari."%")
		->paginate(5);
		
		if(!empty($artikel[0]->id)){
		    for($i=0; $i < count($artikel); $i++){
		        $FotoBlog[$i] = foto_blog::where('artikel_id', $artikel[$i]->id)->get();
		        $kategori[$i] = kategori::find($artikel[$i]->kategori_id);
		        $tanggal[$i] = Layout::bulan($artikel[$i]->tanggal);
		    }
		}else{
		    $tanggal = '';
		    $FotoBlog = '';
		    $kategori = '';
		}
        
        return view('cari', ['artikel' => $artikel, 'cari' => $cari, 'FotoBlog' => $FotoBlog, 'kategoris' => $kategori, 'tanggal'=>$tanggal]);
    }


}
