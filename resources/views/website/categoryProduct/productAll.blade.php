@extends('website.master')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('assetsWebsite/images/bg_6.jpg')">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('website.index') }}">Home</a></span> <span>Products</span></p>
          <h1 class="mb-0 bread">ALL ITEMS</h1>
        </div>
      </div>
    </div>
  </div>
  <section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-10 order-md-last">
                <div class="row">
                    @foreach ($dataProduct as $dataProductAll)
                    <div class="col-sm-6 col-md-6 col-lg-4 ftco-animate fadeInUp ftco-animated">
                        <div class="product">
                            <a href="{{ route('product.slug.index',['slug' => $dataProductAll->slug_name]) }}" class="img-prod">
                                <img class="img-fluid" src="{{ asset('imgProduct/'.$dataProductAll->image) }}" alt="Colorlib Template">
                                @if ($dataProductAll->price_sale >  0)
                                    <span class="status">Sale</span>
                                    <div class="overlay"></div>
                                @endif
                            </a>
                            <div class="text py-3 px-3">
                                <h3><a href="{{ route('product.slug.index',['slug' => $dataProductAll->slug_name]) }}">{{ $dataProductAll->name }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            @if($dataProductAll->price_sale > 0)
                                                <span class="mr-2 price-dc">${{ number_format($dataProductAll->price,1)}}</span>
                                                <span class="price-sale">${{ number_format($dataProductAll->price_sale,1) }}</span>
                                            @else
                                                <span class="price-sale">${{ number_format($dataProductAll->price,1) }}</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="rating">
                                        <p class="text-right">
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                                        </p>
                                    </div>
                                </div>
                                <p class="bottom-area d-flex px-3">
                                    <a href="{{ route('product.slug.index',['slug' => $dataProductAll->slug_name]) }}" class="add-to-cart text-center py-2 mr-1 ">
                                        <span>Option
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                              </svg>
                                        </span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row mt-5">
              <div class="col text-center">
                <div class="block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
            </div>

            <div class="col-md-4 col-lg-2 sidebar">
                <div class="sidebar-box-2">
                    <h2 class="heading mb-4"><a href="{{ route('product.all.index') }}">CLOTHING</a></h2>
                    <ul>
                        <li><a href="{{ route('product.all.index') }}">ALL ITEMS</a></li>
                        <li><a href="{{ route('product.category.sale.index') }}">SALE</a></li>

                        @foreach ($dataDanhMuc as $dataCategory)

                            <li>
                                <a href="{{ route('product.category.index',['namecategory'=> $dataCategory->namecategory]) }}">{{ $dataCategory->namecategory }}</a>
                            </li>

                        @endforeach
                    </ul>
            </div>
        </div>
    </div>
</section>

@endsection
