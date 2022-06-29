<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DanhMuc;
use App\Models\Attribute;
use Illuminate\Support\Facades\Paginator;


class CategoryController extends Controller
{
    public function index () {

        $dataProduct = Product::all();
        $dataDanhMuc = DanhMuc::all();
        $productDetailModal = Attribute::all();



        return view('website.categoryProduct.productAll' , [

            'dataProduct'        => $dataProduct,
            'dataDanhMuc'        => $dataDanhMuc,
            'productDetailModal' => $productDetailModal,

        ]);



    }

    public function categoryProduct($namecategory) {

        $dataDanhMucCategory = DanhMuc::where('namecategory', $namecategory)->first();
        $dataProductCategory = Product::where('product_type_id', $dataDanhMucCategory->id)->orderBy('id', 'desc')->get();
        $dataDanhMuc = DanhMuc::all();
        $productDetailModal = Attribute::all();

        return view('website.categoryProduct.productCategory' , [

            'dataDanhMucCategory'   => $dataDanhMucCategory,
            'dataProductCategory'   => $dataProductCategory,
            'dataDanhMuc'           => $dataDanhMuc,
            'productDetailModal' => $productDetailModal,



        ]);


    }

    public function categoryProductSale() {

        $dataProductSale = Product::where('price_sale' ,'>',0)->get();
        $dataDanhMuc = DanhMuc::all();

        return view('website.categoryProduct.productSale',[

            'dataProductSale' => $dataProductSale,
            'dataDanhMuc'           => $dataDanhMuc,

        ]);
    }
}
