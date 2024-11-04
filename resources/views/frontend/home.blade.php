@extends('layouts.site')
@section('title','Home')
@section('content')
<x-slider/>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                   <x-category/>              
                    <x-brand/>
             </div>
            </div>
            
            <div class="col-sm-9 padding-right">
               <x-productnew/>
                
              
               <x-productsale/>
               <x-productsale/>
                
            </div>
        </div>
    </div>
</section>

@endsection
