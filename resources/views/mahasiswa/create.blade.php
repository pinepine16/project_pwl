@extends('layouts.index')

@section('content')
<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Lengkapi Data Berikut</h3>
      </div>
    </div>

    <!-- <div class="card">
      <div class="card-header">
        <h4 class="card-title">Form Tambah User</h4>
      </div> -->

      <div class="card-body">
        <form method="POST" action="{{ route('mahasiswaStore')}}">
          @csrf
          <div class="mb-3">
            <label for="nrp" class="form-label">NRP</label>
            <input type="text" name="nrp" class="form-control" id="id" placeholder="Masukkan NRP" value="{{ $newUser->id }}" readonly>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama" value="{{ $newUser->name }}" readonly>
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" name="address" class="form-control" id="password" placeholder="Masukkan alamat" required>
          </div>

          <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="text" name="semester" class="form-control" id="password" placeholder="Masukkan semester" required>
          </div>


          <!-- <div class="mb-3">
            <label for="id" class="form-label">User Id</label>
            <select class="form-control" name="user_id" id="dosen_nik">
                @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->id }}</option>
                @endforeach
            </select>
          </div> -->

          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('adminList') }}" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
