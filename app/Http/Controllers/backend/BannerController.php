<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBannerRequest;

class BannerController extends Controller
{
    public function index()
    {
        $list = Banner::where('banner.status','!=',0)
        ->select('banner.id','banner.name','banner.link','banner.image')
        ->orderBy('banner.created_at','desc')
        ->get();
        $htmlposition = "";
        foreach ($list as $item){
            $htmlposition .= "<option value='" . ($item->position+1) . "'>Sau " . $item->name . "</option>";
        }
        return view("backend.banner.index",compact("list","htmlposition"));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->slug = Str::of($request->name)->slug('-');
        $banner->link = $request->link;
        $banner->position=$request->position;
        $banner->description =$request->description;
        $banner->created_by =Auth::id()??1; //Cái này là nếu có id của người tạo thì nó lấy id còn không có thì để mặc định là 1
        $banner->status = $request->status;
        $banner->created_at =date('Y-m-d H:i:s');

        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $currentDateTime = now()->format('YmdHis');
                $fileName = $currentDateTime . '.' . $request->image->extension();
                $request->image->move(public_path("images/banner"), $fileName);
                $banner->image = $fileName;
            }
        }

        $banner->save();
        return redirect()->route('admin.banner.index');
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
        $banner = Banner::find($id);
        if($banner == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.banner.index");
        }
        $list = Banner::where('banner.status', '!=', 0)
            ->select('banner.id', 'banner.name', 'banner.image', 'banner.slug', 'banner.position')
            ->orderBy('banner.created_at', 'desc')
            ->get();
     
        $htmlposittion = "";
        foreach ($list as $item) {
            $itemPosition = intval($item->position);
            if ($banner->position - 1 == $itemPosition) {
                $htmlposittion .= "<option selected value='" . ($itemPosition + 1) . "'>Sau " . $item->name . "</option>";
            } else {
                $htmlposittion .= "<option value='" . ($itemPosition + 1) . "'>Sau " . $item->name . "</option>";
            }
        }
        
        return view("backend.banner.edit", compact("banner",  "htmlposittion"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $banner = Banner::findOrFail($id);

    try {
        $banner->name = $request->name;
        $banner->description = $request->description;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->status = $request->status;

        if ($request->hasFile('image')) {
            if (in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])) {
                $fileName = $banner->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/banner"), $fileName);
                $banner->image = $fileName;
            }
        }

        $banner->save();
        session()->flash('success', 'Cập nhật thương hiệu thành công.');
    } catch (\Exception $e) {
        session()->flash('error', 'Cập nhật thương hiệu thất bại, vui lòng nhập lại.');
    }

    return redirect()->route('admin.banner.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
