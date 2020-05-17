<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tag;
use App\artikel_tag;

class TagController extends Controller
{
    public function tampil()
    {
    	$tag = tag::all();
    	return view('admin/tag', ['tag'=>$tag]);
    } 

    public function tambah(Request $request)
    {
    	tag::create([
    		'nama_tag' => $request->nama_tag
    	]);

    	return redirect('admin/tag');
    }

    public function editproc(Request $request)
    {
    	$tag = tag::find($request->id_tag);
    	$tag->nama_tag = $request->nama_tag;
    	$tag->save();

    	return redirect()->back();
    }

    public function deleteproc($id)
    {
    	$tag = tag::find($id);
    	$tag->delete();

    	return redirect('/admin/tag');
    }



    //ke artikel
    public function tambahtag(Request $request)
    {
        artikel_tag::create([
            'artikel_id' => $request->artikel_id,
            'tag_id' => $request->tag_id
        ]);

        return redirect('admin/kelola');
    }
    public function hapustag($id)
    {
        $artikel_tag = artikel_tag::find($id);
        $artikel_tag->delete();
        return redirect('admin/kelola');
    }



}
