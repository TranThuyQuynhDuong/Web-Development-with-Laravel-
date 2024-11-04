@extends('layouts.site')
@section('title', 'ProductDetail')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('css/main.css ') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('css/prettyPhoto.css ') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('css/price-range.css ') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css ') }}">

    <main>
        <div class="container">
            <div class="row">
                

                <div class="col-sm-9 padding-right1">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <style>
                                .responsive-image {
                                    width: 250px;
                                    height: 250px;
                                    object-fit: contain;
                                }
                            </style>
                            {{-- <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->image }}" /> --}}

                            <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->image }}" class="responsive-image" />
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <h2>{{$product->name}}</h2>
                                <span>
                                    <span>${{ $product->price }}</span>



                                    <label>Quantity:</label>
                                    <input type="text" value="" />


                                    <button type="button" class="btn btn-fefault cart" onclick="handleAddCart($product->id)">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm vào giỏ hàng
                                    </button>


                                </span>
                                
                                <p><b>Brand:</b>  {{$product->brandname}}</p>
                                <a href=""><img src="images/product-details/share.png"
                                        class="share img-responsive" alt="" /></a>
                            </div><!--/product-information-->
                            

                        </div>
                        
                    </div><!--/product-details-->
                    <h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            @foreach ($list_product as $productitem)
                            <div class="col-sm-4">
                                <x-productitem :$productitem/>
                            </div> 
                            @endforeach
									
						</div>
					</div><!--/recommended_items-->

                    


                </div>
            </div>
        </div>
    </main>






    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js ') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js ') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('js/contact.js') }}"></script>
    <!-- Font Awesome -->
    <script src="{{ asset('js/gmaps.js') }}"></script>
    <!-- Fancybox -->
    <!-- Themify Icons -->
    <script src="{{ asset('js/html5shiv.js ') }}"></script>
    <!-- Nice Select CSS -->
    <script src="{{ asset('js/main.js ') }}"></script>
    <script src="{{ asset('js/price-range.js') }}"></script>

@endsection
@section('footer')
<script>
    function handleAddCart(productid)
    {
        alert(productid+'thêm vào giỏ hàng thành công')
    } 
</script>
@endsection