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
            <form class="form-horizontal" action="{{ route('admin.teams.store') }}" method="post">
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
                    <label class="col-md-3 col-form-label" for="name">Name (*)</label>
                    <div class="col-md-9">
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name')}}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="description">Description (*)</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="description" type="description" name="description" style="height: 150px;">{{ old('description')}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 col-form-label">
                        Select User (*)
                    </div>
                    <div class="col-md-9">
                        <select class="form-control users  @error('users') is-invalid @enderror" name="users[]" multiple="multiple" required>
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if (old('users')){{(in_array($user->id, old("users")) ? "selected":"")}}@endif>
                                {{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('users')
                        <span class="invalid-feedback" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Select Account (*)</label>
                    <div class="col-md-9">
                        <select class="form-control accounts @error('accounts') is-invalid @enderror" name="accounts[]" multiple="multiple" required>
                            @foreach($accounts as $account)
                                <option value="{{$account->id}}" @if (old('accounts')){{(in_array($account->id, old("accounts")) ? "selected":"")}}@endif>{{$account->nickname.'-'.$account->ebay_name}}</option>
                            @endforeach
                        </select>
                        @error('accounts')
                        <span class="invalid-feedback" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.teams.index') }}">
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
@endsection
@push('scripts')
<script>
    $(".users").select2({width : '100%'});
    $(".accounts").select2({width : '100%'});
</script>
@endpush
