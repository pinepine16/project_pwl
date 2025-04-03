@extends('layouts.index')

@section('content')

<div class="row">
    <div>
        <h3 class="fw-bold mb-3">Surat Pengantar Tugas Mata Kuliah</h3>
    </div>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Surat Mahasiswa</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="#">
                @csrf
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input 
                        type="text" 
                        name="nim" 
                        class="form-control" 
                        id="nim" 
                        placeholder="e.g. 2372001" 
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control" 
                        id="name" 
                        placeholder="e.g. John Doe" 
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                    <input 
                        type="text" 
                        name="kode_mk" 
                        class="form-control" 
                        id="kode_mk" 
                        placeholder="e.g. IN241" 
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                    <input 
                        type="text" 
                        name="nama_mk" 
                        class="form-control" 
                        id="nama_mk" 
                        placeholder="e.g. Algoritma Struktur Data" 
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="tujuan" class="form-label">Tujuan</label>
                    <input 
                        type="text" 
                        name="tujuan" 
                        class="form-control" 
                        id="tujuan" 
                        placeholder="e.g. xxx@gmail.com" 
                        required
                    />
                </div>

                <div class="mb-3">
                    <label for="topik" class="form-label">Topik</label>
                    <input 
                        type="text" 
                        name="topik" 
                        class="form-control" 
                        id="topik" 
                        placeholder="Tulis topik tugas"
                        required
                    />
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </div>
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
