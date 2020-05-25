<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\commentd;


class CommentdTransformer extends TransformerAbstract
{
    public function transform(commentd $commentd)
    {
        return [
            'id' => $commentd->id,
            'commentm' => $commentd->commentm_id,
            'username' => $commentd->nama,
            'email' => $commentd->email,
            'isi' => $commentd->isi
        ];
    }


    
}