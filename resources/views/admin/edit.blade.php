@extends('layouts.index')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Manage Data User</h3>
          <h6 class="op-7 mb-2">Edit Informasi User</h6>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Edit Data User</h4>
          </div>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('userUpdate', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
              <label for="password">Password </label>
              <input type="password" class="form-control" name="password" id="password" maxlength="8" placeholder="Isi jika ingin mengganti password">

            </div>

            <div class="form-group">
              <label for="role_id">Role</label>
              <select class="form-control" name="role_id" id="role_id" required>
                @foreach ($roles as $role)
                  <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                    {{ $role->role_name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="program_studi_id">Program Studi</label>
              <select class="form-control" name="program_studi_id" id="program_studi_id">
                <option value="">-- Tidak Ada --</option>
                @foreach ($programs as $program)
                  <option value="{{ $program->id }}" {{ $user->program_studi_id == $program->id ? 'selected' : '' }}>
                    {{ $program->major_name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="card-action mt-3">
              <button type="submit" class="btn btn-success">Simpan</button>
              <a href="{{ route('adminList') }}" class="btn btn-danger">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
