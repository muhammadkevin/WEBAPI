<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\commentm;
use App\commentd;

class CommentController extends Controller{

	public function commentpost(Request $request){
		 $this->validate($request, [
            'artikel_id' => 'required',
            'id' => 'nullable',
            'nama' => 'required',
            'email' => 'required|email',
            'isi' => 'required'
        ]);

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
                'nama' => $request->nama,
                'email' => $request->email,
                'isi' => $request->isi
            ]);
        }

        return response()->json(true, 201);
	}

}