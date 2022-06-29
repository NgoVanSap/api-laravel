<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Models\DanhMuc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Paginator;
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
        // $dataProduct = DB::table('products')
        // // ->where('name','Cơm Chiên Có Hành')
        // // ->where('id','>',32)//đều kiện
        // // ->get();
        // // ->pluck('name','slug_name');//lấy ra tất cả các trường mà ta muốn chọn
        // // ->value('created_at');//lấy ra giá trị đầu tiền của thuôc tính
        // // ->count();//đếm số lượng có trong table
        // // ->avg('price');
        // // ->orderBy('id','desc')//sắp xếp thứ tự từ dưới lên
        // // ->leftJoin('products','danh_mucs.id','=','products.id')
        // // ->select('danh_mucs.*','products.price','products.infomation','products.name')
        // ->orderBy('id','desc')
        // ->get();//
        // $adminUser = Auth::guard('admin')->user();
        // $data = DanhMuc::all();
        // return view('admin.admin_DanhMuc.Product',['user' => $adminUser , 'data' => $data,'dataProdutc' => $dataProduct]);

        $databestsale = Product::where('price_sale','>',0)->get();

        dd($databestsale);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductRequest $request)
    {

        $newImageName = time() . '.' . $request->image->extension();
        $test = $request->image->move(public_path('imgProduct'), $newImageName);
        $random = Str::random(4);
        $data = Product::create([
            'name'              => $request->name,
            'slug_name'         => Str::slug($request->name). '-' .$random,
            'price'             => $request->price,
            'price_sale'        => $request->price_sale,
            'infomation'        => $request->infomation,
            'image'             => $newImageName,
            'product_type_id'   => $request->product_type_id,
            'is_open'           => $request->is_open,
        ]);
        if($data) {
            toastr()->success('Thêm sản phẩm thành công');
            return redirect()->route('product.admin');
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
        $dataProduct = DB::table('products')
        ->orderBy('id','desc')
        ->paginate(5);
        $data = DanhMuc::all();
        return view('adminMaster.admin-product.Product', [

            'data'          => $data,
            'dataProduct'   => $dataProduct

        ]);


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
        $dataEdit = Product::find($id)->get();
        $data = DanhMuc::all();
        $dataProduct = DB::table('products')
        ->orderBy('id','desc')
        ->get();
        return view('adminMaster.admin-product.Product', [

            'data'          => $data,
            'dataEdit'      => $dataEdit,
            'dataProduct'   => $dataProduct

        ]);

    }

    public function detail($id) {
        $datalist = Product::find($id);
        $data = DanhMuc::all();
        return view('adminMaster.admin-product.index',[

            'data'      => $data,
            'datalist'  => $datalist

        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validate = $request->validate([
            'name'                          => 'required',
            'price'                         => 'required|numeric',
            'price_sale'                    => 'required|numeric',
            'infomation'                    => 'required',
            'image'                         => 'required|image',
            'product_type_id'               => 'required',
            'is_open'                       => 'required'
        ],
        [
            'name.required'                 => 'Tên sản phẩm không để trống',
            'price.required'                => 'Giá tiền không để trống',
            'price.numeric'                 => 'Giá tiền phải nhập bằng số',
            'price_sale.required'           => 'Giá khuyến mãi không để trống',
            'price_sale.numeric'            => 'Giá khuyến mãi phải nhập bằng số',
            'image.required'                => 'Ảnh không để trống',
            'image.image'                   => 'Phải chọn ảnh',
            'product_type_id.required'      => 'Hãy chọn danh mục',
            'is_open.required'              => 'Hãy chọn tình trạng',
            'infomation.required'           =>' Thông tin không để trống'

        ]);

        $newImageName = time() . '.' . $request->image->extension();
        $test = $request->image->move(public_path('imgProduct'), $newImageName);
        $random = Str::random(4);
        $data = Product::where('id','=',$request->id)->update([

            'name'              => $request->name,
            'slug_name'         => Str::slug($request->name). '-' .$random,
            'price'             => $request->price,
            'price_sale'        => $request->price_sale,
            'infomation'        => $request->infomation,
            'image'             => $newImageName,
            'product_type_id'   => $request->product_type_id,
            'is_open'           => $request->is_open,

        ]);


        if($data) {
            toastr()->success('Edit thành công');
            return redirect()->route('product.admin');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataDelete = Product::where('id','=', $id)->delete();

        if ($dataDelete) {
            toastr()->success('Xóa sản phẩm thành công');
            return redirect()->route('product.admin');
        } else {
            toastr()->error('Xóa thất bại!');
            return redirect()->route('product.admin');
        }
    }


    public function search(Request $request) {

        if(isset($_GET['keyWord'])) {
            $nameProduct = $_GET['keyWord'];
            $dataSearch = Product::where('name','LIKE','%'. $nameProduct.'%')
            ->orWhere('price','LIKE','%'. $nameProduct.'%')
            ->orderBy('id','DESC')
            ->paginate(2);
            $dataSearch->appends($request->all());


            $data = DanhMuc::all();

             return view('adminMaster.admin-product.productSearch', [

                 'data'         => $data,
                 'dataSearch'   => $dataSearch

            ]);
        } else {
            return redirect()->to('/');
        }

    }
}
