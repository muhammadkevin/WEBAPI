<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\kategori;

class KategoriTransformer extends TransformerAbstract
{
    public function transform(kategori $kategori)
    {
        return[
            'id' => $kategori->id,
            'kategori' => $kategori->kategori
        ];
    }
}