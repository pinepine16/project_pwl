<?php

namespace App\Http\Controllers;

use App\Models\lettertype;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letterTypes = LetterType::all();
        return view('dashboard', compact('letterTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(lettertype $lettertype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lettertype $lettertype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lettertype $lettertype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lettertype $lettertype)
    {
        //
    }
}
