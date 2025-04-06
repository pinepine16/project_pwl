@extends('layouts.index')

@section('content')
<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Create User</h3>
      </div>
    </div>

    <!-- <div class="card">
      <div class="card-header">
        <h4 class="card-title">Form Tambah User</h4>
      </div> -->

      <div class="card-body">
        <form method="POST" action="{{ route('userStore')}}">
          @csrf

          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
          </div>

          <div class="mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select class="form-select" name="role_id" id="role_id" required>
                <option value="" disabled selected>Pilih Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                @endforeach
            </select>
           </div>


           <div class="mb-3">   
                <label for="program_studi_id" class="form-label">Program Studi</label>
                <select class="form-select" name="program_studi_id" id="program_studi_id">
                    @foreach($program_studi as $prodi)
                        <option value="{{ $prodi->id }}">{{ $prodi->major_name }}</option>
                    @endforeach
                </select>
            </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('adminList') }}" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
