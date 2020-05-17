<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kategori;

class KategoriController extends Controller
{
   
   public function __construct()
   {
   	$this->middleware('auth');
   }

    public function index()
    {
    	$kategori = kategori::orderBy('kategori','ASC')->get();
    	return view('admin/kategori', ['kategori' => $kategori]);
    }
    public function tambahproc(Request $request)
    {
    	kategori::create([
    		'kategori' => $request->name_list,
            'deskripsi' => $request->deskripsi
    		]);

    	return redirect('/admin/kategori'); 
    }
    public function editproc(Request $request)
    {
    	$kategori = kategori::find($request->id_list);
    	$kategori->kategori = $request->name_list;
        $kategori->deskripsi = $request->deskripsi;
    	$kategori->save();

    	return redirect()->back();
    }

    public function deleteproc($id)
    {
    	$kategori = kategori::find($id);
    	$kategori->delete();

    	return redirect('/admin/kategori');
    }



}
