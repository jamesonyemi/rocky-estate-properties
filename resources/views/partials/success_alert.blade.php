@if ( $message = Session::get('success') )
<div class="alert alert-success rounded-pill" role="alert" id="alert-success">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
@endif


