
@extends('admin.layout.main')
@section('content')
<div class="animated fadeIn">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-edit"></i> Team List
            <div class="card-header-actions">
                <a class="btn btn-block btn-primary" href="{{ route('admin.teams.create') }}">
                    Add New Team
                </a>
            </div>
        </div>
        <div class="card-body">
        @include('admin.layout.message')
        {{ $dataTable->table() }}
        </div>
    </div>
    </div>
@endsection
@push('scripts')
{{ $dataTable->scripts() }}
@endpush
