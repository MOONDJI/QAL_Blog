<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\{Category, Post, Tag};
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
// use Illuminate\Support\Facades\Image;
// use Image;

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
        $title="Post";
        $subtitle="Create post";
        // $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name', 'id');
        return view('admin.posts.create', compact('categories', 'tags', 'title', 'subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::table('posts')->insert([
        //     'title' => $request['title'],
        //     'content' => $request['content'],
        //     'category_id' => $request['category'],
        //     'user_id' => 1,
        //     'created_at' => now()
        // ]);

        // $post->create_at = "2020-11-11 20:20:20";
        // $post->save(['timestamp' => false]);

        // dd($request);
        $post = Post::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'category_id' => $request['category_id'],
            'user_id' => 1,
            'cover' => $this->uploadImage($request->file('cover')),
        ]);
        $post->tags()->sync($request->input('tags', []));

        return redirect(route('admin.posts.index'));
    }

    public function uploadImage(UploadedFile $file)
    {
        $img = Image::make($file);
        $filename = time().'.'.$file->getClientOriginalName();
        $originalPath = 'app/public/covers/blog';

        $img->resize(520, 250, function($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path($originalPath).'/'.$filename);

        $img->resize(250, 125, function($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path($originalPath).'/thumbnail/'.$filename);

        return $filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = DB::table('posts')->where('id', $id)->first(); //более правильный по sql запросу
        // $post = DB::table('posts')->find($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        // $post = DB::table('posts')->where('id', $id)->first();
        // return view('admin.posts.edit', compact('categories', 'post'));

        $title = "Post";
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('name', 'id');
        $post->load('tags');
        return view('admin.posts.edit', compact('categories', 'tags', 'post', 'title'));
        // return dd($post);
        // ->withCategories($categories)->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // dd($request);

        $post->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'category_id' => $request['category_id'],
            'updated_at' => now(),
            'cover' => $this->uploadImage($request->file('cover')),
            ]);

        $post->tags()->sync($request->input('tags', []));
        // DB::table('posts')->where('id', $id)
        // ->update([
        //     'title' => $request['title'],
        //     'content' => $request['content'],
        //     'category_id' => $request['category'],
        //     'updated_at' => now()
        // ]);

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
        $post->tags()->detach();
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
        Post::withTrashed()
        ->where('id', $id)
        ->first()
        ->restore();

        return redirect(route('admin.posts.index'));
    }

    public function force($id)
    {
        Post::withTrashed()
        ->where('id', $id)
        ->first()
        ->forceDelete();

        return redirect(route('admin.posts.index'));
    }
}
