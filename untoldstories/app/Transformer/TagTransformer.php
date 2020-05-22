<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\Transformer\ArtikelTransformer;
use App\tag;



class TagTransformer extends TransformerAbstract
{
    // protected $availableIncludes = [
    //     'Artikel'
    // ];

    public function transform(tag $tag)
    {
        return[
            'id' => $tag->id,
            'tag' => $tag->nama_tag,
            'Artikel' => $tag->Artikel
        ];
    }

    // public function includeArtikel(tag $tag)
    // {
    //     $artikel = $tag->Artikel;

    //     return $this->collection($artikel, new ArtikelTransformer);
    // }

}