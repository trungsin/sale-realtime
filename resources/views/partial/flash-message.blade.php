@push('scripts')
<script>
@if ($message = Session::get('success'))
toast("{{ htmlspecialchars($message, ENT_COMPAT) }}", { title: 'Success', type: 'success' });
@endif
@if ($message = Session::get('error'))
toast("{{ htmlspecialchars($message, ENT_COMPAT) }}", { title: 'Error', type: 'error' });
@endif
@if ($message = Session::get('warning'))
toast("{{ htmlspecialchars($message, ENT_COMPAT) }}", { title: 'Warning', type: 'warning' });
@endif
@if ($message = Session::get('info'))
toast("{{ htmlspecialchars($message, ENT_COMPAT) }}", { title: 'Info', type: 'info' });
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
    toast("{{ htmlspecialchars($error, ENT_COMPAT) }}", { title: 'Notice', type: 'error' });
    @endforeach
@endif
</script>
@endpush
