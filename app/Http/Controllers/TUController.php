<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswa;


class TUController extends Controller
{
    public function index()
    {
        return view ('tu.index')
            -> with ('mahasiswas', Mahasiswa::all());
    }
}
