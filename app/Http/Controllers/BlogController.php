<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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
        $posts = DB::table('posts')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'categories.name AS categoryname', 'users.name AS username')
        ->get();

        $categories = DB::table('categories')->get();

        return view('blog.index', compact('title', 'posts', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost($id)
    {
        $title = "Blog Post Page";
        $post = DB::table('posts')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.*', 'categories.name AS categoryname', 'users.name AS username')
        ->where('posts.id', $id)
        ->first();

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
