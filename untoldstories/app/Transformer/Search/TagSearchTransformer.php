<?php

namespace App\Transformer\Search;

use League\Fractal\TransformerAbstract;

use App\tag;

class TagSearchTransformer extends TransformerAbstract
{
	public function transform(tag $tag){
		return[
			'konteks' => 'tag',
			'id' => $tag->id,
			'judul' => $tag->nama_tag
		];
	}
} 