<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
class ProductController extends Controller
{
    //product all
    public function index()
    {
        $list_product = Product::where('status','=',1)
            ->orderBy('created_at','desc')
            ->paginate(9);
        return view("frontend.product",compact('list_product'));
    }
    ////////////
    public function getlistcategoryid($rowid)
    {
        $listcatid=[];
       
            array_push($listcatid,$rowid);
            $list1= category::where([['parent_id','=',$rowid],['status','=',1]])->select("id")->get();
            if(count($list1)>0){
                foreach($list1 as $row1){
                    array_push($listcatid,$row1->id);
                    $list2= category::where([['parent_id','=',$row1->id],['status','=',1]])->select("id")->get();
                    
                    if(count($list2)>0){
                        foreach($list2 as $row2){
                            array_push($listcatid,$row2->id);
        
                        }
                    }

                }
            }
return $listcatid;
       
        
    }



    //product category
    public function category($slug)
    {
        $row= category::where([['slug','=',$slug],['status','=',1]])->select("id","name","slug")->first();
        $listcatid =[];
        if($row!=null)
        {
            $listcatid=$this->getlistcategoryid($row->id);
        
    }
        $list_product = Product::where('status','=',1)
        ->whereIn('category_id',$listcatid)
            ->orderBy('created_at','desc')
            ->paginate(9);
        return view("frontend.product_category",compact('list_product','row'));

    }
    public function product_detail($slug)
    {
        $product = Product::where([['status', '=' , 1],['slug','=',$slug]])->first();
        
        $listcatid=$this->getlistcategoryid($product->category_id);
        $list_product = Product::where([['status','=',1],['id','!=',$product->id]])
        ->whereIn('category_id',$listcatid)
            ->orderBy('created_at','desc')
            ->limit(3)
            ->get();
        return view("frontend.product_detail",compact('product','list_product'));
    }



    
//     public function product_detail($slug)
//     {
//         $args_product_detail = [
//             ['product.status', '!=', 0],
//             ['product.slug', $slug]
//         ];
//         $product = Product::where($args_product_detail)
//         ->join('category', 'category.id', '=', 'product.category_id')
//         ->join('brand', 'brand.id', '=', 'product.brand_id')
//         ->select('product.id', 'product.name', 'product.image', 'category.name as categoryname', 'brand.name as brandname', 'product.detail', 'product.price','product.slug','product.description','category.id as category_id','brand.id as brand_id')
//         ->orderBy('product.created_at', 'desc')
//         ->first();

//         if (!$product) {
//             abort(404); // Hoặc chuyển hướng đến trang 404 tùy chỉnh
//         }

//         $related_products = Product::where('product.status', '!=', 0)
//         ->where(function ($query) use ($product) {
//             $query->where('product.category_id', $product->category_id)
//                   ->orWhere('product.brand_id', $product->brand_id);
//         })
//         ->where('product.id', '!=', $product->id) // Loại trừ sản phẩm hiện tại
//         ->join('category', 'category.id', '=', 'product.category_id')
//         ->join('brand', 'brand.id', '=', 'product.brand_id')
//         ->select('product.id', 'product.name', 'product.image', 'category.name as categoryname', 'brand.name as brandname', 'product.detail', 'product.price', 'product.slug', 'product.pricesale')
//         ->orderBy('product.created_at', 'desc')
//         ->limit(4) 
//         ->get();

//         $list_product_new = Product::where('product.status', '!=', 0)
//         ->join('category', 'category.id', '=', 'product.category_id')
//         ->join('brand', 'brand.id', '=', 'product.brand_id')
// ->select('product.id', 'product.name', 'product.image', 'category.name as categoryname', 'brand.name as brandname','product.detail','product.price','product.slug','product.pricesale')
//         ->orderBy('product.created_at', 'desc')
//         ->limit(4)
//         ->get();
//         return view("frontend.product_detail",compact('product','list_product_new','related_products'));
//     }
}
