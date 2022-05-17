<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DanhMucRequest;
use Illuminate\Http\Request;
use Auth;
class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUser = Auth::guard('admin')->user();
        return view('admin.admin_DanhMuc.Category',['user' => $adminUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = DanhMuc::create([
            'namecategory' => $request->namecategory,
        ]);
        if($data) {
            toastr()->success('Thêm danh mục thành công');
            return redirect()->route('category.admin');
        } else {
            toastr()->success('Thêm danh mục thất bại');
            return redirect()->route('category.admin');
        }
    }

    public function createPostAjax(Request $request)
    {
        

        $validate = $request->validate([
            'namecategory' => 'required'
        ],
        [
            'namecategory.required' => 'Danh mục không bỏ trống',

        ]);

        $data = DanhMuc::create($validate);

        return response()->json(['trangThai'=>true]);

    }

    public function showData()
    {
        $data = DanhMuc::all();

        return response()->json(['data' => $data]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DanhMuc  $danhMuc
     * @return \Illuminate\Http\Response
     */
    public function show(DanhMuc $danhMuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DanhMuc  $danhMuc
     * @return \Illuminate\Http\Response
     */
    public function edit(DanhMuc $danhMuc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DanhMuc  $danhMuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'namecategory' => 'required'
        ],
        [
            'namecategory.required' => 'Danh mục không bỏ trống',

        ]);

        $data = DanhMuc::find($request->id)->update($request->all());
        return response()->json(['data' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DanhMuc  $danhMuc
     * @return \Illuminate\Http\Response
     */
    public function editAjax($id)
    {
        $data = DanhMuc::find($id);
        if($data) {
            return response()->json(['status' => true , 'data' => $data]);
        } else {
            return response()->json(['status' => false]);
        }
    }
    public function destroyAjax($id)
    {
        $delete = DanhMuc::find($id);
        if($delete) {
            $delete->delete();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }

        return redirect()->route('category.admin');
    }
}
