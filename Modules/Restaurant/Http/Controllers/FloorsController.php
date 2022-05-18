<?php

namespace Modules\Restaurant\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FloorsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('restaurant::floors.index');
    }
    public function create()
    {
        return view('restaurant::floors.create');
    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('restaurant::floors.edit')->with('id', $id);
    }
}
