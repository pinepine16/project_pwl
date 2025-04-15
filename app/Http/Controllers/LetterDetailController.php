<?php

namespace App\Http\Controllers;

use App\Models\letter_detail;
use Illuminate\Http\Request;

class LetterDetailController extends Controller
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
        //
    }

    public function skma()
    {
        return view ('surat.skma');
    }


    public function lhs()
    {
        return view ('surat.lhs');
    }

    public function sptmk()
    {
        return view ('surat.sptmk');
    }

    public function kl()
    {
        return view ('surat.kl');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function skmaStore(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:200',
            'semester' => 'required|string|max:2',
            'keperluan' => 'required|string|max:45',
            'kode_mk' => 'required|string|max:5',
            'nama_mk' => 'required|string|max:30',
            'topik' => 'required|string|max:45',
        ]);

        letter_detail::create([
            'alamat' => $request->alamat,
            'semester' => $request->semester,
            'keperluan' => $request->keperluan,
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'topik' => $request->topik,
        ]);
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Surat SKMA berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(letter_detail $letter_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(letter_detail $letter_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, letter_detail $letter_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(letter_detail $letter_detail)
    {
        //
    }
}
