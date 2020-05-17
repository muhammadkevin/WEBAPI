<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\foto_blog;

class FotoBlogTransformer extends TransformerAbstract
{
    public function transform(foto_blog $foto_blog)
    {
        return[
            'img' => $foto_blog->foto,
            'url' => $foto_blog->url
        ];
    }
}