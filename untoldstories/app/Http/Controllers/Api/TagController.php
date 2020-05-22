<?php
namespace App\Http\Controllers\Api;

//libraries
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\tag;

//transformer
use App\Transformer\TagTransformer;




class TagController extends Controller
{
    public function alltag()
    {
        $tag = tag::all();
        $tag = fractal($tag, new TagTransformer());
        return response()->json($tag);
    }





}