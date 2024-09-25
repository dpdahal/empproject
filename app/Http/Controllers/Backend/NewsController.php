<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends BackendController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!empty($request->search)) {
            $data['newsData'] = Blog::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->orWhereHas('category', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                })->get();

        } else {
            $data['newsData'] = Blog::all();
        }


        return view($this->_backend_page_path . 'news.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryData = Category::all();
        return view($this->_backend_page_path . 'news.create', compact('categoryData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/news/'), $image_name);
            $data['image'] = 'uploads/news/' . $image_name;
        }

        $data['user_id'] = auth()->user()->id;
        Blog::create($data);
        return redirect()->route('manage-news.index')->with('success', 'News created successfully');

    }

    public function deleteFile($id)
    {
        $blogData = Blog::findOrFail($id);
        $blogImage = $blogData->image;
        if (file_exists($blogImage) && is_file($blogImage)) {
            unlink($blogImage);
            return true;
        } else {
            return true;
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['blogData'] = Blog::findOrfail($id);
        return view($this->_backend_page_path . 'news.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['blogData'] = Blog::findOrfail($id);
        $data['categoryData'] = Category::all();
        return view($this->_backend_page_path . 'news.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,' . $id,
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/news/');
            if ($this->deleteFile($id) && $image->move($uploadPath, $image_name)) {
                $data['image'] = 'uploads/news/' . $image_name;
            } else {
                return redirect()->back()->with('error', 'Image not uploaded');
            }
        }
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($request->slug);
        Blog::find($id)->update($data);
        return redirect()->route('manage-news.index')->with('success', 'News updated successfully');


    }


    public function destroy(string $id)
    {
        $this->deleteFile($id);
        Blog::find($id)->delete();
        return redirect()->route('manage-news.index')->with('success', 'News deleted successfully');
    }
}
