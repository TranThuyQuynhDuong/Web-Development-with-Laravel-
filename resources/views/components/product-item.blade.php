<div class="product-image-wrapper">
    <div class="single-products">
        <div class="productinfo text-center">
            <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
                <img src="{{ asset('images/product/' . $product->image) }}" alt="{{ $product->image }}" />
            </a>
            <h2 href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">{{ $product->price }}</h2>
            <p href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">{{ $product->name }}</p>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
        </div>
        <h2>
            @if($product->pricesale>0 && $product->pricesale < $product->price)
            <div class="col-9">{{number_format($product->pricesale)}} <del>{{number_format($product->price)}}</del></div>
            <div class="col-3 text-end">50%</div>
            @else
            <div class="col-12">{{number_format($product->price)}}<sup>đ</sup></div>

            @endif
        </h2>

    </div>
</div>
