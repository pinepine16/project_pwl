@extends('layouts.index')

@section('content')

<div class="row">
    <div>
        <h3 class="fw-bold mb-3">Surat Keterangan Mahasiswa Aktif</h3>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Surat Mahasiswa</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('skmaStore') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input 
                        type="text" 
                        name="alamat" 
                        class="form-control" 
                        id="alamat" 
                        placeholder="e.g. Jl. Surya Sumantri" 
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input 
                        type="text" 
                        name="semester" 
                        class="form-control" 
                        id="semester" 
                        placeholder="e.g. 03" 
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="keperluan" class="form-label">Keperluan Pengajuan</label>
                    <input 
                        type="text" 
                        name="keperluan" 
                        class="form-control" 
                        id="keperluan" 
                        placeholder="Tulis keperluan pengajuan" 
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="kode_mk" class="form-label">kode_mk </label>
                    <input 
                        type="text" 
                        name="kode_mk" 
                        class="form-control" 
                        id="kode_mk" 
                        placeholder="Tulis kode_mk pengajuan" 
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="nama_mk" class="form-label">nama_mk </label>
                    <input 
                        type="text" 
                        name="nama_mk" 
                        class="form-control" 
                        id="nama_mk" 
                        placeholder="Tulis nama_mk pengajuan" 
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="topik" class="form-label">topik </label>
                    <input 
                        type="text" 
                        name="topik" 
                        class="form-control" 
                        id="topik" 
                        placeholder="Tulis topik pengajuan" 
                        required
                    />
                </div>

                <!-- <div class="text-end"> -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <!-- <button type="reset" class="btn btn-light">Cancel</button> -->
                <!-- </div> -->
            </form>
        </div>
    </div>
</div>

@endsection

@section('ExtraCSS')
<style>
    .btn-custom-blue {
        background-color: #003366 !important; /* Biru tua */
        color: white !important;
        border: none !important;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .btn-custom-blue:hover {
        background-color: #002244 !important;
    }

    .btn-custom-lightblue {
        background-color: #3399ff !important; /* Biru muda */
        color: white !important;
        border: none !important;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .btn-custom-lightblue:hover {
        background-color: #0073e6 !important;
    }
</style>
@endsection

@section('ExtraJS')
@endsection
