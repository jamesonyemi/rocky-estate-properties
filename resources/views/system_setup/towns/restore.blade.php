<!-- Restore Deleted Towns modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Restore Deleted Town</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mt-2" action="{!! route('restore-update') !!}"  method="POST">
          {{ csrf_field() }}
          <div class="form-row">
            <div class="form-group col-md-4"> </div>
            <div class="form-group col-md-4">
              <label for="validate_country">Town</label>
              <select id="tid" name="tid" class="form-control custom-select" required>
                @foreach ($regionTown as $key => $town)
                @if ( ($town->active === "no" && $town->is_deleted === 1 )  || ($town->active === "no" && $town->is_deleted === 0 ) )
                <option value="{!! $town->tid !!}" >{!! $town->town !!}</option>
                @endif
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-2"> </div>
            {{-- <div class="form-group col-md-4">
              <label for="project_state">Status</label>
              <input type="hidden" name="is_deleted" id="is_deleted">
              <select id="active" name="active" class="form-control custom-select" required>
                @php
                foreach ($regionTown as $key => $town):
                      $yes  = ( $town->active !== 'yes' ) ? "yes" : $town->active;
                      $no   = ( $town->active === 'no' ) ? $town->active : "no";
                 endforeach;
                  @endphp
                  <option value="{!!$yes !!}">{!!ucwords($yes) !!}</option>
                  <option value="{!!$no !!}">{!! ucwords($no) !!}</option>
              </select>
            </div> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Restore Deleted Towns modal -->
