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