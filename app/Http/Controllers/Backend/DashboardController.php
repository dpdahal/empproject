<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class DashboardController extends BackendController
{

    public function index()
    {
        return view($this->_backend_page_path . 'dashboard.dashboard');
    }
}
