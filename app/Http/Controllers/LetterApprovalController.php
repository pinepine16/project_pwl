<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use App\Models\letter_detail;
use Illuminate\Http\Request;
use App\Models\Letters;
use App\Models\Mahasiswa;

class LetterApprovalController extends Controller
{
    public function index()
    {
        $letters = letter_detail::with('mahasiswa.user')->orderBy('created_at', 'desc')->get();
        return view('kaprodi.letters.index', compact('letters'));
    }

    public function approve($id)
    {
        $letter = letter_detail::findOrFail($id);
        $letter->status = 'approved';
        $letter->save();

        return redirect()->route('kaprodi.letters.index')->with('success', 'Surat berhasil disetujui.');
    }

    public function reject($id)
    {
        $letter = letter_detail::findOrFail($id);
        $letter->status = 'rejected';
        $letter->save();

        return redirect()->route('kaprodi.letters.index')->with('error', 'Surat ditolak.');
    }
}
