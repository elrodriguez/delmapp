<?php

namespace Modules\Restaurant\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AttendController extends Controller
{

    public function index()
    {
        return view('restaurant::attend.index');
    }

    public function attend()
    {
        return view('restaurant::attend.attend');
    }
    public function deliveries()
    {
        return view('restaurant::attend.deliveries');
    }
    public function deliveriesCreate()
    {
        return view('restaurant::attend.deliveries_create');
    }
}
