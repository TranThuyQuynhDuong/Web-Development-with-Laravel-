<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;
class ProductSale extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $args_product_sale = [
            ['status', '=', 1],
            ['pricesale', '>',0],
            // ['pricesale', '<', 'product.price'],
        ];
        $product_sale = Product::Where($args_product_sale)
        ->orderBy('created_at', 'desc')
        ->limit('5 ')
        ->get();
        return view('components.product-sale', compact('product_sale'));
    }
}
