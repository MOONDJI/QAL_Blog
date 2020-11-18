<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Blog Page";
        // $posts = DB::table('posts')
        // ->join('categories', 'categories.id', '=', 'posts.category_id')
        // ->join('users', 'users.id', '=', 'posts.user_id')
        // ->select('posts.*', 'categories.name AS categoryname', 'users.name AS username')
        // ->get();

        // $categories = DB::table('categories')->get();

        // $posts = Post::where('status', 1)
        // ->with('category')
        // ->with('user')
        // ->get();

        $posts = Post::with('user')
        ->with('category')
        ->with('tags')
        ->get();
        // $posts = Post::all();
        // return dd($post);
        return view('blog.index', compact('title', 'posts'));
    }

    public function postsByUser($id)
    {
        $title = "Blog Page";
        $posts = Post::where('user_id', $id)->with('user')->with('category')->get();

        // dd($posts);
        return view('blog.index', compact('title', 'posts'));
    }

    public function postsByCategory($id)
    {
        $title = "Blog Page";
        $posts= Post::where('category_id', $id)
        ->with('user')
        ->with('category')
        ->orderBy('created_at', 'desc')
        ->get();

        // dd($posts);
        return view('blog.index', compact('title', 'posts'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost($slug)
    {
        if(is_numeric($slug)){
            $post = Post::findOrFail($slug)
            ->with('user')
            ->with('category')
            ->with('tags')
            ->firstOrFail();
            return redirect(route('blog.post', $post->slug), 301);
        }

        $title = "Blog Post Page";
        $post = Post::whereSlug($slug)
        ->with('user')
        ->with('category')
        ->with('tags')
        ->firstOrFail();
        // $post = DB::table('posts')
        // ->join('categories', 'categories.id', '=', 'posts.category_id')
        // ->join('users', 'users.id', '=', 'posts.user_id')
        // ->select('posts.*', 'categories.name AS categoryname', 'users.name AS username')
        // ->where('posts.id', $id)
        // ->first();
        // $post->with('tags')->with('categories');
        // dd($post);
        return view('blog.showPost', compact('title', 'post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCategory($id)
    {
        $title = "Blog Category Page";
        $category = DB::table('categories')->where('id', $id)->first();

        return view('blog.showCategory', compact('title', 'category'));
    }

}
