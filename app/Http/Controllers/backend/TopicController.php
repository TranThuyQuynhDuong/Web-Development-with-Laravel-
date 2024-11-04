<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTopicRequest;

class TopicController extends Controller
{
    public function index()
    {
        $list = Topic::where('topic.status','!=',0)
        ->select('topic.id','topic.name','topic.slug','topic.description')
        ->orderBy('topic.created_at','desc')
        ->get();
        $htmlsortorder = "";
        foreach ($list as $item){
            $htmlsortorder .= "<option value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
        }
        return view("backend.topic.index",compact("list","htmlsortorder"));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
      
        $topic->description =$request->description;
        $topic->created_by =Auth::id()??1; //Cái này là nếu có id của người tạo thì nó lấy id còn không có thì để mặc định là 1
        $topic->status = $request->status;
        $topic->created_at =date('Y-m-d H:i:s');
        $topic->save();
        return redirect()->route('admin.topic.index');
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
        $topic = Topic::find($id);
        if($topic == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.topic.index");
        }
        $list = Topic::where('topic.status', '!=', 0)
            ->select('topic.id', 'topic.name', 'topic.slug', 'topic.description')
            ->orderBy('topic.created_at', 'desc')
            ->get();
        $htmlsortorder = "";
            foreach ($list as $item) {
                if($topic->sort_order-1 == $item->sort_order){
                    $htmlsortorder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
                }
                else{
                    $htmlsortorder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
                }
            }
        return view("backend.topic.edit", compact("topic", "htmlsortorder"));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = Topic::find($id);
        if($topic==null){
            session()->flash('error', 'Dữ liệu id của topic không tồn tại!');
            return view("backend.topic.index");
        }
        $topic -> name=$request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic -> sort_order = $request->sort_order;
        $topic -> description = $request->description;
        $topic -> created_at = date('Y-m-d H:i:s');
        $topic -> created_by = Auth::id()??1;
        $topic -> status =$request -> status;
        $topic->save();
        $request->session()->flash('success', 'sửa thành công.');
        return redirect()->route('admin.topic.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
