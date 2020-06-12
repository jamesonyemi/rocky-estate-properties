@if ( $message = Session::get('success') )
<div class="alert alert-success rounded-pill" role="alert" id="success-mgs">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
@endif


<script>
( (jQuery) => {
  let cancelAlert = document.querySelector('.close');

  if (cancelAlert) {

      cancelAlert.addEventListener('click', () => {
        $(this).parent('#success-mgs').remove();
        window.location.reload();

      })
  }

})();
</script>