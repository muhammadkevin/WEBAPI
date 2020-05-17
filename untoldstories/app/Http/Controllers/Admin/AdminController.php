<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kategori;
use App\artikel;
use App\User;
use App\Foto_profils;
use App\tag;
use Auth;


class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function kelolaartikel()
	{
        $kategori = kategori::all();
        $artikel = artikel::orderBy('id','DESC')->with(['Kategori'])->paginate(5);
        
        $tag = tag::all();
		return view('admin/kelola', compact('artikel', 'kategori', 'tag'));
	}

    public function tambahartikel()
    {
        $kategori = kategori::all();
    	return view('admin/tambah',['kategori' => $kategori]);
    }

    public function profil()
    {
        $data = Auth::user();
        $foto = Foto_profils::where('users_id', Auth::user()->id)->get();
    	return view('admin/profil', compact('data','foto'));
    }

    public function editprofil(Request $request)
    {
        $userni = User::find($request->iduser);
        $userni->name = $request->nameuser;
        $userni->email = $request->emailuser;
        $userni->save();
        return redirect('admin/profil');
    }

    public function editfoto(Request $request)
    {
        $file = $request->file('foto');
        $nama = time() . "_" . $file->getClientOriginalName();
        $folder = 'img/users';
        $file->move($folder, $nama);

        Foto_profils::create([
            'users_id' => Auth::user()->id,
            'foto_profil' => $nama
        ]);

        return redirect('admin/profil');
    }




}
