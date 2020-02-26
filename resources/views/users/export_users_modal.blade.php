<!-- Modal -->
<div class="modal fade export-modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{!! ucwords("Export") !!}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('export-users') }}" method="post" class="mt-2" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="text" name="export-users" id="export-users" class="form-control" placeholder="Enter File Name">
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>