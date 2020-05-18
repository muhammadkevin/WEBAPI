<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\Transformer\ArtikelTransformer;
use App\kategori;

class KategoriTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'Artikel'
    ];

    public function transform(kategori $kategori)
    {
        return[
            'id' => $kategori->id,
            'kategori' => $kategori->kategori
        ];
    }

    public function includeArtikel(kategori $kategori)
    {
        $artikel = $kategori->Artikel;

        return $this->collection($artikel, new ArtikelTransformer);
    }


}