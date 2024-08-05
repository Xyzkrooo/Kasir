@extends('layouts.home')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('content')
<!--breadcrumb-->
<div class="breadcrumb_section bg_gray page-title-mini">
    <!-- START CONTAINER -->
    <div class="row align-items-center">
        <div class="col-md-6">
            <ol class="breadcrumb justify-content-md-start">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Admin</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('/admin/kategori') }}">kategori</a></li>
            </ol>
        </div>
    </div>
</div>
<!--end breadcrumb-->

<h6 class="mb-0 text-uppercase">kategori</h6>
<hr>
<div class="row">
    @include('kategori.form')
    <div class="col-md-8">
        <h4 class="py-2 mb-2"><span class="text-muted fw-light"> </span> List kategori kategori</h4>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>kategori Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($kategori as $data)
                        <tr class="{{ $no % 2 == 1 ? 'table-light' : 'table-active' }}">
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->slug }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm rounded-pill btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Choose</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('kategori.edit', $data->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('kategori.destroy', $data->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="dropdown-item" data-confirm-delete="true">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
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

@push('scripts')
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    });
</script>
@endpush
