<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\commentm;
use App\Transformer\CommentdTransformer;



class CommentmTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'Commentd'
    ];

    public function transform(commentm $commentm)
    {   
        return [
            'id' => $commentm->id,
            'artikel_id' => $commentm->artikel_id
        ];
    }

    public function includeCommentd(commentm $commentm)
    {
        $commentd = $commentm->Commentd;
        return $this->collection($commentd, new CommentdTransformer);
    }



} 