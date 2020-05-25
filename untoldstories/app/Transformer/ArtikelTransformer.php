<?php
namespace App\Transformer;

use League\Fractal\TransformerAbstract;
use App\artikel;

//transformer fractal
use App\Transformer\FotoBlogTransformer;
use App\Transformer\CommentmTransformer;
use App\Transformer\TagTransformer;



class ArtikelTransformer extends TransformerAbstract 
{
    protected $defaultIncludes = [
        'FotoBlog'        
    ];

    protected $availableIncludes = [
        'Tag'
    ];

    public function transform(artikel $artikel)
    {
        return [
            'id' => $artikel->id,
            'id_kategori' => $artikel->kategori_id,
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

    public function includeTag(artikel $artikel)
    {
        $tag = $artikel->Tag;

        return $this->collection($tag, new TagTransformer);
    }
    



}