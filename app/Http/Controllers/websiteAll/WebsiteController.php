<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;



class WebsiteController extends Controller
{
    public function index(Request $request) {
        $productSale = Product::where('price_sale', '>', 0)->get();
        $Sale = Product::first()->get();

        $productDetailModal = Attribute::all();
        $productAll = Product::limit(4)->get();
        $Modal = Attribute::where('product_id',  $Sale)->get();

        return view('website.layoutWebsite.mainInterface', [

            'productSale' => $productSale,
            'productAll' => $productAll,
            'productDetailModal'           => $productDetailModal,
            'Modal'   => $Modal,
            'Sale'  => $Sale,

        ]);
    }
}
