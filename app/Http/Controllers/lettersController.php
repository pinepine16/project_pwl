<?php

namespace App\Http\Controllers;

use App\Models\letters;
use Illuminate\Http\Request;

class LettersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validatedData = validator($request -> all(),[
            'status' => 'required|string|max:',
            'uploaded_by' => 'nullable|string|max:10',
            'lettertype_id_type' => 'required|string|max:10',
            'mahasiswa_id' => 'required|string|max:7',
        ])->validate();
        $letters = new Letters($validatedData);
        $letters->save();
        return redicted(route('adminList'));
        
    
    }

    /**
     * Display the specified resource.
     */
    public function show(letters $letters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(letters $letters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, letters $letters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(letters $letters)
    {
        //
    }
}
