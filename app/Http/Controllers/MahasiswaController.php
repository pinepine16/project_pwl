<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\user;
use App\Models\letters;
use App\Models\lettertype;
use App\Models\letter_detail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('mahasiswa.index')
            -> with ('mahasiswas', Mahasiswa::all())
            -> with ('letters', Letters::all())
            -> with ('letter_detail', Letter_detail::all())
            -> with ('lettertype', Lettertype::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $users = User::all();
        return view ('mahasiswa.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =validator( $request->all(),[
            'address' => 'required|string|max:45',
            'nrp' => 'required |digits:7',
            'name' => 'required|string|max:45',
            'semester' => 'required|string|max:2',
            'user_id' => 'required|digits:7',
        ])->validate();
        
        $mahasiswa = new Mahasiswa($validatedData);
        $mahasiswa->save();
        return redirect(route('adminList'));
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
