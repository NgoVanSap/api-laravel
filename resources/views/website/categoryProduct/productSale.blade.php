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
            <h1 class="mb-0 bread">SALE</h1>
            </div>
        </div>
        </div>
    </div>
    <section class="ftco-section bg-light">
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-10 order-md-last">
            <div class="row">
                @if(count($dataProductSale) > 0)
                @foreach ($dataProductSale as $dataProductSales)
            <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate fadeInUp ftco-animated">
                <div class="product">
                    <a href="{{ route('product.slug.index',['slug' => $dataProductSales->slug_name]) }}" class="img-prod">
                    <img class="img-fluid" src="{{ asset('imgProduct/'.$dataProductSales->image) }}" alt="Colorlib Template">
                    @if ($dataProductSales->price_sale >  0)
                        <span class="status">Sale</span>
                        <div class="overlay"></div>
                    @endif
                    </a>
                    <div class="text py-3 px-3">
                    <h3>
                        <a href="{{ route('product.slug.index',['slug' => $dataProductSales->slug_name]) }}">{{ $dataProductSales->name }}</a>
                    </h3>
                    <div class="d-flex">
                        <div class="pricing">
                        <p class="price">
                            @if($dataProductSales->price_sale > 0)
                                <span class="mr-2 price-dc">${{ number_format($dataProductSales->price,1)}}</span>
                                <span class="price-sale">${{ number_format($dataProductSales->price_sale,1) }}</span>
                            @else
                                <span class="price-sale">${{ number_format($dataProductSales->price,1) }}</span>
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
                        <a data-id="{{ $dataProductSales->id }}" class="add-to-cart text-center py-2 mr-1 add-cart-pun">
                        <span>Add to cart <i class="ion-ios-add ml-1"></i>
                        </span>
                        </a>
                        <a href="#" class="buy-now text-center py-2">Buy now <span>
                            <i class="ion-ios-cart ml-1"></i>
                        </span>
                        </a>
                    </p>
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
            @if(count($dataProductSale) > 0)
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
