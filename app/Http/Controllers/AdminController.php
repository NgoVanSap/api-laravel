<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin_login_register.admin-login');

    }
    public function postLoginAdmin(Request  $request) {

        $createAdminLogin = $request->only('name','password');
        if (Auth::guard('admin')->attempt($createAdminLogin) && Auth::guard('admin')->user()->role >=1) {
            toastr()->success('Đăng nhập thành công');
            return redirect()->route('home.admin');
        } else {
            toastr()->error('Bạn không phải Admin or sai mật khẩu!');
            return redirect()->route('admin.login');
        }

    }

    public function homeAdmin()
    {
        $adminUser = Auth::guard('admin')->user();
        // $data = array_reverse(DanhMuc::all()->all());
        return view('admin.master',['user' => $adminUser ]);
    }

    public function postLogoutAdmin(Request $request) {
        Auth::guard('admin')->logout();
        toastr()->success('Đăng xuất thành công');
        return redirect()->route('admin.login');

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
