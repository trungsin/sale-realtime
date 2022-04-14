@section('title', 'Image')
@prepend('styles')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
@endprepend
@extends('admin.layout.main')
    @section('content')
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i> Images list
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    @include('admin.product.list-menu', ['productId' => $productId])
                </div>

                <div class="col-md-4 form-group">
                    Main Image
                </div>
                <div class="col-md-4 form-group">
                    <div class="file-loading">
                        <input id="main-img" type="file" name="file" class="file" data-overwrite-initial="false">
                    </div>
                </div>
                {{-- <div class="col-md-12 form-group">
                    <div class="col-md-4">Variant Image</div>
                    <div class="col-md-4">
                        <select class="form-control" name="color_id" id="color_id">
                            <option value="0">--Select Color--</option>
                            @foreach($colors as $key => $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="col-md-12 form-group">
                    <div class="file-loading">
                        <input id="variant-img" type="file" name="file" multiple class="file variant" data-overwrite-initial="false" data-max-file-count="12">
                    </div>
                </div>
                <div class="col-md-12 alert"></div>
            </div>

        </div>
    </div>
    @php
        $previewImage = '';
        if (!empty($mainImage)) {
            $previewImage = "<img class='kv-preview-data file-preview-image' src='$mainImage->name'>";
        }
    @endphp
    @push('scripts')
        <script type="text/javascript">
            // $('#variant_id').on('change', function() {
            //     const variantId = $(this).val();
            //     let url = "{{ route('admin.products.images.load', ['productId' => $productId, 'variant_id' => '']) }}" + variantId;
            //     $.get(url, function(data) {
            //         $('.content-img').html(data.html);
            //     });
            // });

            $("#main-img").fileinput({
                showRemove: false,
                showUpload: false,
                required: true,
                uploadUrl: "{{ route('admin.products.images.store', ['productId' => $productId]) }}",
                uploadExtraData: function() {
                    return {
                        _token: "{{ csrf_token() }}",
                        image_type: 'main'
                    };
                },
                deleteExtraData: {
                    _token: "{{ csrf_token() }}",
                },
                allowedFileExtensions: ['jpg', 'png', 'gif','jpeg'],
                maxFileSize:10240,
                maxFilesNum: 10,
                overwriteInitial: false,

            });
            $('#variant-img').fileinput({
                uploadUrl: "{{ route('admin.products.images.store', ['productId' => $productId]) }}",
                uploadExtraData: function() {
                    return {
                        _token: "{{ csrf_token() }}",
                        image_type: 'variant',
                        color_id: $('#color_id').val()
                    };
                },
            });

        </script>
    @endpush
@endsection
