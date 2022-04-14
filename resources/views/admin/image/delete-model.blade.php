<div class="modal fade" id="dangerModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure?</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want delete?</p>
            </div>
            <div class="modal-footer">
                @csrf

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <input type="hidden" name="action" id="action" value="{{$action}}">
                <a class="btn btn-danger btn-del" href="javascript:void(0)">Ok</a>
            </div>
        </div>
        <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
</div>
