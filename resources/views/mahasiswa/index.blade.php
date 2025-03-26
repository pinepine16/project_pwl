@extends('layouts.index')

@section('content')

<!--  Row 1 -->
<div class="row">
              <div>
                <h3 class="fw-bold mb-3">Dashboard Mahasiswa</h3>
              </div>
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title">Surat Mahasiswa</h4>
                  <a
                  class="btn btn-primary btn-round ms-auto" href="{{route('mahasiswaCreate')}}">
                  <i class="fa fa-plus"></i>
                  Add Data
                </a>
              </div>
            </div>

          <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Jenis Surat</th>
                          <th>Nama Surat</th>
                          <th>Status</th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Jenis Surat</th>
                          <th>Nama Surat</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach($mahasiswas as $mhs)
                        <tr>
                            <td>{{ $mhs->no }}</td>
                            <td>{{ $mhs->name }}</td>
                            <td>{{ $mhs->address }}</td>
                            <td>{{ $mhs->email }}</td>
                            <td>{{ $mhs->phone }}</td>
                            <td>{{ $mhs->birth_date }}</td>
                            <td>{{ $mhs->dosenWali->nik }} - {{ $mhs->dosenWali->name }}</td>
                            <td>
                                <div class="form-button-action">
                                    <button
                                        data-bs-toggle="tooltip"
                                        title="Student Detail"
                                        class="btn btn-link btn-success detail-data"
                                        data-original-title="Student Detail"
                                        data-url="{{ route('mahasiswaDetail', [$mhs->nrp]) }}"
                                    >
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                    <button
                                        data-bs-toggle="tooltip"
                                        title="Edit Student"
                                        class="btn btn-link btn-primary edit-data"
                                        data-original-title="Edit Student"
                                        data-url="{{ route('mahasiswaUpdate', [$mhs->nrp]) }}"
                                    >
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <form method="post" action="{{ route('mahasiswaDelete', [$mhs->nrp]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            data-bs-toggle="tooltip"
                                            title="Delete Student"
                                            class="btn btn-link btn-danger delete-data"
                                            data-original-title="Remove Student"
                                        >
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
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

@endsection

@section('ExtraJS')

@endsection