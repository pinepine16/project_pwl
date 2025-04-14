@extends('layouts.index')

@section('content')

<div class="row">
    <div>
        <h3 class="fw-bold mb-3 text-center">Dashboard Admin</h3>
    </div>
    <div class="card">
        <div class="card-header text-center">
            <h4 class="card-title">Users</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="add-row" class="table table-striped table-hover text-center align-middle">
                    <thead class="table">
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Program Studi</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $adm)
                        <tr>
                            <td>{{ $loop->iteration }}</td> 
                            <td>{{ $adm->id }}</td>
                            <td>{{ $adm->name }}</td>
                            <td>{{ $adm->role->role_name }}</td>
                            <td>{{ $adm->programStudi->major_name }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a
                                        href="{{ route('userUpdate', [$adm->id]) }}"
                                        class="ti ti-edit"
                                        data-bs-toggle="tooltip"
                                        title="Edit User"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a
                                        href="{{ route('userDelete', [$adm->id]) }}"
                                        class="ti ti-trash"
                                        data-bs-toggle="tooltip"
                                        title="Edit User"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')"
                                    >
                                        <i class="fas fa-trash-alt"></i>
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
<script src="{{ asset('assets/js/plugin/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    $("#table-student").DataTable({
        pageLength: 25,
    });
    $('.detail-data').click(function () {
        window.location.href = $(this).data('url');
    })
    $('.edit-data').click(function () {
        window.location.href = $(this).data('url');
    })
    $('.delete-data').click(function (e) {
        e.preventDefault()
        Swal.fire({
            title: "Confirm to delete this data?",
            showCancelButton: true,
            confirmButtonText: "Yes",
        }).then((result) => {
            if (result.isConfirmed) {
                $(e.target).closest("form").submit()
            }
        })
    })
    @error('err_msg')
    $.notify({
        message: "{{ $message }}"
    }, {
        type: "danger",
        delay: 4000,
    })
    @enderror

    @if (session('status'))
    $.notify({
        message: "{{ session('status') }}"
    }, {
        delay:5000,
        type: "info"
    })
    @endif
</script>
@endsection
