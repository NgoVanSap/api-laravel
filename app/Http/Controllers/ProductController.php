<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUser = Auth::guard('admin')->user();
        $data = DanhMuc::all();
        return view('admin.admin_DanhMuc.Product', ['user' => $adminUser , 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductRequest $request)
    {

        if(!$request->hasFile('image')) {
            //Nếu chưa có file upload thì báo lỗi
            return redirect()->route('product.admin');
         }
         else {
            //Xử lý file upload
            $image = $request->file('image');
            //Lưu trữ file tại public/images
            $imagePath = $image->move('imgProduct', $image->getClientOriginalName());
            $data = Product::create([
                'name'              => $request->name,
                'slug_name'         => Str::slug($request->name, "-"),
                'price'             => $request->price,
                'infomation'        => $request->infomation,
                'image'             => $imagePath,
                'product_type_id'   => $request->product_type_id,
                'is_open'           => $request->is_open,
            ]);


            if($data) {
                toastr()->success('Thêm danh mục thành công');
                return redirect()->route('product.admin');
            }
         }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
