<?php

namespace App\Http\Controllers;

use App\Models\letter_detail;
use App\Models\lettertype;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $lettertype = LetterType::where('letter_name', 'skma')->first();
        return view('surat.skma', ['lettertype_id' => $lettertype->id_type,
        'letterTypes' => LetterType::all()]);
    }


    public function lhs()
    {
        $lettertype = LetterType::where('letter_name', 'lhs')->first();
        return view('surat.skma', ['lettertype_id' => $lettertype->id_type,
        'letterTypes' => LetterType::all()]);
    }

    public function sptmk()
    {
        $lettertype = LetterType::where('letter_name', 'sptmk')->first();
        return view('surat.skma', ['lettertype_id' => $lettertype->id_type,
        'letterTypes' => LetterType::all()]);
    }

    public function kl()
    {
        $lettertype = LetterType::where('letter_name', 'kl')->first();
        return view('surat.skma', ['lettertype_id' => $lettertype->id_type,
        'letterTypes' => LetterType::all()]);
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

        // letter_detail::create([
        //     'alamat' => $request->alamat,
        //     'semester' => $request->semester,
        //     'keperluan' => $request->keperluan,
        //     'kode_mk' => $request->kode_mk,
        //     'nama_mk' => $request->nama_mk,
        //     'topik' => $request->topik,
        // ]);
        // return redirect()->route('mahasiswa.index')
        //     ->with('success', 'Surat SKMA berhasil dibuat.');

        $mahasiswa_id = Mahasiswa::where('user_id', auth()->id())->value('id');
        $uploaded_by = Auth::user()->name;

        DB::statement('CALL insert_letter_with_detail1(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->lettertype_id,
            $mahasiswa_id,
            auth()->user()->name,
            $request->alamat,
            $request->semester,
            $request->keperluan,
            $request->kode_mk,
            $request->nama_mk,
            $request->topik
        ]);

        return redirect()->back()->with('success', 'Pengajuan surat berhasil!');
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
