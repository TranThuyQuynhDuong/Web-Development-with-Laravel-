@extends('layouts.site')
@section('title','Product')
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
   
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                   <x-category/>
                
                    <x-brand/>
                    
                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                             <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->
                    
                   
                    
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">All Product</h2>
                    @foreach ($list_product as $productitem)
                    <div class="col-sm-4">
                        <x-productitem :$productitem/>
                    </div> 
                    @endforeach
                </div><!--features_items-->
                <div class="d-flex justify-content-center">
                    {{$list_product->links()}}
                 </div>
            </div>
        </div>
    </div>
</section>
@endsection
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

