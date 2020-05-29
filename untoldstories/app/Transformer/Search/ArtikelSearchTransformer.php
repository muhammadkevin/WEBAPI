<?php

namespace App\Transformer\Search;

use League\Fractal\TransformerAbstract;
use App\artikel;

class ArtikelSearchTransformer extends TransformerAbstract
{
	public function transform(artikel $artikel){
		return [
			'konteks' => 'artikel',
			'id' => $artikel->id,
			'judul' => $artikel->judul
		];
	} 
}