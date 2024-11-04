<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $list = Post::where('status', '!=', 0)
            ->select('post.id', 'post.topic_id', 'post.title', 'post.slug','post.detail','post.image','post.type', 'post.description')
            ->orderBy('post.created_at', 'desc')
            ->get();

        // Lấy danh sách topic
        $topics = Topic::select('topic.id', 'topic.name')->get();
        return view("backend.post.index", compact("list", "topics"));   
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        
        $post->topic_id = $request->topic_id;
        $post->slug = Str::of($request->title)->slug('-');
        $post->description = $request->description;
        $post->detail = $request->detail;
        $post->type = $request->type;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1; // Default to 1 if Auth::id() is null
        $post->status = $request->status;
        $post->updated_at = now(); // Sử dụng hàm now() để lấy thời gian hiện tại
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $post->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/posts"), $fileName);
                $post->image = $fileName;
            }
        }
        $post->save();

        return redirect()->route('admin.post.index');
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
        $post = Post::find($id);
        if($post == null)
        {
            session()->flash('error', 'Dữ liệu id của danh mục không tồn tại!');
            return view("backend.post.index");
        }
        $list = Post::where('post.status', '!=', 0)
            ->select('post.id', 'post.title', 'post.image', 'post.slug')
            ->orderBy('post.created_at', 'desc')
            ->get();
            $topics = Topic::where('status', '!=', 0)
            ->select('topic.id', 'topic.name' )
            ->get();
            // ->pluck('name', 'id');
            $htmltopics = "";
            foreach ($topics as $item) {
                if($post->topic_id == $item->id){
                    $htmltopics .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
                }
                else{
                    $htmltopics .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
                }
            }

        $htmlparentId = "";
        $htmlsortOrder = "";
        foreach ($list as $item) {
            if($post->parent_id == $item->id){
                $htmlparentId .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            }
            else{
                $htmlparentId .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }

            if($post->sort_order-1 == $item->sort_order){
                $htmlsortOrder .= "<option selected value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            }
            else{
                $htmlsortOrder .= "<option value='" . ($item->sort_order + 1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.post.edit", compact("post", "htmlparentId", "htmlsortOrder","topics","htmltopics"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if($post==null){
            //chuyen trang va bao loi
        }
        $post->topic_id = $request->topic_id; //form
        $post->title = $request->title; //form
        $post->slug = Str::of($request->title)->slug('-');
        $post->detail = $request->detail; //form
        if($request->hasFile('image')){
            if(in_array($request->image->extension(), ["jpg", "png", "webp", "gif"])){
                $fileName = $post->slug . '.' . $request->image->extension();
                $request->image->move(public_path("images/posts"), $fileName);
                $post->image = $fileName;
            }
        }
        $post->type = $request->type; //form
        $post->description = $request->description; //form
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = 1;
        $post->status = $request->status; //form
        $post->save(); //Luuu vao CSDL
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
