<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class AdminController extends Controller
{   
    public function index()
    {
        return view ('admin.index')
            -> with ('admins', user::all());
    }

    public function create()
    {
        return view ('admin.create');
    }

    public function store(Request $request)
    {
        
    }
}