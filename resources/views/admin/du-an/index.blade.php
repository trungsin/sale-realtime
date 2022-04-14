@extends('admin.layout.main')
@section('content')
</br>
<div class="row">
	<div class="col-12">
		<h3>Các Dự Án :</h3>
	</div>
	<div class="col-12">
		<ul>
		@foreach ($du_ans as $key => $du_an)
			<li><a href="{{url('/du-an/'.$du_an->id)}}">{{$du_an->ten}} ( {{$du_an->tinh_trang=='mo ban'?"Mở bán":$du_an->tinh_trang}} ).</a></li>
		@endforeach
		</ul>
	</div>
</div>
@endsection
