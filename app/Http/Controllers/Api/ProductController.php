<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Product;
use App\Models\TastedProduct;
use App\Models\OriginProduct;
use App\Models\SpeciesProduct;
use App\Models\ProcessingProduct;
use App\Models\RoastLevelProduct;

class ProductController extends Controller
{
    public function index()
    {
        $limit  = 12;

        $products = Product::with(['origin','processing','roastLevel','species','tasted']);
        if(request()->get('limit') && !empty(request()->get('limit')))
        {
            $limit = request()->get('limit');
        }


        if(request()->get('sort_by_name') && !empty(request()->get('sort_by_name')))
        {
            $products = $products->orderBy("title", "asc");
        }

        if(request()->get('origin') && !empty(request()->get('origin')))
        {
            $originIds = request()->get('origin');
            if (is_string($originIds)) {
                $originIds = explode(',', $originIds);
            }
            $products = $products->whereIn("origin_id", $originIds);
        }

        if(request()->get('species') && !empty(request()->get('species')))
        {
            $speciesIds = request()->get('species');
            if (is_string($speciesIds)) {
                $speciesIds = explode(',', $speciesIds);
            }
            $products = $products->whereIn("species_id", $speciesIds);
        }

        if(request()->get('roast_leve') && !empty(request()->get('roast_leve')))
        {
            $roastLevelIds = request()->get('roast_level_id');
            if (is_string($roastLevelIds)) {
                $roastLevelIds = explode(',', $roastLevelIds);
            }
            $products = $products->whereIn("roast_level_id", $roastLevelIds);
        }

        if(request()->get('tasted') && !empty(request()->get('tasted')))
        {
            $tastedIds = request()->get('tasted');
            if (is_string($tastedIds)) {
                $tastedIds = explode(',', $tastedIds);
            }
            $products = $products->whereIn("tasted_id", $tastedIds);
        }

        if(request()->get('processing') && !empty(request()->get('processing')))
        {
            $processingIds = request()->get('processing');
            if (is_string($processingIds)) {
                $processingIds = explode(',', $processingIds);
            }
            $products = $products->whereIn("processing_id", $processingIds);
        }

        if(request()->get('min_price') && !empty(request()->get('min_price')) && request()->get('max_price') && !empty(request()->get('max_price')))
        {
            $products = $products->whereBetween('price', [request()->get('min_price'), request()->get('max_price')]);
        }


        $products = $products->paginate($limit);

        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with(['origin','processing','roastLevel','species','tasted'])->find($id);
        if ($product) {
            return response()->json($product);
        }
        return response()->json(['error' => 'Product not found'], 404);
    }

    public function indexOrigin()
    {
        $products = OriginProduct::all();
        return response()->json($products);
    }

    public function indexTasted()
    {
        $products = TastedProduct::all();
        return response()->json($products);
    }

    public function indexSpecies()
    {
        $products = SpeciesProduct::all();
        return response()->json($products);
    }

    public function indexProcessing()
    {
        $products = ProcessingProduct::all();
        return response()->json($products);
    }

    public function indexRoastLevel()
    {
        $products = RoastLevelProduct::all();
        return response()->json($products);
    }
}
