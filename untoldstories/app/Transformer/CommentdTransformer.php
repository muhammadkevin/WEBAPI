<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\commentd;


class CommentdTransformer extends TransformerAbstract
{
    public function transformer(commentd $commentd)
    {
        return [
            'id' => $commentd->id,
            'username' => $commentd->nama,
            'email' => $commentd->email,
            'isi' => $commentd->isi
        ];
    }


    
}