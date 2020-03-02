<div class="col-md-2 ml-md-auto">
<button type="button" class="btn btn-primary btn-sm rounded-pill" data-toggle="modal" data-target="#basicModalLong">Image Preview</button>
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
                @include('client_portal.my_projects.gallery')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>