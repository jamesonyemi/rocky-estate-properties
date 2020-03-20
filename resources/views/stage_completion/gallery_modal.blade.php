<div class="col-md-2 ml-md-auto">
    <i class="bx bx-images btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#basicModalLong"
    data-placement="top" title="Image Preview"></i>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="basicModalLong" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Project Images</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @include('stage_completion.gallery')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>