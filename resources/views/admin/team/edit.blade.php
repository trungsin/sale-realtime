@section('title', 'Edit Team')
@extends('admin.layout.main')
@section('content')
<!--begin::Portlet-->
<div class="col-md-12w">
    <div class="card">
        <div class="card-header">
            Edit <strong>Team</strong></div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('admin.teams.update', ['id' => $team->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Name (*)</label>
                    <div class="col-md-9">
                        <input class="form-control @error('name') is-invalid @enderror" value="{{ $team->name }}" id="name" type="text" name="name" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="description">Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="description" type="description" name="description" style="height: 150px;">{{ $team->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 col-form-label">
                        Select User (*)
                    </div>
                    <div class="col-md-9">
                        <select class="form-control users @error('users') is-invalid @enderror" name="users[]" multiple="multiple">
                            @foreach($users as $user)
                                <option value="{{$user->id}}" {{ in_array($user->id, $userIds) ? 'selected': ''}}>{{$user->name}}</option>
                            @endforeach
                        </select>
                        @error('users')
                        <span class="invalid-feedback" role="alert">
                            <span>{{$message}}</span>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label">Select Account (*)</label>
                    <div class="col-md-9">
                        <select class="form-control accounts @error('accounts') is-invalid @enderror" name="accounts[]" multiple="multiple">
                            @foreach($accounts as $account)
                                <option value="{{$account->id}}" {{ in_array($account->id, $accountIds) ? "selected": ''}}>{{$account->nickname.'-'.$account->ebay_name}}</option>
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
@push('scripts')

<script>
    $(".users").select2({ width: '100%' });
    $(".accounts").select2({ width: '100%' });
</script>
@endpush
@endsection
