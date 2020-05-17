<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\artikel;
use App\artikel_tag;
use App\foto_blog;

use File;

class ArtikelController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function artikelpost(Request $request)
    {
    	$this->validate($request,[
    		'image' => 'required|image|mimes:jpg,png,bmp,jpeg'
    	]);

    	artikel::create([
    		'kategori_id' => $request->listing_id,
    		'judul' => $request->judul,
    		'isi' => $request->isi,
    		'tanggal' => date('d-m-Y')
    	]);

    	$find_id = DB::table('artikel')->max('id');

    	//kelola gambar
    	$files = $request->file('image');
    	$name_file = time() . "_" . $files->getClientOriginalName();
    	$folder = 'img/artikel';
    	$files->move($folder, $name_file);

    	foto_blog::create([
    		'artikel_id' => $find_id,
    		'foto' => $name_file
    	]);

    	return redirect('admin/kelola');
    }

    public function url(Reques $request)
    {
        $urlimg = $request->urlss;
        $idurl = $request->idurl;
        $url = foto_blog::where('artikel_id', $idurl)->update(['url' => $urlimg]);

        return redirect('admin/kelola');
    }

    public function edittitle(Request $request)
    {
        $artikel = artikel::find($request->id_artikel);
        $artikel->judul = $request->judulnew;
        $artikel->kategori_id = $request->list_id;
        $artikel->save();

        return redirect('admin/kelola');
    }

    public function editgambar(Request $request)
    {
        $this->validate($request,[
            'gambar' => 'required|image|mimes:jpg,png,bmp,jpeg,svg'
        ]);

        $gambar = foto_blog::where('artikel_id', $request->id_artikel)->get();
        foreach ($gambar as $g) {
            File::delete('img/artikel/' . $g->foto);
        }

        //kelola gambar
        $filez = $request->file('gambar');
        $name_file = time() . "_" . $filez->getClientOriginalName();
        $folder = 'img/artikel';
        $filez->move($folder, $name_file);

        $artikel = foto_blog::where('artikel_id', $request->id_artikel)->update(['foto' => $name_file]);

        return redirect()->back();
    }

    public function artikeledit($id)
    {
        $artikel = artikel::find($id);
        return view('admin/editartikel', ['artikel' => $artikel]);
    }

    public function editpost(Request $request)
    {
        $this->validate($request, [
            'isi' => 'required' 
        ]);

        $artikel = artikel::find($request->id_artikel);
        $artikel->isi = $request->isi;
        $artikel->save();

        return redirect()->back();
    }

    public function deleteproc($id)
    {
        $artikel = artikel::find($id);
        $artikel->delete();

        $asset = foto_blog::where('artikel_id', $id)->delete();

        return redirect('admin/kelola');
    }

    public function trash()
    {
        $artikel = artikel::onlyTrashed()->get();
        $asset = foto_blog::onlyTrashed()->get();

        return view('admin/trash', ['artikel' => $artikel, 'Asset' => $asset]);
    }

    public function restored($id)
    {
        $artikel = artikel::onlyTrashed()->where('id', $id);
        $artikel->restore();

        $asset = foto_blog::onlyTrashed()->where('artikel_id', $id);
        $asset->restore();

        return redirect('admin/kelola'); 
    }

    public function restoredall()
    {
        $artikel = artikel::onlyTrashed();
        $artikel->restore();

        $asset = foto_blog::onlyTrashed();
        $asset->restore();

        return redirect('admin/kelola');
    }

    public function hapuspermanen($id)
    {
        $artikel = artikel::onlyTrashed()->where('id', $id);
        $artikel->forceDelete();
    
        //hapus file gambar
        $assetImg = foto_blog::onlyTrashed()->where('artikel_id', $id)->first();
        File::delete('img/artikel/' . $assetImg->img);
        
        $asset = foto_blog::onlyTrashed()->where('artikel_id', $id);
        $asset->forceDelete();


        return redirect('admin/artikeltrash');
    }

    public function hapusall()
    {
        $artikel = artikel::onlyTrashed();
        $artikel->forceDelete();

        //hapus file gambar
        $assetImg = foto_blog::onlyTrashed()->get();
        foreach ($assetImg as $a) {
            File::delete('img/artikel/' . $a->img);
        }

        $asset = foto_blog::onlyTrashed();
        $asset->forceDelete();

        return redirect('admin/kelola');
    }



}
