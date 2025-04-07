@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Surat Mahasiswa</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Jenis Surat</th>
                <th>Status</th>
                <th>Tanggal Diajukan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($letters as $index => $letter)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $letter->mahasiswa->name ?? '-' }}</td>
                    <td>{{ $letter->mahasiswa->user->id ?? '-' }}</td>
                    <td>{{ $letter->mahasiswa->user->program_studi->major_name ?? '-' }}</td>
                    <td>{{ $letter->lettertype->letter_name ?? '-' }}</td>
                    <td>
                        @if($letter->status == 'approved')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif($letter->status == 'rejected')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        @endif
                    </td>
                    <td>{{ $letter->created_at ? $letter->created_at->format('d-m-Y') : '-' }}</td>
                    <td>
                        @if($letter->status == 'pending')
                            <form action="{{ route('kaprodi.letters.approve', $letter->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                            </form>

                            <form action="{{ route('kaprodi.letters.reject', $letter->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                            </form>
                        @else
                            <em>Tidak tersedia</em>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada surat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
