<?php

namespace App\Http\Controllers\websiteAll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Attribute;
use App\Models\Product;
use App\Http\Requests\AddToCartRequest;
use DB;

class CartController extends Controller
{
    public function addToCartProduct(Request $request , $id) {

        $cart = Cart::where('product_id_cart',$request->product_id_cart)
        ->where('cart_id_attribute',$request->cart_id_attribute)
        ->first();
        $dataCartCount = Cart::count();
        if($cart) {

            $cart->quantity += $request->quantity;
            $cart->save();
            return response()->json(['status' => true]);

        } else {

            Cart::create([

                'product_id_cart'   => $request->product_id_cart,
                'quantity'          => $request->quantity,
                'price_cart_product'=> 0,
                'cart_id_attribute' => $request->cart_id_attribute,

            ]);

            return response()->json([

                'status' => true,
                'dataCartCount' => $dataCartCount,


            ]);
        }

    }

    public function viewCartProduct() {

        $dataViewCart = DB::table('carts')
        ->join('products','carts.product_id_cart','=','products.id')
        ->select('carts.*','products.name','products.image')
        ->get();
        return view('website.viewCart.viewCart' ,[

            'dataViewCart' => $dataViewCart

        ]);

    }

    public function loadCartProduct() {

        $data = DB::table('carts')
        ->join('products','carts.product_id_cart','=','products.id')
        ->select('carts.*','products.name','products.image','products.price','products.price_sale','products.id as product_id_cart','products.slug_name')
        ->orderBy('id','desc')
        ->get();

        $dataAttributesCarts = Attribute::all();

        return response()->json([

            'dataAttributesCarts' => $dataAttributesCarts,
            'data'      => $data

        ]);
    }

    public function updateCartProduct(Request $request ) {

        $cart = Cart::where('product_id_cart',$request->product_id_cart)
        ->where('cart_id_attribute',$request->cart_id_attribute)
        ->first();

        if($cart) {

            $cart->quantity = $request->quantity;
            $cart->save();
            return response()->json(['status' => true]);

        } else {

            Cart::update([

                'product_id_cart'   => $request->product_id_cart,
                'quantity'          => $request->menusQuantity,
                'price_cart_product'=> 0,
                'cart_id_attribute' => $request->cart_id_attribute,

            ]);

            return response()->json(['status' => true]);
        }


    }


    public function deleteCartProduct($id) {

        $data = Cart::find($id);
        $dataCartCount = Cart::count();
        if($data) {
            $data->delete();

            return response()->json([


                'status' => true,
                'dataCartCount' => $dataCartCount,

            ]);
        } else {

            return response()->json([

                'status' => false

            ]);

        }
    }

    
}
