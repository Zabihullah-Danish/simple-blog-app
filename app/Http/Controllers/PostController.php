<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $user_id = Auth::user()->id;

            // dd($user_id);
            $posts = Post::latest()->where('user_id',$user_id)->get();
            $trashedPost = Post::where('user_id',$user_id)->onlyTrashed()->get();
            return view('posts.index',compact('posts','trashedPost'));
        }
        else
        {
            return view('posts.notAuthorized');
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filename = date('Y-m-d') . "." . rand(100000,1000000) . "." . $extension;
            $file->storeAs('public/post_images',$filename);
        }

        Post::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'content' => $request->content,
            'post_image' => $filename,
        ]);

        return redirect(route('posts.index'))->with('message','Post Added Successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $category = Category::find($post->category_id);
        // dd($category->name);
        return view('posts.show',compact('post','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $category_id = $post->category_id;
        $category = Category::find($category_id);
        $categories = Category::all();
        return view('posts.edit',compact('post','category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->hasFile('photo'))
        {
            $destination = 'storage/post_images/'. $post->post_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filename = date('Y-m-d') . "." . rand(100000,1000000) . "." . $extension;
            $file->storeAs('public/post_images',$filename);
        }
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->post_image = $filename;

        $post->update();
        return redirect()->back()->with('message','Post Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
    
        $post->delete();
        return redirect()->back()->with('delete','Posts Deleted.');
    }

    public function trashedPost($post)
    {
        
        $trashedpost = Post::onlyTrashed()->find($post);
        // dd($trashedpost);
        $trashedpost->restore();

        return redirect()->back();
    }
}
