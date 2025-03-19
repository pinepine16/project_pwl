@extends('layouts.index')

@section('content')

<!--  Row 1 -->
<div class="row">
        <div>
          <h3 class="fw-bold mb-3">Form Mahasiswa</h3>
        </div>
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Surat Mahasiswa</h4>
            <!-- <a
            class="btn btn-primary btn-round ms-auto" href="{{route('mahasiswaCreate')}}">
            <i class="fa fa-plus"></i>
            Add Data
            </a> -->
          </div>
        </div>
        <div class="card-body">
                    <div class="row">
                        <form method="POST" action="{{ route('mahasiswaStore')}}" >
                            @csrf
                            <div>
                              <label for="surat">Pilih Jenis Surat</label>
                              <select name="" id="">
                                <option value=""></option>
                                <option value="">surat keterangan mahasiswa aktif</option>
                                <option value="">surat pengantar tugas mata kuliah</option>
                                <option value="">Surat keterangan lulus</option>
                                <option value="">surat laporan hasil studi</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input
                                    type="text"
                                    name = "alamat"
                                    class="form-control"
                                    id="alamat"
                                    placeholder="e.g. Jl.Surya Sumantri"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    name = "name"
                                    class="form-control"
                                    id="name"
                                    placeholder="e.g. John Doe"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Birth Date</label>
                                <input
                                    type="date"
                                    name = "birth_date"
                                    class="form-control"
                                    id="birth_date"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    name = "email"
                                    class="form-control"
                                    id="email"
                                    placeholder="e.g. xxx@gmail.com"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input
                                    type="text"
                                    name = "semester"
                                    class="form-control"
                                    id="semester"
                                    placeholder="e.g. 03"
                                    required
                                />
                                <div class="form-group">
                                <label for="keperluan pengajuan">Keperluan Pengajuan</label>
                                <input
                                    type="text"
                                    name = "keperluan_pengajuan"
                                    class="form-control"
                                    id="keperluan_pengajuan"
                                    placeholder=""
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="kode <L">Kode MK</label>
                                <input
                                    type="kode MK"
                                    name = "kode MK"
                                    class="form-control"
                                    id="email"
                                    placeholder="e.g. IN241"
                                    required
                                />
                                <div class="form-group">
                                <label for="nama MK">Nama MK</label>
                                <input
                                    type="text"
                                    name = "nama_mk"
                                    class="form-control"
                                    id="email"
                                    placeholder="e.g. Algoritma Struktur Data"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="tujuan">Tujuan</label>
                                <input
                                    type="text"
                                    name = "tujuan"
                                    class="form-control"
                                    id="email"
                                    placeholder="e.g. xxx@gmail.com"
                                    required
                                />
                            </div>
                            </div>
                            </div>
                            <div class="card-action">
                                <input type="submit" class="btn btn-success">
                                <input type="reset" class="btn btn-danger" value="Cancel">
                            </div>
                        </form>

                    </div>
                </div>
    </div>
        
        

@endsection

@section('ExtraCSS')

@endsection

@section('ExtraJS')

@endsection