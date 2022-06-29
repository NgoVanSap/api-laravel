<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;



class WebsiteDetailProductController extends Controller
{
    public function index ($slug) {

        $detailProduct = Product::where('slug_name', $slug)->get();
        $productNew = Product::latest()->limit(4)->get();

        return view('website.detailProduct.index', [

            'detailProduct' => $detailProduct,
            'productNew' => $productNew,

        ]);

    }

    
}
