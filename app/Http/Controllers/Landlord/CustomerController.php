<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('landlord.customer');
    }
    public function create()
    {
        return view('landlord.customer_create');
    }
}
