<a class="btn btn-info" href="{{ route('admin.users.edit', ['id' => $user->id]) }} ">
    <i class="fa fa-edit"></i>
</a>
@role('Admin')
@if (strpos($user->name, 'admin') == false)
<form method="POST" action="{{ route('admin.users.destroy', ['id'=>$user->id])}}"
    style="display:inline-block">
    {{ csrf_field() }}
    @method('DELETE')
    <a type="button" class="btn btn-danger" data-toggle="modal"
        data-target="#dangerModal{{ $user->id }}" title="View">
        <i class="fa fa-trash-o"></i>
    </a>
    @include('admin.layout.confirmation-model', ['action' => 'delete' , 'feature' =>
    'country', 'id'=>$user->id])

</form>
@endif
@endrole
