<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Hash;
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
        return view('adminMaster.adminMaster-login.admin-master-login');

    }
    public function postLoginAdmin(Request  $request)
    {
        $createAdminLogin = $request->only('username','password');
        if (Auth::guard('admin')->attempt($createAdminLogin) && Auth::guard('admin')->user()->role >=1) {
            return redirect()->route('home.admin');
        } else {
            toastr()->error('Bạn không phải Admin or sai mật khẩu!');
            return redirect()->route('admin.login');
        }

    }

    public function homeAdmin()
    {
        return view('adminMaster.admin-Dashboard.Dashboard');
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

    public function viewMoremembers()
    {

        $dataListMember = Admin::where('role','<=' ,2)->orderBy('id','desc')->get();

        return view('adminMaster.adminMaster-addUser.adminMaster-addUser',[

            'dataListMember' => $dataListMember,

        ]);
    }

    public function postMoremember(Request $request)
    {

        $validate = $request->validate([
            'email'         => 'required|email|unique:admins',
            'username'      => 'required|unique:admins',
            'password'      => 'required|max:20|min:6',
            're_password'   => 'required|same:password',
            'role'          => 'required',
        ],
        [
            'email.unique'          => 'Email này đã tồn tại',
            'email.required'        => 'Email không để trống',
            'email.email'           => 'Phải nhập đúng định dạng Email',
            'username.required'     => 'User name không để trống',
            'username.unique'       => 'User name này đã tồn tại',
            'password.required'     => 'Password không để trống',
            'password.min'          => 'Password phải từ 6 kí tự trở lên',
            're_password.required'  => 'Re-Password không để trống',
            're_password.same'      => 'Re-Password không trùng khớp với Password',
            'role.required'         => 'Role không để trống',
        ]);

        $email       = $request->email;
        $username    = $request->username;
        $password    = $request->password;
        $re_password = $request->re_password;
        $role        = $request->role;

        $createRigister = Admin::create([
            'email'         => $email,
            'username'      => $username,
            'password'      => Hash::make($password),
            're_password'   => Hash::make($re_password),
            'role'          => $role,
        ]);

        if($createRigister) {
            toastr()->success('Register Member thành công!');
            return redirect()->route('home.admin.Moremembers');
        }
    }

    public function deleteMoremembers($id)
    {
        $deleteMember = Admin::where('id','=', $id)->delete();

        if($deleteMember) {
            toastr()->success('Xóa Member thành công');
            return redirect()->route('home.admin.Moremembers');
        } else {
            toastr()->error('Xóa thất bại');
            return redirect()->back();
        }
    }

    // public function editMoremembers($id)
    // {

    //     $dataAdmin = Admin::find($id);

    //     if($dataAdmin) {
    //         return response()->json([

    //             'status' => true ,
    //             'data' => $dataAdmin

    //         ]);

    //     } else {
    //         return response()->json([

    //             'status' => false

    //         ]);
    //     }
    // }

    public function editDetailMoremembers($id) {

        $detailMember = Admin::find($id);

        return view('adminMaster.adminMaster-addUser.adminMaster-detail',[

            'detailMember' => $detailMember,

        ]);

    }

    public function updateMoremembers (Request $request)
    {

        $email       = $request->email;
        $username    = $request->username;
        $role        = $request->role;

        $dataUpdateMember = Admin::where('id','=', $request->id)->update([

            'email'         => $email,
            'username'      => $username,
            'role'          => $role,

        ]);

        if($dataUpdateMember) {
            toastr()->success('Edit thành công');
            return redirect()->route('home.admin.Moremembers');
        }

    }
}
