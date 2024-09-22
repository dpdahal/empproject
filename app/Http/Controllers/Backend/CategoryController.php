<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryData = Category::paginate(5);
        return view('backend.pages.category.index', compact('categoryData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);
        Category::create($data);
        return redirect()->route('manage-category.index')->with('success', 'Category created successfully.');
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
        $category = Category::find($id);
        return view('backend.pages.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'slug' => 'required|unique:categories,slug,' . $id,
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);
        Category::find($id)->update($data);
        return redirect()->route('manage-category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $totalBlog = Blog::where('category_id', $id)->count();
        if ($totalBlog > 0) {
            return redirect()->back()->with('error', 'This category has ' . $totalBlog . ' blogs. So, you can not delete this category.');
        } else {
            Category::find($id)->delete();
            return redirect()->back()->with('success', 'Category deleted successfully.');
        }
    }
}
