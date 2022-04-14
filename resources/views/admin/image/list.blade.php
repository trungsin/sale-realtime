@if (count($images) > 0)
    @foreach($images as $key => $image)
    <tr>
        <td class="text-center">{{ $key + 1 }}</td>
        <td class="text-center"><img width="40" src="{{ $image->thumbnail }}" alt="thumbnail" title="thumbnail" /></td>
        @php
            $colorName = isset($image->imageable->color) ? $image->imageable->color->name  : '';
        @endphp
        <td class="text-center text-uppercase">{{ $colorName}}</td>
        <td class="text-center">{{ $image->created_at }}</td>
        <td class="text-center" nowrap>

            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#dangerModal{{$image->id}}" title="View">
                <i class="icons cui-delete"></i>
            </button>
            @include('admin.image.delete-model', [ 'id'=>$image->id, 'action' => route('admin.products.images.destroy', ['$image' => $productId, 'id' => $image->id])] )
        </td>
    </tr>
    @endforeach

@else
<tr>
    <td class="text-center" colspan="7">Not found Data</td>
</tr>
@endif

