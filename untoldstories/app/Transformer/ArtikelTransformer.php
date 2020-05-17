<?php
namespace App\Transformer;

use App\artikel;
use League\Fractal\TransformerAbstract;

class ArtikelTransformer extends TransformerAbstract 
{
    public function transform(artikel $artikel)
    {
        return [
            'id' => $artikel->id,
            'kategori_id' => $artikel->kategori_id,
            'isi' => $artikel->isi,
            'tanggal' => $artikel->tanggal 
        ];
    }




    
}