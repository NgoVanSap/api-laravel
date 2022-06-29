@extends('website.master')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('assetsWebsite/images/bg_6.jpg')">
        <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
            <p class="breadcrumbs">
                <span class="mr-2">
                <a href="{{ route('website.index') }}">Home</a>
                </span>
                <span>Products</span>
            </p>
            <h1 class="mb-0 bread">Collection Products</h1>
            </div>
        </div>
        </div>
    </div>
    <section class="ftco-section bg-light">
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-10 order-md-last">
            <div class="row"> @if(count($dataProductCategory) > 0 )
             @foreach ($dataProductCategory as $dataCategory)
                <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate fadeInUp ftco-animated">
                <div class="product">
                    <a href="{{ route('product.slug.index',['slug' => $dataCategory->slug_name]) }}" class="img-prod">
                    <img class="img-fluid" src="{{ asset('imgProduct/'.$dataCategory->image) }}" alt="Colorlib Template">
                    @if($dataCategory->price_sale > 0)
                        <span class="status">Sale</span>
                        <div class="overlay"></div>
                    @endif
                    </a>
                    <div class="text py-3 px-3">
                    <h3>
                        <a href="{{ route('product.slug.index',['slug' => $dataCategory->slug_name]) }}">{{ $dataCategory->name }}</a>
                    </h3>
                    <div class="d-flex">
                        <div class="pricing">
                        <p class="price">
                            @if($dataCategory->price_sale > 0)
                                <span class="mr-2 price-dc">${{ number_format($dataCategory->price,1)}}</span>
                                <span class="price-sale">${{ number_format($dataCategory->price_sale,1) }}</span>
                            @else
                                <span class="price-sale">${{ number_format($dataCategory->price,1) }}</span>
                            @endif
                        </p>
                        </div>
                        <div class="rating">
                        <p class="text-right">
                            <a href="#">
                            <span class="ion-ios-star-outline"></span>
                            </a>
                            <a href="#">
                            <span class="ion-ios-star-outline"></span>
                            </a>
                            <a href="#">
                            <span class="ion-ios-star-outline"></span>
                            </a>
                            <a href="#">
                            <span class="ion-ios-star-outline"></span>
                            </a>
                            <a href="#">
                            <span class="ion-ios-star-outline"></span>
                            </a>
                        </p>
                        </div>
                    </div>
                    <p class="bottom-area d-flex px-3">
                        <a href="{{ route('product.slug.index',['slug' => $dataCategory->slug_name]) }}" class="add-to-cart text-center py-2 mr-1 ">
                            <span>Option
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                  </svg>
                            </span>
                        </a>
                        <a  href="{{ route('product.slug.index',['slug' => $dataCategory->slug_name]) }}" class="buy-now text-center py-2 detail-modal-product" data-id="{{ $dataCategory->id}}" style="cursor: pointer" data-toggle="modal" data-target="#exampleModalCenter_{{ $dataCategory->id }}">
                            Quick view<span><i class="ion-ios-cart ml-1"></i></span></a>
                    </p>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalCenter_{{ $dataCategory->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 48%;">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: none !important;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline:  none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="image-block" style="overflow: hidden; margin-bottom: 10px; border: solid 1px #ebebeb;">
                            <div class="modal-body-img">
                                <img src="{{ asset('imgProduct/' .$dataCategory->image) }}" alt="" style="display: block; max-width: 100%; height: auto;" />
                            </div>
                        </div>
                        <div class="modal-body-info" style="color: #222; font-weight: 300; padding-right: 25px; border: none; margin-left: 31px;">
                            <div class="head-qv">
                                <h3 class="qwp-name">
                                    <a href="{{ route('product.slug.index',['slug' => $dataCategory->slug_name]) }} " style="color: black; text-transform: uppercase;">{{ $dataCategory->name }}</a>
                                </h3>
                                <div class="quickview-info" style="margin-bottom: 15px;">
                                    <span class="vendor_frist">
                                        Trademark:
                                        <span class="vendor" style="color: #0089ff;">NEEDS OF WISDOM®</span>
                                    </span>
                                    <span class="vendor_status">
                                        Status:
                                        <span class="status_name" style="color: #0089ff;">Stocking</span>
                                    </span>
                                </div>
                                <span class="prices">
                                    @if ($dataCategory->price_sale > 0)
                                    <span class="price" style="">${{ number_format($dataCategory->price_sale,1) }}</span>
                                    @else
                                    <span class="price" style="">${{ number_format($dataCategory->price,1) }}</span>
                                    @endif
                                    <del class="old-price"></del>
                                </span>
                                <div class="product-description" style="margin-top: 20px;">
                                    <div class="product-dec-infor">
                                        NEEDS OF WISDOM® / Streetwear / Based in California / Made in USA
                                    </div>
                                    <a href="{{ route('product.slug.index',['slug' => $dataCategory->slug_name]) }}" class="product-dec-infor-link">See details</a>
                                </div>
                                <div class="size-modal" style="margin-top: 13px;">
                                    <div class="modal-size-title" style="margin-bottom: 6px;">Size</div>
                                    <div class="selector-wrapper" style="display: flex; margin-bottom: 16px;">
                                        @foreach ($dataCategory->attribute  as  $valuesize)
                                        <div class="binggest-size">
                                            <input type="radio" id="swatch-0-m" name="option" class="swatch-radio-css " value="{{ $valuesize->id }}" />
                                            <label for="swatch-0-m" class="swatch-0-css active_{{ $valuesize->id }} {{ $loop->first ? 'active' : '' }}">{{ $valuesize->size }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class=""></div>
                                <div class="modal-quantity-and-add-cart" style="display: flex;">
                                    <div class="quantity_wanted_p">
                                        <div class="input_number_product">
                                            <a class="input_number_product_prve">-</a>
                                            <input type="text" class="input-quantity-modal visible" name="quantity" id="quantity" value="1" />
                                            <a class="input_number_product_next">+</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary btn-submit-add-cart" data-dismiss="modal">
                                        <span class="span-add-cart">ADD CART</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
            </div>
                @endforeach
                @else
                <div class="col-md-12">
                    <div class="no-ProductCategory" style="text-align: center;">
                        <h1 class="mb-0 bread">NO PRODUCTS BY CATEGORY</h1>
                    </div>
                </div>
                @endif
            </div>
            @if(count($dataProductCategory) > 0)
            <div class="row mt-5">
                <div class="col text-center">
                <div class="block-27">
                    <ul>
                    <li>
                        <a href="#">&lt;</a>
                    </li>
                    <li class="active">
                        <span>1</span>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&gt;</a>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            @endif
            </div>
            <div class="col-md-4 col-lg-2 sidebar">
            <div class="sidebar-box-2">
                <h2 class="heading mb-4">
                <a href="{{ route('product.all.index') }}">CLOTHING</a>
                </h2>
            <ul>
                    <li><a href="{{ route('product.all.index') }}">ALL ITEMS</a></li>
                    <li><a href="{{ route('product.category.sale.index') }}">SALE</a></li>

                @foreach ($dataDanhMuc as $dataCategory)
                <li>
                    <a href="{{ route('product.category.index',['namecategory'=>$dataCategory->namecategory]) }}">{{ $dataCategory->namecategory }}</a>
                </li>
                @endforeach
            </ul>
            </div>
        </div>
    </div>
</section>
@endsection
