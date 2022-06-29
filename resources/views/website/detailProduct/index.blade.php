@extends('website.master')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
               @foreach ($detailProduct as $detailProduct)
                    <div class="col-lg-6 mb-5 ftco-animate fadeInUp ftco-animated">
                        <a href="{{ asset('imgProduct/'. $detailProduct->image) }}" class="image-popup">
                            <img src="{{ asset('imgProduct/'. $detailProduct->image) }}" class="img-fluid" alt="Colorlib Template" />
                        </a>
                    </div>
                    <div class="col-lg-6 product-details pl-md-5 ftco-animate fadeInUp ftco-animated">
                        <h3>{{ $detailProduct->name }}</h3>
                        <div class="rating d-flex">
                            <p class="text-left mr-4">
                                <a href="#" class="mr-2">5.0</a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                            </p>
                        </div>
                        <p class="price">
                            @if($detailProduct->price_sale > 0)
                                <span class="mr-2 price-dc" style="margin-right: 20px;text-decoration: line-through;color: #b3b3b3;">${{ number_format($detailProduct->price,1)}}</span>
                                <span class="price-sale">${{ number_format($detailProduct->price_sale,1) }}</span>
                            @else
                                <span class="price-sale">${{ number_format($detailProduct->price,1) }}</span>
                            @endif

                        </p>
                        <p>
                            {{ $detailProduct->infomation }}
                        </p>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group d-flex">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="size" id="myselect" class="form-control">
                                            @foreach ($detailProduct->attribute as $valuesize)
                                                <option value="{{ $valuesize->id }}">{{ $valuesize->size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="input-group col-md-6 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                        <i class="ion-ios-remove"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100" />
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                        <i class="ion-ios-add"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <p><a data-id="{{ $detailProduct->id }}" class="btn btn-black py-3 px-5 add-cart-pun">Add to Cart</a></p>
                    </div>
               @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <h2 class="mb-4">
                        Featured Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($productNew as $productNewCus)
                <div class="col-sm col-md-6 col-lg ftco-animate fadeInUp ftco-animated">
                    <div class="product">
                        <a href="{{ route('product.slug.index',['slug' => $productNewCus->slug_name]) }}" class="img-prod">
                            <img class="img-fluid" src="{{ asset('imgProduct/'.  $productNewCus->image) }}" alt="Colorlib Template" />
                            @if ($productNewCus->price_sale > 0)
                            <span class="status">Sale</span>
                            <div class="overlay"></div>
                            @endif
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="{{ route('product.slug.index',['slug' => $productNewCus->slug_name]) }}">{{ $productNewCus->name }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">

                                    <p class="price">
                                        @if($productNewCus->price_sale > 0)
                                            <span class="mr-2 price-dc">${{ number_format($productNewCus->price,1)}}</span>
                                            <span class="price-sale">${{ number_format($productNewCus->price_sale,1) }}</span>
                                        @else
                                            <span class="price-sale">${{ number_format($productNewCus->price,1) }}</span>
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
                                <a href="{{ route('product.slug.index',['slug' => $productNewCus->slug_name]) }}" class="add-to-cart text-center py-2 mr-1 ">
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
        </div>
    </section>
@endsection
