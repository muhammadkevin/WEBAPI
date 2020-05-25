<?php
namespace App\Transformer;

//libraries
use League\Fractal\TransformerAbstract;
use App\Transformer\ArtikelTransformer;

//models
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
            'kategori' => $kategori->kategori,
            'deskripsi' => $kategori->deskripsi
        ];
    }

    public function includeArtikel(kategori $kategori)
    {
        $artikel = $kategori->Artikel;

        return $this->collection($artikel, new ArtikelTransformer);
    }


}