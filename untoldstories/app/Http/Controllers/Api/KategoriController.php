<?php
namespace App\Http\Controllers\Api;

//libraries
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Fractal;

//models
use App\kategori;

//transformer
use App\Transformer\KategoriTransformer;



class KategoriController extends Controller
{
    public function allkategori()
    {
        $kategori = kategori::all();
        $kategori = fractal($kategori, new KategoriTransformer())->toArray();
        return response()->json($kategori);
    }

    public function getkategori($id)
    {
        $kategori = kategori::with('Artikel')->where('id', $id)->get();

        //apakah meminta artikelnya
        $manager = new Fractal\Manager();
        
        if (isset($_GET['include'])) {
            $manager->parseIncludes($_GET['include']);
        }

        $kategori = fractal($kategori, new KategoriTransformer())->toArray();
        
        return response()->json($kategori);

    }

}
