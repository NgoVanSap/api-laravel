@extends('admin.master')
@section('Content')
<div id="main" style="padding: 0 2rem !important;">
    <div class="page-heading">
        <section id="horizontal-input">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="row match-height">
                                    <div class="col-md-12 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Danh mục</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label style="font-size: 14px;">Tên danh mục</label>
                                                            </div>
                                                            <div class="col-md-10 form-group">
                                                                <input type="text" id="namecategory" class="form-control" name="namecategory" placeholder="Tên danh mục..." />
                                                            </div>
                                                            <div class="col-sm-12 d-flex justify-content-end">
                                                                <button type="button" id="submit_category" class="btn btn-outline-success">Submit</button>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tất Cả Danh Mục</h4>
                        </div>
                        <div class="card-content" style="height: 500px !important; overflow: auto;">
                            <!-- table head dark -->
                            <table class="table table-bordered" id="mytable">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;">#</th>
                                        <th scope="col">Name Danh Mục</th>
                                        <th scope="col" style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="mytable">
                                    <tr id="Garrett Winters">
                                        <td><span class="tabledit-span tabledit-identifier">Garrett Winters</span><input class="tabledit-input tabledit-identifier" type="hidden" name="id" value="Garrett Winters" disabled=""></td>
                                        <td class="tabledit-view-mode"><span class="tabledit-span">System Architect</span><input class="tabledit-input form-control input-sm" type="text" name="car" value="System Architect" style="display: none;" disabled=""></td>
                                        <td class="tabledit-view-mode"><span class="tabledit-span">Edinburgh</span><input class="tabledit-input form-control input-sm" type="text" name="color" value="Edinburgh" style="display: none;" disabled=""></td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    <td style="white-space: nowrap; width: 1%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                           <div class="btn-group btn-group-sm" style="float: none;"><button type="button" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none;"><span class="fa fa-pencil"></span> &nbsp; EDIT</button></div>



                       </div></td></tr>
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
                                    <span style="color:red">*</span>
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
    $(document).ready(function () {
        // ADD DATA
        function getData() {
            $.ajax({
                url: "/admin/home/danh-muc/get-data",
                type: "GET",
                success: function ($data) {
                    let _html = "";
                    let data = $data.data;
                    data.reverse();
                    data.forEach((x) => {
                        _html += "<tr>";
                        _html += '<th scope="row" style="text-align: center">' + x.id + "</th>";
                        _html += "<td>" + x.namecategory + "</td>";
                        _html += '<td style="text-align: center">';
                        _html += '<a href="#" class="delete" style="margin-right: 20px;" data-id = ' + x.id + " >";
                        _html += '<svg xmlns="http://www.w3.org/2000/svg" style = "color: red" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">';
                        _html += '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>';
                        _html += '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>';
                        _html += "</svg>";
                        _html += "</a>";
                        _html += '<a href="#"  class="btn-edit" data-bs-toggle="modal" data-bs-target="#inlineForm" data-id = ' + x.id + " >";
                        _html += '<svg xmlns="http://www.w3.org/2000/svg" style = "color:#20a14c" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">';
                        _html += '<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>';
                        _html += '<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>';
                        _html += "</svg>";
                        _html += "</a>";
                        _html += "</td>";
                        _html += "</tr>";
                    });
                    $("#mytable tbody").html(_html);
                },
            });
        }
        getData();

        // DELETE
        $("body").on("click", ".delete", function () {
            var getID = $(this).data("id");
            console.log("cần xóa id :" + getID);
            $.ajax({
                url     : "/admin/home/danh-muc/deleteAjax/" + getID,
                type    : "GET",
                success : function ($res) {
                    if ($res.status == true) {
                        toastr.success("Xóa thành công");
                        getData();
                    } else {
                        toastr.error("Xóa không thành công");
                    }
                },
            });
        });

        //EDIT
        $("body").on("click",".btn-edit",function () {
            var getID = $(this).data("id");


            $.ajax({
                url     : "/admin/home/danh-muc/editAjax/" + getID,
                type    : "GET",
                success : function ($res) {
                    if($res.status == true) {
                        $("#namecategory_id").val($res.data.id);
                        $("#namecategory_edit").val($res.data.namecategory);
                    }else {
                    toastr.error('Edit thất bai')
                    }
                }
            });
        });

        $("#btn-namecategory_edit").on("click", function () {
            var id           = $("#namecategory_id").val();
            var namecategory = $("#namecategory_edit").val();

            var data = {
                'id'           :id,
                'namecategory' : namecategory,
            };

            $.ajax({
                url: "/admin/home/danh-muc/update",
                type: "POST",
                data: data,
                success: function (res) {
                   if(res.data) {
                       toastr.success('Edit thành công');
                       getData();
                   } else {
                       toastr.error('Edit thất bại');
                   }
                },
                error: function (res) {
                    var errorList = res.responseJSON.errors;
                    $.each(errorList, function (key, value) {
                        toastr.error(value[0]);
                    });
                },
            });
        });
        // POST DATA
        $("#submit_category").click(function (e) {

            e.preventDefault();

            var namecategory = $("input[name=namecategory]").val();

            $.ajax({
                url: "/admin/home/danh-muc/Ajax",
                type: "POST",
                data: { namecategory:namecategory },
                success: function (res) {
                   if(res.trangThai == true) {
                    toastr.success('Thêm thành công');
                    getData();
                    $("#namecategory").val('');
                   }
                },
                error: function (res) {
                    var errorList = res.responseJSON.errors;
                    $.each(errorList, function (key, value) {
                        toastr.error(value[0]);
                    });
                },
            });
        });
    });
</script>
@endsection
