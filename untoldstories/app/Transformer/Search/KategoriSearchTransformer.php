<?php

namespace App\Transformer\Search;

use League\Fractal\TransformerAbstract;

use App\kategori;

class KategoriSearchTransformer extends TransformerAbstract
{
	public function transform(kategori $kategori){
		return[
			'konteks' => 'kategori',
			'id' => $kategori->id,
			'judul' => $kategori->kategori
		];
	}
} 