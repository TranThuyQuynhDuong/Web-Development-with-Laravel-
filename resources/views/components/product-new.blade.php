<div>
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Product New</h2>

        @foreach ($product_new as $product_item)
        <div class="col-sm-4">
            <x-productitem :productitem="$product_item"/>
        </div>
        @endforeach
       
       
        
        
    </div><!--features_items-->
</div>