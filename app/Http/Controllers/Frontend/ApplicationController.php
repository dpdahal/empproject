<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class ApplicationController extends FrontendController
{

    public function index()
    {
        return view($this->page_path . 'home.home');
    }

    public function about()
    {
        return view($this->page_path . 'about.about');
    }

    public function contact()
    {
        return view($this->page_path . 'contact.contact');
    }
}
