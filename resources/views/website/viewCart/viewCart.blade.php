@extends('website.master')
<style>
   .counter {
    width: 150px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
}
.counter input {
    height: 1px !important;
    text-align: center;
    border: 1px solid rgba(0, 0, 0, 0.1) !important;
    padding: 10px 20px;
    background: transparent !important;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    border-radius: 0;
    font-size: 11px;
    width: 57px;
}
.custommer-btn-value {
    border: 1px solid rgba(0, 0, 0, 0.1) !important;
    background: transparent !important;
    -webkit-border-radius: 0 !important;
    -moz-border-radius: 0 !important;
    -ms-border-radius: 0 !important;
    border-radius: 0 !important;
    font-size: 14px !important;
    outline: none !important;
    cursor: pointer !important;
    width: -28px;
    padding: 0 11px !important;
}
.home {
    color: #333;
    font-size: 13px;
    font-family: revert;
}
</style>
@section('content')
<section style="background: #f5f5f5; margin-top: 90px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 a-left">
                <ul style="display: flex; list-style: none; margin: 0; padding: 10px 0;">
                    <a href="{{ route('website.index') }}">
                        <li class="home">Home</li>
                    </a>
                    <span style="margin: 0 6px;">/</span>
                    <li style="color: #ffa45c;font-size: 13px;font-family: revert;" >Cart</li>
                </ul>
            </div>
        </div>
    </div>
</section>
    @if ($itemsss->count() > 0)
    <div class="container" style="margin-top: 47px;">
        <div class="row">
        <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
            <div class="cart-list">
                <table class="table">
                    <thead class="thead-primary">
                      <tr class="text-center">
                        <th>Delete</th>
                        <th>Image</th>
                        <th>Product</th>

                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody id="Cartmytable">

                    </tbody>
                  </table>
              </div>
        </div>
        </div>
        <div class="row" style="justify-content: flex-end;">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate fadeInUp ftco-animated "id="checkOutTotal">


                </div>
        </div>
    </div>
    @else
    <section style="padding-top: 42px;padding-bottom: 190px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>
                        Your cart
                    </h3>
                </div>
                <div class="col-lg-12">
                    <p style="font-size: 11px; color:#333">No products. Return to the store to continue shopping.</p>
                </div>

            </div>
        </div>
    </section>
    @endif
@endsection

