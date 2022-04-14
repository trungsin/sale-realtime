@extends('admin.layout.main')
@section('content')
@include('components.transaction')
@endsection
@push('scripts')
	<script type="text/javascript">
		const $id_du_an = {{$du_an->id}};
	</script>
	<script src="{{asset('js/board-transaction.js')}}"></script>
@endpush
@if(auth()->user()->chuc_vu == 1)
	@push('scripts')
		<script src="{{ asset('js/board-transaction-admin.js?v=1.1') }}"></script>
	@endpush
@endif