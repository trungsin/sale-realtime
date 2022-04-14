@section('title', 'Add User')
@extends('admin.layout.main')
@section('content')
<!--begin::Portlet-->
<div class="col-md-12w">
    <div class="card">
        <div class="card-header">
            Add <strong>User</strong>
        </div>
        <div class="card-body">
            @include('admin.layout.message')
            <form class="form-horizontal" action="{{ route('admin.users.store') }}" method="post">
                @csrf
                <div class="row">
                    @if (session()->has('errorMessage'))
                        <div class="col-md-12 col-sm-12">
                            <div class="alert alert-danger" role="alert">{{ session('errorMessage') }}</div>
                        </div>
                    @endif
                    @if (session()->has('successMessage'))
                        <div class="col-md-12 col-sm-12">
                            <div class="alert alert-success" role="alert">{{ session('successMessage') }}</div>
                        </div>
                    @endif
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Name</label>
                    <div class="col-md-9">
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name')}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="email">Email</label>
                    <div class="col-md-9">
                        <input autocomplete="off" class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email')}}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password">Password</label>
                    <div class="col-md-9">
                        <input autocomplete="off" class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" value="{{ old('password')}}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.users.index') }}">
                        <i class="fa fa-ban"></i> Cancel</a>
                    <button class="btn btn-sm btn-primary" type="submit">
                        <i class="fa fa-dot-circle-o"></i> Save</button>
                </div>
            </form>
        </div>

    </div>

</div>
<!--end::Portlet-->

<!--end::Portlet-->

<style>
@media (min-width: 1025px) {
    .kt-form.kt-form--label-right .form-group label:not(.col-form-label) {
        text-align: left !important;
    }
}
</style>
@push('scripts')

<script src="{{ asset('backend/js/common.js?v=1.1') }}"></script>
@endpush
@endsection
