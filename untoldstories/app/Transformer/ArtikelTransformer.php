<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\artikel;
use App\Transformer\FotoBlogTransformer;


class ArtikelTransformer extends TransformerAbstract 
{
    public function transform(artikel $artikel)
    {
        return [
            'id' => $artikel->id,
            'kategori' => $artikel->Kategori->kategori,
            'judul' => $artikel->judul,
            'isi' => $artikel->isi,
            'tanggal' => $artikel->tanggal 
        ];
    }




    
}