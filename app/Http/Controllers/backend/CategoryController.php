<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::where('category.status','!=',0)
        ->select('category.id','category.name','category.image','category.slug')
        ->orderBy('category.created_at','desc')
        ->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $item){
            $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            $htmlsortorder .= "<option value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
        }
        return view("backend.category.index",compact("list","htmlparentid","htmlsortorder"));   
    }

  
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
       

        try {
            $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->parent_id =$request->parent_id;
        $category->sort_order =$request->sort_order;
        $category->description =$request->description;
        $category->created_at =date('Y-m-d H:i:s');
        $category->created_by =Auth::id()??1; //Cái này là nếu có id của người tạo thì nó lấy id còn không có thì để mặc định là 1
        $category->status = $request->status;
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $category->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/categories"), $fileName);
                $category->image = $fileName;
            }
        }
        $category->save();
            session()->flash('success', 'Thêm danh mục thành công.');
        } catch (\Exception $e) {
            session()->flash('error', 'Thêm bị thất bại, vui lòng nhập lại.');
        }
        
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::find($id);
        if($category==null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.category.index");
        }
        $list=Category::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $item){
            if($category->parent_id==$item->id)
            {
                $htmlparentid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            }
            else
            {
                $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
            if($category->sort_order-1==$item->sort_order)
            {
                $htmlsortorder .= "<option selected value='" . $item->sort_order . "'>" . $item->name . "</option>";
            }
            else
            {   
                $htmlsortorder .= "<option value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.category.edit",compact("htmlparentid","htmlsortorder","category"));       }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if($category==null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.category.index");
        }
       
        
        try {
            // Cập nhật thông tin category hiện tại
            $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->parent_id =$request->parent_id;
        $category->sort_order =$request->sort_order;
        $category->description =$request->description;
        $category->created_at =date('Y-m-d H:i:s');
        $category->created_by =Auth::id()??1; //Cái này là nếu có id của người tạo thì nó lấy id còn không có thì để mặc định là 1
        $category->status = $request->status;
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $category->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/categories"), $fileName);
                $category->image = $fileName;
            }
        }
        $category->save();
            session()->flash('success', 'Cập nhật danh mục thành công.');
        } catch (\Exception $e) {
            session()->flash('error', 'Cập nhật bị thất bại, vui lòng nhập lại.');
        }
        return redirect()->route('admin.category.index');
       }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
