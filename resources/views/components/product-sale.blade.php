<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Product Sale</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            @foreach ($product_sale as $product_item)
                <div class="col-sm-4">
                    <x-productitem :productitem="$product_item" />
                </div>
            @endforeach


        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items-->
