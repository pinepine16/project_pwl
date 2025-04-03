<?php

namespace App\Http\Controllers;

use App\Models\letters;
use Illuminate\Http\Request;

class lettersController extends Controller
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
            'alamat' => 'required|string|max:200',
            'semester' =>'required|string|max:2',
            'keperluan' => 'required|string|max:4',
            'kode_mk' => 'required|string|max:5',
            'nama_mk' => 'required|string|max:30',
            'topik' => 'required|string|max:45',
            'letters_id' => 'required|string',
        ])->validate();
        $surat = new Surat($validatedData);
        $surat->save();
        return redicted(route('suratKl'));
        
    
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
