<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('mahasiswa.index')
            -> with ('mahasiswas', Mahasiswa::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =validator( $request->all(),[
            'id' => 'required|string|max:11|unique:mahasiswa,id',
            'address' => 'required|string|max:45',
            'name' => 'required|string|max:45',
            'semester' => 'required|string|max:2',
        ])->validate();
        $letter_detail = new letter_detail($validatedData);
        $letter_detail->save();
        return redirect(route('mahasiswaList'));
    }

    /**
     * Display the specified resource.
     */
    public function show(mahasiswa $mahasiswa)
    {
        $student = Mahasiswa::find( $mahasiswa->student_id );
      if ($student == null) {
        return back()->withErrors(['err_msg' => 'Student not found!']);
      }
      return view('Mahasiswa.detail')
        ->with('mahasiswa', $student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        //
    }
}
