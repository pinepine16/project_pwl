<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\letter_detail;
use App\Models\Letters;
use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    public function index()
    {
        $letters = letter_detail::with('mahasiswa.user')->get(); // ambil semua surat
        return view('kaprodi.letters.index', compact('letters'));
    }

    public function approve($id)
    {
        $letter = letter_detail::findOrFail($id);
        $letter->status = 'approved'; 
        $letter->save();

        return redirect()->back()->with('success', 'Surat berhasil di-approve.');
    }
}
