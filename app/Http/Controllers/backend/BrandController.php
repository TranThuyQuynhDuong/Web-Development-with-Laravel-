<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBrandRequest;

class BrandController extends Controller
{
    public function index()
    {
        $list = Brand::where('brand.status','!=',0)
            ->select('brand.id','brand.name','brand.image','brand.slug')
            ->orderBy('brand.created_at','desc')
            ->get();
        $htmlsortorder = "";
        foreach ($list as $item){
            $htmlsortorder .= "<option value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
        }
        return view("backend.brand.index",compact("list","htmlsortorder"));   
    }

   public function store(StoreBrandRequest $request)
{
    try {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name, '-');
        $brand->sort_order = $request->sort_order;
        $brand->description = $request->description;
        $brand->created_by = Auth::id() ?? 1;
        $brand->status = $request->status;
        $brand->created_at = date('Y-m-d H:i:s');

        if ($request->hasFile('image')) {
            if (in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])) {
                $fileName = $brand->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/brand"), $fileName);
                $brand->image = $fileName;
            }
        }

        $brand->save();
        session()->flash('success', 'Thêm thương hiệu thành công.');
    } catch (\Exception $e) {
        session()->flash('error', 'Thêm thương hiệu thất bại, vui lòng nhập lại.');
    }

    return redirect()->route('admin.brand.index');
}

    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            session()->flash('error', 'Dữ liệu id của thương hiệu không tồn tại!');
            return view("backend.brand.index");
        }
        $list = Brand::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlsortorder = "";
        foreach ($list as $item){
            if ($brand->sort_order-1 == $item->sort_order) {
                $htmlsortorder .= "<option selected value='" . $item->sort_order . "'>Sau " . $item->name . "</option>";
            } else {   
                $htmlsortorder .= "<option value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.brand.edit",compact("htmlsortorder","brand"));
    }

    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            session()->flash('error', 'Dữ liệu id của thương hiệu không tồn tại!');
            return view("backend.brand.index");
        }

        try {
            $brand->name = $request->name;
            $brand->slug = Str::of($request->name)->slug('-');
            $brand->sort_order = $request->sort_order;
            $brand->description = $request->description;
            $brand->status = $request->status;

            if ($request->hasFile('image')) {
                if (in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])) {
                    $fileName = $brand->slug . '.' . $request->image->extension();
                    $request->image->move(public_path("images/brand"), $fileName);
                    $brand->image = $fileName;
                }
            }

            $brand->save();
            session()->flash('success', 'Cập nhật thương hiệu thành công.');
        } catch (\Exception $e) {
            session()->flash('error', 'Cập nhật thương hiệu thất bại, vui lòng nhập lại.');
        }

        return redirect()->route('admin.brand.index');
    }
}