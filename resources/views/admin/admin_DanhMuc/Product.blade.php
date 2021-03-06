@extends('admin.master')
@section('Content')
<div id="main" style="padding: 0 2rem !important;">
    <div class="page-heading">
        <section id="horizontal-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="row match-height">
                                    <div class="col-md-12 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Thêm mới sản phẩm</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal" method="POST" action="{{ route('product.admin.post') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label for="basicInput">Tên sản phẩm</label>
                                                                <span style="color:red">*</span>
                                                                <input type="text" class="form-control" name="name" id="name_Product" placeholder="Nhập tên sản phẩm">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="basicInput">Giá sản phẩm</label>
                                                                <span style="color:red">*</span>
                                                                <input type="text" class="form-control" name="price" id="price_Product" placeholder="Nhập giá">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="form-group with-title mb-3">
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" name ="infomation" rows="3"></textarea>
                                                                    <label>Giới thiệu sản phẩm</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="formFileSm" class="form-label">IMG sản phẩm</label>
                                                                <span style="color:red">*</span>
                                                                <input class="form-control form-control-sm" name="image" id="formFileSm" type="file">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-6 mb-4">
                                                                    <label for="basicInput">Chọn danh mục</label>
                                                                    <span style="color:red">*</span>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" name="product_type_id" id="basicSelect">
                                                                            <option value="">---Chọn Danh Mục---</option>
                                                                            @php
                                                                                  $render = array_reverse($data->all());
                                                                            @endphp
                                                                            @foreach ($render as $category)

                                                                            <option value="{{ $category->id }}">{{ $category->namecategory }}</option>

                                                                            @endforeach
                                                                        </select>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="basicInput">Tình trạng</label>
                                                                <span style="color:red">*</span>
                                                                <div class="col-md-6 mb-4">
                                                                    <label for="basicInput">Chọn danh mục</label>
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" name="is_open" id="basicSelect">
                                                                            <option value="0">Còn Hàng</option>
                                                                            <option value="1">Hết Hàng</option>
                                                                        </select>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                <button type="submit" id="submit_category" class="btn btn-outline-success">Thêm sản hẩm</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tất Sản Phẩm</h4>
                        </div>
                        <div class="card-content" style="height: 500px !important; overflow: auto;">
                            <!-- table head dark -->
                            <table class="table table-bordered" id="mytable">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;">#</th>
                                        <th scope="col" style="text-align: center;">Name Sản Phẩm</th>
                                        <th scope="col" style="text-align: center;">Price</th>
                                        <th scope="col" style="text-align: center;">Thông tin chi tiết</th>
                                        <th scope="col" style="text-align: center;">Loai danh mục</th>
                                        <th scope="col" style="text-align: center;">Hình ảnh</th>
                                        <th scope="col" style="text-align: center;">Tình Trạng</th>
                                        <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="mytable">
                                    @foreach ($dataProdutc as $value )
                                    <tr>
                                        <th scope="row" style="text-align: center;">{{ $value->id }}</th>
                                        <td style="width:216px;">{{ $value->name }}</td>
                                        <td>${{ number_format($value->price, 2) }}</td>
                                        <td style="width: 669px;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            line-height: 25px;
                                            -webkit-line-clamp: 6;
                                            height: 163px;
                                            display: -webkit-box;
                                            -webkit-box-orient: vertical;"
                                        >{{ $value->infomation }}</td>
                                        @foreach ( $render as $category )
                                            @php
                                                if ($value->product_type_id == $category->id) {
                                                    $varcategories = $category->namecategory;
                                                }
                                            @endphp
                                        @endforeach

                                        <td>{{ $varcategories }}</td>
                                        <td>
                                            <img src="{{ asset('/' . $value->image) }}" alt="" style="height: 150px;width: 100px;">
                                        </td>
                                        @php
                                            $var = $value->is_open ? 'Hết hàng' : 'Còn hàng';
                                        @endphp
                                        <td style="text-align:center;">
                                                @if ($value->is_open == 0)
                                                <button type="button" style="height: 19px;
                                                font-size: 11px;
                                                padding: 0 9px;" class="btn btn-success">{{ $var }}</button>
                                                @else
                                                <button type="button" style="height: 19px;
                                                font-size: 11px;
                                                padding: 0 9px;" class="btn btn-danger">{{ $var }}</button>
                                                @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{ route('product.delete',['id' => $value->id]) }}" class="delete" style="margin-right: 20px;" data-id="7">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="color: red;" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                                    ></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="text-align: center;">
                                <h4 class="modal-title" id="myModalLabel33">Edit danh mục</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <form action="#">
                                <input type="hidden" id="namecategory_id">
                                <div class="modal-body">
                                    <label>Tên danh mục </label>
                                    <div class="form-group">
                                        <input type="text" id="namecategory_edit" name="namecategory" placeholder="Tên danh mục..." class="form-control" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal" style="padding: 7px 18px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                            <path
                                                fill-rule="evenodd"
                                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"
                                            />
                                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                        </svg>
                                    </button>
                                    <button type="button" class="btn btn-primary ml-1" id = "btn-namecategory_edit" data-bs-dismiss="modal" style="padding: 7px 18px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                            />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
<script>

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)

            $(document).ready(function(){
                toastr.error("{{ $error }}");
        });
        @endforeach
    @endif
</script>

@endsection
