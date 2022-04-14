
@extends('admin.layout.main')
@section('content')
<div class="animated fadeIn">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-edit"></i> User List
            @role('Admin')
            <div class="card-header-actions">
                <a class="btn btn-block btn-primary" href="{{ route('admin.users.create') }}">
                    Add New User
                </a>
            </div>
            @endrole
        </div>
        <div class="card-body">
        {{ $dataTable->table() }}
        </div>
    </div>
    </div>
@endsection
@push('scripts')
{{ $dataTable->scripts() }}
@endpush
