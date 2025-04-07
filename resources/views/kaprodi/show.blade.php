@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Surat</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama Mahasiswa:</strong> {{ $letter->mahasiswa->name }}</p>
            <p><strong>Jenis Surat:</strong> {{ $letter->lettertype->letter_name }}</p>
            <p><strong>Status:</strong> {{ ucfirst($letter->status) }}</p>
            <p><strong>Diunggah oleh:</strong> {{ $letter->uploaded_by }}</p>
        </div>
    </div>

    <div class="mt-4">
        @if($letter->status !== 'approved')
            <form action="{{ route('kaprodi.approve', $letter->id) }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-success">Approve</button>
            </form>
        @endif

        @if($letter->status !== 'rejected')
            <form action="{{ route('kaprodi.reject', $letter->id) }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-danger">Reject</button>
            </form>
        @endif

        <a href="{{ route('kaprodi.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
