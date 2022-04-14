<a class="btn btn-info" href="{{ route('admin.teams.edit', ['id' => $team->id]) }} ">
    <i class="fa fa-edit"></i>
</a>
<form method="POST" action="{{ route('admin.teams.destroy', ['id'=>$team->id])}}"
    style="display:inline-block">
    {{ csrf_field() }}
    @method('DELETE')
    <a type="button" class="btn btn-danger" data-toggle="modal"
        data-target="#dangerModal{{ $team->id }}" title="View">
        <i class="fa fa-trash-o"></i>
    </a>
    @include('admin.layout.confirmation-model', ['action' => 'delete' , 'feature' =>
    'country', 'id'=>$team->id])

</form>
