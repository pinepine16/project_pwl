@extends('layouts.index')

@section('content')

<div class="row">
    <div>
        <h3 class="fw-bold mb-3">Surat Keterangan Lulus</h3>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Surat Mahasiswa</h4>
        </div>
        
        <div class="card-body">
            <form action="{{ route('skmaStore') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input 
                        type="text" 
                        name="nim" 
                        class="form-control" 
                        id="nim" 
                        required
                        value={{ Auth::user()->id}}
                    />
                </div>
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control" 
                        id="name" 
                        required
                        value={{ Auth::user()->name}}
                    />
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
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
