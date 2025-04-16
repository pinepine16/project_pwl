@extends('layouts.index')

@section('content')

<div class="row">
    <div>
        <h3 class="fw-bold mb-3">Dashboard Mahasiswa</h3>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Surat Mahasiswa</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="add-row" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Surat</th>
                            <th>Status</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswas as $index => $mhs)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mhs->letters->letter_name }}</td>
                            <td>
                                <span class="badge 
                                    {{ $mhs->status == 'Disetujui' ? 'bg-success' : 
                                       ($mhs->status == 'Ditolak' ? 'bg-danger' : 'bg-warning') }}">
                                    {{ $mhs->status }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a 
                                        href="{{ route('mahasiswaDetail', $mhs->id) }}" 
                                        class="btn btn-info btn-sm"
                                        data-bs-toggle="tooltip" title="Detail Mahasiswa">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('ExtraCSS')
<style>
    .btn-group .btn {
        margin-right: 5px;
    }
</style>
@endsection

@section('ExtraJS')
<script>
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
