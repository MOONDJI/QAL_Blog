<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\{Category, Post};

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title="Posts";
        $subtitle="Menagement posts";
        // $posts = Post::all();
        $posts = Post::paginate(10);
        // $posts = DB::table('posts')->orderBy('id', 'desc')->get();

        // $posts = DB::table('posts')->latest()->get();

        // $posts = DB::table('posts')->where('id', '<', 10)->get();

        // $posts = DB::table('posts')->where([
        //     ['status', '=', 1],
        //     ['title', 'like', 'A%'],
        // ])->get();

        return view('admin.posts.index', compact('posts', 'title', 'subtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('posts')->insert([
            'title' => $request['title'],
            'content' => $request['content'],
            'category_id' => $request['category'],
            'user_id' => 1,
            'created_at' => now()
        ]);

        // $post->create_at = "2020-11-11 20:20:20";
        // $post->save(['timestamp' => false]);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::table('posts')->where('id', $id)->first(); //более правильный по sql запросу
        // $post = DB::table('posts')->find($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        $post = DB::table('posts')->where('id', $id)->first();
        return view('admin.posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('posts')->where('id', $id)
        ->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'category_id' => $request['category'],
            'updated_at' => now()
        ]);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        // DB::table('posts')->where('id', $id)->delete();

        return redirect(route('admin.posts.index'));
    }

    public function trashed()
    {
        $title="Posts";
        $subtitle="Menagement trashed posts";
        $posts = Post::onlyTrashed()->paginate(5);

        return view('admin.posts.trashed', compact('posts', 'title', 'subtitle'));
    }

    public function restore($id)
    {
        // $title="Posts";
        // $subtitle="Menagement trashed posts";
        // $posts = Post::onlyTrashed()->paginate(5);
        Post::withTrashed()
        ->where('id', $id)
        ->first();

        return view('admin.posts.trashed', compact('posts', 'title', 'subtitle'));
    }
}
