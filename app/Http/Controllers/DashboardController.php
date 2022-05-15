<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        $users = User::all();
        $posts = Post::latest()->paginate(10);
        return view('dashboard',[
            'posts' => $posts,
            'categories' => $categories,
            'users' => $users,
        ]);
    }

    public function postDetails($id)
    {
        // dd($id);  
        $post = Post::find($id);
        $category_id = $post->category_id;
        $category = Category::find($category_id);
        return view('dashboard.postDetails',[
            'post' => $post,
            'category' => $category,
        ]);
    }

    public function category(Category $category)
    {
        $category_id = $category->id;
        $posts = DB::table('posts')
                        ->where('category_id',"=",$category_id)
                        ->get();
        // dd($posts);
        
        return view('dashboard.postsByCategory',[
            'category' => $category,
            'posts' => $posts,
        ]);

    }

    public function postsByUser(User $user)
    {
        $user_id = $user->id;
        $posts = Post::where('user_id',$user_id)->get();
        // dd($user->name);
        return view('dashboard.postsByUser',[
            'posts' => $posts,
            'user' => $user,
        ]);
    }
}
