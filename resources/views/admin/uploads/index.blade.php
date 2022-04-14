@extends('admin.layout.main')

@section('content')
<div class="animated fadeIn">
    <div class="card">
        <div class="card-header">
            <h2 class="m-0"><i class="nav-icon icon-docs"></i> Example</h2>
        </div>
        <div class="card-body">
            <div class="text-center">
                <button class="btn btn-sm btn-danger image_btn" data-toggle="tooltip" data-placement="top" title="Upload design">
                    <i class="icons cui-cloud-upload"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    Dropzone.autoDiscover = false;
    var token = $('meta[name="csrf-token"]').attr('content');

    var uploader = new Dropzone(".image_btn", {
        url: "{{ route('admin.uploads.image') }}",
        chunking: true,
        retryChunks: true,
        maxFilesize: null,
        method: "POST",
        parallelChunkUploads: true,
        paramName: 'image_data',
        previewsContainer: false
    });

    uploader.on('sending', function(file, xhr, formData) {
        formData.append('_token', token);
        formData.append('product_id', 1);
        formData.append('image_type', 'design_front');
    });

    uploader.on('addedfile', function(file) {
        uploader.element.innerHTML = '<i class="fa fa-circle-o-notch fa-spin"></i>';
    });

    uploader.on('complete', function(file) {
        uploader.element.innerHTML = '<i class="icons cui-cloud-upload"></i>';
    });
    uploader.on('error', function(file, errorMessage ) {
        console.error(errorMessage);
    });

</script>
@endpush
