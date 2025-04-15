<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Letter;

class KaprodiController extends Controller
{
    public function index() 
    {
        return view ('kaprodi.index')
            -> with ('mahasiswas', Mahasiswa::all());
    }
}
