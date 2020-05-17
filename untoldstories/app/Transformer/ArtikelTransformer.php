<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\artikel;
use App\Transformer\FotoBlogTransformer;


class ArtikelTransformer extends TransformerAbstract 
{
    protected $defaultIncludes = [
        'FotoBlog'
    ];

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

    public function includeFotoBlog(artikel $artikel)
    {
        $Ftb = $artikel->FotoBlog->first();

        return $this->item($Ftb, new FotoBlogTransformer);
    }


    
}