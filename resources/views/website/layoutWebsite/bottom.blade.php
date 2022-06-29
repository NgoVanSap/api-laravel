@jquery
@toastr_js
@toastr_render
<script src="{{ URL::to('assetsWebsite/js/jquery.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/popper.min.js') }}"></script>`
<script src="{{ URL::to('assetsWebsite/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/jquery.stellar.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/aos.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/scrollax.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
<script src="{{ URL::to('assetsWebsite/js2/vendors.js') }}"></script>
<script src="{{ URL::to('assetsWebsite/js2/app.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        // $('.binggest-size ').click(function(){
        //     $(".binggest-size").removeClass("active");
        //     $(this).addClass('active');
        // });

    });
</script>
<script>
    $(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){

            e.preventDefault();
            var quantity = parseInt($('#quantity').val());

                $('#quantity').val(quantity + 1);

        });

         $('.quantity-left-minus').click(function(e){
            e.preventDefault();

            var quantity = parseInt($('#quantity').val());

                if(quantity>1){
                    $('#quantity').val(quantity - 1);
                }
        });

    });
</script>

<script>
    $(document).ready(function() {

        $(".add-cart-pun").on('click', function(e) {


            var  getID = $(this).data('id');

            var payload = {
                'product_id_cart'   :    $(this).data('id'),
                'quantity'          :    $("input[name='quantity']").val(),
                'cart_id_attribute' :    $("#myselect option:selected").val(),
            };

            $.ajax({
                url     : "/addToCart/" + getID,
                type    : "POST",
                data    : payload,
                success : function ($res) {

                    if($res.status == true) {
                        toastr.success('Add to cart successfully.');
                        loadCartGioHang();
                        loadCart();
                        // removeimgCart();
                        // loadCartGioHangHover();


                    }
                },
            });
        });
        function number_format (number, decimals, dec_point, thousands_sep) {
            number = number.toFixed(decimals);

            var nstr = number.toString();
            nstr += '';
            x = nstr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? dec_point + x[1] : '';
            var rgx = /(\d+)(\d{3})/;

            while (rgx.test(x1))
                x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');

            return x1 + x2;
        }





    function loadCartGioHang() {

            $.ajax({
                type: "GET",
                url: "/load/Cart",
                success: function (response) {

                    let _html   = "";
                    let _html_   = "";
                    let html    = "";
                    let data    = response.data;
                    var total   = 0;
                    var itemsDem = 0;

                    data.forEach((x) => {
                        response.dataAttributesCarts.forEach((x1) => {
                            if(x1.id == x.cart_id_attribute) {
                                var size = x1.size;
                                itemsDem += x.quantity;

                            }
                        });

                    });
                    _html_ += ' <span class="icon-shopping_cart"></span>['+itemsDem+']';

                    $('#add-itemDem').html(_html_);
                    },
            });
    }

    loadCartGioHang();




        // function loadCartGioHangHover() {

        //     $.ajax({
        //         type: "GET",
        //         url: "/load/Cart",
        //         success: function (response) {

        //             let _html   = "";
        //             let _html_   = "";
        //             let data    = response.data;
        //             var total   = 0;
        //             data.forEach((x) => {
        //                 response.dataAttributesCarts.forEach((x1) => {
        //                     if(x1.id == x.cart_id_attribute) {
        //                         var size = x1.size;
        //                         var priceEachProduct = x.price_sale ? x.price_sale : x.price;
        //                         thanhTien = priceEachProduct * x.quantity;
        //                         total += thanhTien;

        //                                 _html +=  '<li style="display: flex;padding-bottom: 22px;border-bottom: 0.5px solid;margin-bottom: 23px;">';
        //                                 _html +=  '<div class="product-id">';
        //                                 _html +=  '<a href="/detail/'+x.slug_name+'">';
        //                                 _html +=  '<img class="product-cart-img" src="/imgProduct/'+x.image+'" alt="">';
        //                                 _html +=  '</a>';
        //                                 _html +=  '</div>';
        //                                 _html +=  '<div class="" style="margin-left: 20px;width: 100%;position: relative;" >';
        //                                 _html +=  '<div class="product-price-cart" style="display: flex;">';
        //                                 _html +=  '<a href="/detail/'+x.slug_name+'">';
        //                                 _html +=  '<span>'+x.name+'</span>';
        //                                 _html +=  '</a>';
        //                                 _html +=  '<div class="btn-delete-cart cart-remove" data-id = "'+x.id+'" style="color: black;right: 0;position: absolute;">';
        //                                 _html +=  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg btn-delete-cart-color" viewBox="0 0 16 16">';
        //                                 _html +=  '<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>';
        //                                 _html +=  '</svg>';
        //                                 _html +=  '</div>';
        //                                 _html +=  '</div>';
        //                                 _html +=  '<div class="product-details-bottom">';
        //                                 _html +=  '<span style="font-size: 11px;font-weight: 700;color: black;">$'+number_format(priceEachProduct,1,'.',',')+'</span>';
        //                                 _html +=  '<div class="quantity-cart-hover">';
        //                                 _html += '<input type="hidden" name="cart_id_attribute" class="task" value="'+x.cart_id_attribute+'">';
        //                                 _html +=  '<button type="button" data-carid="'+x.cart_id_attribute+'" data-id="'+x.product_id_cart+'" class="down custommer-btn-value custommer-btn-value-s qtyMinus" >-</button>';
        //                                 _html +=  '<input type="text" value="'+x.quantity+'" name="menusQuantity" />';
        //                                 _html +=  '<button type="button "data-carid="'+x.cart_id_attribute+'" data-id="'+x.product_id_cart+'" class="up custommer-btn-value custommer-btn-value-s qtyPlus" >+</button>';
        //                                 _html +=  '</div>';
        //                                 _html +=  '</div>';
        //                                 _html +=  '</div>';
        //                                 _html +=  '</li>';
        //                     }
        //                 });

        //             });

        //             _html_ +=  '<div class="Total-money-cart-hover" style="position:relative">';
        //             _html_ +=  '<span style="color: black;font-size: 12px;">TOTAL MONEY  :</span>';
        //             _html_ +=  '<span style="color: black;font-size: 12px;font-weight: 700;position: absolute;right: 0;top: 8px;">$'+number_format(total,1,'.',',')+'</span>';
        //             _html_ +=  '</div>';
        //             _html_ +=  '<div class="checkout-cart-hover">';
        //             _html_ +=  '<a href="#">';
        //             _html_ +=  '<span>Proceed to Checkout</span>';
        //             _html_ +=  '</a>';
        //             _html_ +=  '</div>';

        //             $('#appen-cart-hover').html(_html);
        //             $('#chekcout-cart-hover-id').html(_html_);
        //         },
        //     });
        // }




        // function loadCartGioHangTrong() {

        //     let _html   = "";


        //         _html   += '<div class="padding-cart" style="text-align: center;padding: 3.75rem 0;">';
        //         _html   += '<img src="assetsWebsite/imgCart/image Cart.png" alt="">';
        //         _html   += '<div class="title-cart" style="font-size: 12px;margin-top: 22px;color: #333;">Your product is not available yet.</div>';
        //         _html   += '</div>';



        //         $("#appen-img-noCart").html(_html);


        // }

        // loadCartGioHangTrong();

        //Load Cart
        function loadCart() {

            $.ajax({
                type: "GET",
                url: "/load/Cart",
                success: function (response) {

                    let _html   = "";
                    let _html_   = "";
                    let html    = "";
                    let data    = response.data;
                    var total   = 0;
                    var itemsDem = 0;
                    data.forEach((x) => {
                        response.dataAttributesCarts.forEach((x1) => {
                            if(x1.id == x.cart_id_attribute) {
                                var size = x1.size;
                                var priceEachProduct = x.price_sale ? x.price_sale : x.price;
                                var thanhTien = priceEachProduct * x.quantity;
                                itemsDem += x.quantity;
                                total += thanhTien;
                                _html   +=  '<tr class="text-center">';
                                    _html   +=  '<td class="product-remove"><a data-id = "'+x.id+'" style="cursor: pointer;" class="cart-remove"><span class="ion-ios-close"></span></a></td>';
                                    _html   +=  '<td class="image-prod">';
                                    _html   +=  '<img src="/imgProduct/'+x.image+'" style="display: block;width: 100px;height: 150px;margin: 0 auto;" class="img-fluid" alt="Colorlib Template" />';
                                    _html   +=  '</td>';
                                    _html   +=  '<td class="product-name">';
                                    _html   +=  '<a href="/detail/'+x.slug_name+'">';
                                    _html   +=  '<h3 style="text-decoration: underline;">'+x.name+'</h3>'
                                    _html   +=  '</a>';
                                    _html   +=  '<p style="text-transform: uppercase; color:black;font-size: 10px;font-weight: 800;">Size : [ '+size+' ]</p>';
                                    _html   +=  '</td>';
                                    _html   += '<input type="hidden" name="cart_id_attribute" class="task" value="'+x.cart_id_attribute+'">';
                                    _html   +=  '<td class="price">$'+number_format(priceEachProduct,1,'.',',')+'</td>';
                                    _html   +=  '<td class="quantity">';
                                    _html   +=  '<div class="counter">';
                                    _html   +=  '<button type="button" data-carid="'+x.cart_id_attribute+'" data-id="'+x.product_id_cart+'"  class="down custommer-btn-value custommer-btn-value-s qtyMinus" style="margin-right: 3px;" >-</button>';
                                    _html   +=  '<input type="text"  value="'+x.quantity+'" name="menusQuantity">';
                                    _html   +=  '<button type="button " data-carid="'+x.cart_id_attribute+'" data-id="'+x.product_id_cart+'" class="up custommer-btn-value custommer-btn-value-s qtyPlus" style="margin-left: 3px;" >+</button>';
                                    _html   +=  '</div>';
                                    _html   +=  '</td>';
                                    _html   +=  '<td class="total">$'+number_format(thanhTien,1,'.',',')+'</td>';
                            }
                        });

                    });
                    $('#Cartmytable').html(_html);

                        html +='<div class="cart-total mb-3">';
                        html +='<h3>Cart Totals</h3>';
                        html +='<p class="d-flex">';
                        html +='<span>Subtotal</span>';
                        html +='<span>$'+   number_format(total,1,'.',',')  +'</span>';
                        html +='</p>';
                        html +='<p class="d-flex">';
                        html +='<span>Delivery</span>';
                        html +='<span>$0.00</span>';
                        html +='</p>';
                        html +='<hr>';
                        html +='<p class="d-flex total-price">';
                        html +='<span>Total</span>';
                        html +='<span>$'+   number_format(total,1,'.',',')  +'</span>';
                        html +='</p>';
                        html +='</div>';
                        html +='<p class="text-center"><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>';

                    $('#checkOutTotal').html(html);
                },
            });
        }
            loadCart();

            // $(".input_number_product").on('click', '.input_number_product', function() {
            //     if($(this).hasClass('input_number_product_prve')) {
            //     var quantity = $(this).siblings('input[name="quantity"]').val();
            //     if(quantity<=1) {
            //         toastr.error('Quantity not less than 1');
            //         return false;
            //     } else {
            //         new_qty = parseInt(quantity)-1;

            //     }
            // }

            // if($(this).hasClass('input_number_product_next')) {
            //     var quantity = $(this).siblings('input[name="quantity"]').val();
            //     new_qty = parseInt(quantity)+1;

            // }

            // console.log(new_qty);
            // });

            // $('.input_number_product_next').click(function(e){

            //     e.preventDefault();
            //     var quantity = parseInt($('#quantity').val());

            //          $('#quantity').val(quantity + 1);

            //          console.log(quantity);

            //     var result = document.getElementById('quantity');
            //     var qtyqv = result.value;
            //     if (!isNaN(qtyqv) && qtyqv > 1) result.value--;
            //     return false;

            // });


            $('.input_number_product_prve').click(function(e){

                console.log(e.target.value);

            });

            // function loadDataModel() {

            //     $.ajax({
            //         url : "modal/detail/" + ,
            //         type : "GET",
            //     });
            // }



            //Update Cart
            $(document).on('click', '.custommer-btn-value-s', function() {
                if($(this).hasClass('qtyMinus')) {
                    var quantity = $(this).siblings('input[name="menusQuantity"]').val();
                    if(quantity<=1) {
                        toastr.error('Quantity not less than 1');
                        return false;
                    } else {
                        new_qty = parseInt(quantity)-1;

                    }
                }
                if($(this).hasClass('qtyPlus')) {
                    var quantity = $(this).siblings('input[name="menusQuantity"]').val();
                    new_qty = parseInt(quantity)+1;

                }
                var cart_id_attribute = $(this).data('carid');
                var product_id_cart  = $(this).data('id');
                $.ajax({
                    url     : "/update/Cart",
                    type    : "POST",
                    data    : {
                        'cart_id_attribute' : cart_id_attribute,
                        'quantity' : new_qty,
                        'product_id_cart': product_id_cart,
                    },
                    success : function ($res) {
                        if($res.status == true) {
                            loadCart();
                            loadCartGioHang();
                            loadCartGioHangHover();
                        }
                    },
                });
            });



            //Delete Cart
        $("body").on("click", ".cart-remove", function () {

            var dataIdRemoved = $(this).data('id');

            $.ajax ({
                url : "/delete/Cart/" + dataIdRemoved,
                type: "GET",
                success: function ($res) {

                    if($res.status == true) {
                        loadCart();
                        loadCartGioHang();

                        if($res.dataCartCount == 1) {
                            location.reload();
                        }
                    }
                },
            });

        });


    });



</script>


