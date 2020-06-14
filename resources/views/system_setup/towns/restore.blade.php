<!-- Restore Deleted Towns modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Restore Town</h5>
        <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal-body">
        <form class="mt-2" action="#"  method="POST" id="form">
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
          <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
          <button type="button" class="btn btn-primary" id="btn-submit">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Restore Deleted Towns modal -->
<script>
       let list           = document.getElementById("tid");
       let btnSaveChanges = document.getElementById("btn-submit");
       let notify         = document.getElementById("modal-body");
       let ModalTitle     = document.getElementById("exampleModalLongTitle");
       let closeModal     = document.getElementById("close-modal");

      btnSaveChanges.addEventListener('click', (e) => {
        let getId = list.options[list.selectedIndex].value;
        fetch(`{!! url('admin-portal/system-setup/towns/get-restore-data') !!}` + '/' +getId )
          .then(response => response.json())
          .then(data => console.log(data))
        ModalTitle.textContent = list.options[list.selectedIndex].text;
        notify.textContent     = " "+"Restoring... " + ModalTitle.textContent;
        notify.classList.add("badge");
        notify.classList.add("badge-primary");
          setTimeout(() => {
            location.reload();
          },5000);
      });

</script>
