@php
 $success = isset($success) ? $success : 'success';
 $error = isset($error) ? $error : 'error';
@endphp
@if (session()->has($success))
    <div class="col-md-12 col-sm-12">
        <div class="alert alert-success" role="alert">{{ session($success) }}</div>
    </div>
@endif
@if (session()->has($error))
    <div class="col-md-12 col-sm-12">
        <div class="alert alert-danger" role="alert">{{ session($error) }}</div>
    </div>
@endif
