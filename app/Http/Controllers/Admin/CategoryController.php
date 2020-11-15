<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Categories";
        $subtitle = "Menegment categories";
        // $categories = DB::table('categories')->get();
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories', 'title', 'subtitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Category";
        $subtitle = "Edit categiry";
        return view('admin.categories.create', compact('title', 'subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::table('categories')->insert([
        //     'name' => $request['name'],
        //     'description' => $request['description'],
        //     'created_at' => now()
        // ]);
        Category::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'created_at' => now()
        ]);

        return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $title = "Category";
        $subtitle = "Waching categiry";
        // $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.categories.show', compact('category', 'title', 'subtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $title = "Category";
        $subtitle = "Edit categiry";
        // $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.categories.edit', compact('category', 'title', 'subtitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // DB::table('categories')
        // ->where('id', $id)
        // ->update([
        //     'name' => $request['name'],
        //     'description' => $request['description'],
        //     'updated_at' => now()
        // ]);

        $category->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'updated_at' => now()
        ]);

        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // DB::table('categories')->delete($id);
        $category->delete();
        return redirect(route('admin.categories.index'));
    }

    public function trashed()
    {
        $title="Categories";
        $subtitle="Menagement trashed categories";
        $categories = Category::onlyTrashed()->paginate(5);

        return view('admin.categories.trashed', compact('title', 'subtitle', 'categories'));
    }

    public function restore($id)
    {
        Category::withTrashed()
        ->where('id', $id)
        ->first()
        ->restore();

        return redirect(route('admin.categories.index'));
    }

    public function force($id)
    {
        Category::withTrashed()
        ->where('id', $id)
        ->first()
        ->forceDelete();

        return redirect(route('admin.categories.index'));
    }
}
