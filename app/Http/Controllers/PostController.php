<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();
        $query = Post::query();

    if ($name = $request->query('title')) {
        $query->where('title', 'LIKE', "%{$name}%");
    }

     $posts = $query->paginate(1);


     return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
       $path = $this->uploadImage($request->file('image') , 'images');
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'image' => $path
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post = Post::findorfail($post);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $post = Post::find($post);
        $users = User::all();
        return view('posts.edit',compact('post','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        if ($request->hasFile('image')) {
            $path = $this->uploadImage($request->file('image') , 'images', $post->image);
        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
           'user_id' => $request->user_id,
            'image' => (isset($path)) ? $path : $post->image
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }
        return redirect()->route('posts.index');
    }
}
