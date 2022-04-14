@section('title', 'Edit User')
@extends('admin.layout.main')
@section('content')
<!--begin::Portlet-->
<div class="col-md-12w">
    <div class="card">
        <div class="card-header">
            Edit <strong>User</strong></div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Name</label>
                    <div class="col-md-9">
                        <input class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" id="name" type="text" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Email</label>
                    <div class="col-md-9">
                        <input class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" id="email" type="email" name="email">
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
                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="role">Role</label>
                    <div class="col-md-9">
                        <select class="form-control" id="role" name="role"
                            @role('Manager'){{($user->roles()->pluck('name')->pop()=='Manager' || $user->roles()->pluck('name')->pop()=='Admin') ? 'disabled' : ''}} @endrole
                            @role('Admin'){{$user->roles()->pluck('name')->pop()=='Admin' ? 'disabled' : ''}} @endrole>
                            <option value=""></option>
                            @foreach($roles as $key => $role)
                                <option value="{{ $role->name }}" @if($role->name == $user->roles()->pluck('name')->pop()) {{ "selected" }} @endif>{{ $role->name }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.users.index') }}">
                        <i class="fa fa-ban"></i> Cancel</a>
                    <button class="btn btn-sm btn-primary" type="submit">
                        <i class="fa fa-dot-circle-o"></i> Submit</button>
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
@push('script')

<script src="{{ asset('backend/js/common.js?v=1.1') }}"></script>
@endpush
@endsection
