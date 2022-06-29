@extends('website.master')
@section('content')
<section id="home-section" class="hero">
    <div class="home-slider js-fullheight owl-carousel">
        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                    <div class="one-third order-md-last img js-fullheight" style="background-image: url(assetsWebsite/images/bg_1.jpg);"></div>
                    <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">Winkel eCommerce Shop</span>
                            <div class="horizontal">
                                <h3 class="vr" style="background-image: url(assetsWebsite/images/divider.jpg);">Stablished Since 2000</h3>
                                <h1 class="mb-4 mt-3">
                                    Catch Your Own <br />
                                    <span>Stylish &amp; Look</span>
                                </h1>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>

                                <p><a href="#" class="btn btn-primary px-5 py-3 mt-3">Discover Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight">
            <div class="overlay"></div>
            <div class="container-fluid p-0">
                <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                    <div class="one-third order-md-last img js-fullheight" style="background-image: url(assetsWebsite/images/bg_2.jpg);"></div>
                    <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <div class="text">
                            <span class="subheading">Winkel eCommerce Shop</span>
                            <div class="horizontal">
                                <h3 class="vr" style="background-image: url(assetsWebsite/images/divider.jpg);">Best eCommerce Online Shop</h3>
                                <h1 class="mb-4 mt-3">A Thouroughly <span>Modern</span> Woman</h1>
                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.</p>

                                <p><a href="{{ route('product.all.index') }}" class="btn btn-primary px-5 py-3 mt-3">Shop Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assetsWebsite/images/about.jpg);">
                <a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                    <span class="icon-play"></span>
                </a>
            </div>
            <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section-bold mb-4 mt-md-5">
                    <div class="ml-md-0">
                        <h2 class="mb-4">Better Way to Ship Your Products</h2>
                    </div>
                </div>
                <div class="pb-md-5">
                    <p>
                        But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her
                        for their.
                    </p>
                    <div class="row ftco-services">
                        <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services">
                                <div class="icon d-flex justify-content-center align-items-center mb-4">
                                    <span class="flaticon-002-recommended"></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="heading">Refund Policy</h3>
                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services">
                                <div class="icon d-flex justify-content-center align-items-center mb-4">
                                    <span class="flaticon-001-box"></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="heading">Premium Packaging</h3>
                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services">
                                <div class="icon d-flex justify-content-center align-items-center mb-4">
                                    <span class="flaticon-003-medal"></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="heading">Superior Quality</h3>
                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Best Sellers</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($productSale as $saleProduct)
            <div class="col-sm col-md-6 col-lg ftco-animate">
                <div class="product">
                    <a href="{{ route('product.slug.index',['slug' => $saleProduct->slug_name]) }}" class="img-prod">
                        <img class="img-fluid" src="{{ asset('imgProduct/' .$saleProduct->image) }}" alt="Colorlib Template" />
                        @if($saleProduct->price_sale > 0)
                        <span class="status">Sale</span>
                        <div class="overlay"></div>
                        @endif
                    </a>
                    <div class="text py-3 px-3">
                        <h3><a href="{{ route('product.slug.index',['slug' => $saleProduct->slug_name]) }}">{{ $saleProduct->name }}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    <span class="mr-2 price-dc">${{ number_format($saleProduct->price,1)}}</span>
                                    <span class="price-sale">${{ number_format($saleProduct->price_sale,1) }}</span>
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
                            <a href="{{ route('product.slug.index',['slug' => $saleProduct->slug_name]) }}" class="add-to-cart text-center py-2 mr-1 ">
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

            <!-- Modal -->

        </div>
    </div>
</section>

<section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-8 d-flex align-items-stretch">
                <div class="img" style="background-image: url(assetsWebsite/images/about-1.jpg);"></div>
            </div>
            <div class="col-md-4 py-md-5 ftco-animate">
                <div class="text py-3 py-md-5">
                    <h2 class="mb-4">New Women's Clothing Summer Collection 2019</h2>
                    <p>
                        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                    </p>
                    <p><a href="{{ route('product.all.index') }}" class="btn btn-white px-4 py-3">Shop now</a></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 order-md-last d-flex align-items-stretch">
                <div class="img img-2" style="background-image: url(assetsWebsite/images/about-2.jpg);"></div>
            </div>
            <div class="col-md-7 py-3 py-md-5 ftco-animate">
                <div class="text text-2 py-md-5">
                    <h2 class="mb-4">New Men's Clothing Summer Collection 2019</h2>
                    <p>
                        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
                    </p>
                    <p><a href="{{ route('product.all.index') }}" class="btn btn-white px-4 py-3">Shop now</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($productAll as $product)
            <div class="col-xs-12 col-sm-6 col-lg-3">
                <div class="product">
                    <a href="{{ route('product.slug.index',['slug' => $product->slug_name]) }}" class="img-prod">
                        <img class="img-fluid" src="{{ asset('imgProduct/' . $product->image) }}" alt="Colorlib Template" />
                        @if($product->price_sale > 0)
                        <span class="status">Sale</span>
                        <div class="overlay"></div>
                        @endif
                    </a>
                    <div class="text py-3 px-3">
                        <h3><a href="{{ route('product.slug.index',['slug' => $product->slug_name]) }}">{{ $product->name }}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price">
                                    @if($product->price_sale > 0)
                                    <span class="mr-2 price-dc">${{ number_format($product->price,1)}}</span>
                                    <span class="price-sale">${{ number_format($product->price_sale,1) }}</span>
                                    @else
                                    <span class="price-sale">${{ number_format($product->price,1) }}</span>
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
                            <a href="{{ route('product.slug.index',['slug' => $product->slug_name]) }}"  class="add-to-cart text-center py-2 mr-1 ">
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
            <div class="col-xs-12 col-sm-12 col-lg-12" style="text-align: center;">
                <p><a href="{{ route('product.all.index') }}" class="btn btn-primary custom-btn">View All Products</a></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(assetsWebsite/images/bg_4.jpg);">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="10000">0</strong>
                                <span>Happy Customers</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="100">0</strong>
                                <span>Branches</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="1000">0</strong>
                                <span>Partner</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="100">0</strong>
                                <span>Awards</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate">
                <h2 class="mb-4">Our satisfied customer says</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(assetsWebsite/images/person_1.jpg);">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Marketing Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(assetsWebsite/images/person_2.jpg);">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Interface Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(assetsWebsite/images/person_3.jpg);">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">UI Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(assetsWebsite/images/person_1.jpg);">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Web Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url(assetsWebsite/images/person_1.jpg);">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">System Analyst</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2>Subcribe to our Newsletter</h2>
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col-md-8">
                            <form action="#" class="subscribe-form">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control" placeholder="Enter email address" />
                                    <input type="submit" value="Subscribe" class="submit px-3" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
