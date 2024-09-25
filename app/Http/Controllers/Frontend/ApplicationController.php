<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog\Blog;
use Illuminate\Http\Request;

class ApplicationController extends FrontendController
{

    public function index()
    {
        $data['newsData'] = Blog::orderBy('id', 'desc')->limit(50)->get();
        return view($this->page_path . 'home.home', $data);
    }

    public function about()
    {
        return view($this->page_path . 'about.about');
    }

    public function contact()
    {
        return view($this->page_path . 'contact.contact');
    }

    public function news($slug = '')
    {
        if (!empty($slug)) {
            $blog = Blog::where('slug', $slug)->first();
            $data['newsData'] = $blog;
            $category_id = $blog->category_id;
            $data['relatedNews'] = Blog::where('category_id', $category_id)->where('id', '!=', $blog->id)->orderBy('id', 'desc')->limit(100)->get();
            return view($this->page_path . 'news.details', $data);
        } else {
            $data['newsData'] = Blog::orderBy('id', 'desc')->limit(100)->get();
            return view($this->page_path . 'news.index', $data);
        }

    }

    public function category($slug = '')
    {
        if (!empty($slug)) {
            $data['newsData'] = Blog::where('category_id', $slug)->orderBy('id', 'desc')->limit(100)->get();
            return view($this->page_path . 'news.index', $data);
        } else {
            return redirect()->route('index');
        }
    }

    public function search(Request $request)
    {
        $data['newsData'] = Blog::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->orWhereHas('category', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })->get();
        return view($this->page_path . 'news.index', $data);
    }
}
