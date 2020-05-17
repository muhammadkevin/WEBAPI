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
            'isi' => $artikel->isi,
            'tanggal' => $artikel->tanggal 
        ];
    }




    
}