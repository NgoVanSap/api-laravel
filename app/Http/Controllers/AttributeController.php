<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Requests\AttributeRequest;


class AttributeController extends Controller
{
    public function index($id) {

        $idAttributes = Attribute::find($id);
        // $amountAttributes = Attribute::where('product_id', $id)->pluck('amount')->toArray();
        $attributes = Product::where('id',$id)->first();
        return view('adminMaster.admin-product.addAttribute' ,[

            'attributes'        => $attributes,
            'idAttributes'    => $idAttributes,
            // 'amountAttributes'  => $amountAttributes
        ]);


    }

    public function insertAttribute(Request $request,$id) {

        if($request->isMethod('POST')) {

            $data = $request->all();

            foreach ($data['size'] as $key => $val) {
                if(!empty($val)) {
                    $attribute = new Attribute;
                    $attribute->size = $val;
                    $attribute->product_id = $id;
                    $attribute->amount = $data['amount'][$key];
                    $attribute->save();

                    if($attribute) {
                        toastr()->success('Thêm Attribute thành công');
                    }
                }
            }
        }
        return redirect()->route('attribute.admin.add',$id);

    }

    public function deleteAttribute($id) {

        $deleteAttribute = Attribute::find($id)->delete();

       if($deleteAttribute) {
           toastr()->success('Xóa Attribute thành công');
           return redirect()->back();
       }
    }

    public function updateAttribute(Request $request,$id = null) {

        $data = $request->all();

        foreach ($data['attr'] as $key => $val) {

            $dataUpdate = Attribute::where('id', $data['attr'][$key])->update([

                'size'      => $data['size'][$key],
                'amount'    => $data['amount'][$key]

            ]);
            if($dataUpdate) {
                toastr()->success('Update Attribute thành công');
            }
        }
        return redirect()->back();

    }
}
