<?php
namespace App\Http\Controllers\Api;

//libraries
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Fractal;

//models
use App\tag;

//transformer
use App\Transformer\TagTransformer;




class TagController extends Controller
{
    public function alltag()
    {
        $tag = tag::all();
        $tag = fractal($tag, new TagTransformer())->toArray();
        return response()->json($tag);
    }

    public function tag($id){
        $tag = tag::with(['Artikel'])->where('id',$id)->get();
        
        $manager = new Fractal\Manager();
        if(isset($_GET['include'])){
            $manager->parseIncludes($_GET['include']);
        }

        $tag = fractal($tag, new TagTransformer())->toArray();
        return response()->json($tag);
    }



}