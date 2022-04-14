@extends('admin.layout.main')
@section('content')
</br>
<div class="row">
	Xin chào {{auth()->user()->name}}
</div>
@endsection
@if(auth()->user()->chuc_vu == 1)
	
@endif