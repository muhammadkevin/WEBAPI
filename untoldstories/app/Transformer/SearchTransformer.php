<?php

namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class SearchTransformer extends TransformerAbstract
{
    public function transform($request){
        return[
            'id' => $request->id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal
        ];
    }
}