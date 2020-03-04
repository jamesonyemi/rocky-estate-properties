@include('partials.client-portal.master_header')
<style>
/* .entry:not(:first-of-type)
{
    margin-top: 10px;   
}
.glyphicon
{
    font-size: 12px;
} */
</style>
 <!-- Start -->
 <div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-30">
            <div class="card mb-30 collapse-card-box">
                <div class="card-body" style="margin-top:50px;">
                    <div class="accordion-box">
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i class="bx bx-plus"></i>
                                    View Documents
                                </a>
                                <table class="table table-striped accordion-content show" style="display: none;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Documents</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($singleDoc as $item)
                                        @foreach (json_decode($item->doc_link) as $doc)
                                        <tr>
                                            <td> {!!  str_replace('/project-documents/', '', $doc ) !!} </td>
                                            <td> 
                                            <a href="{{ $doc }}" class="dropdown-item d-flex align-items-center" target="_blank">
                                                <i class="bx bx-show" style="color:red; float:right;" 
                                                    data-toggle="tooltip" data-placement="top" title="View">
                                                </i> 
                                            </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-header d-flex justify-content-between align-items-center" style="margin-bottom: -5px;">
                <i><small>My Documents</i></small>
            </div>
        </div>
    </div>
</div>
<br><br><br>

<div class="card mb-30">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3><?= strtoupper('submit more documents') ?></h3>
    </div>
    <div class="card-body">
        <form class="mt-5" action="{{'#'}}"  method="POST">
            {{ csrf_field() }}
        <div id="RepeatingFields">
            <div class="entry">
                <div class="form-row "> 
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-4">
                        <label for="validate_region">Document Name:</label>
                        <input type="text" id="doc" name="doc[]" class="form-control" >
                    </div>
                    <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-4">
                        <label for="rfrom">Document:</label>
                        <input type="file"  id="doc_name" name="doc_name[]" accept=".doc, .docx, .pdf" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2" style="margin:32px -10px 0px 10px;">
                        <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-sm btn-add rounded-pill">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    more documents
                                </button>
                        </span>
                    </div>

                </div> 
            </div>
        </div><br><br>
             <hr style="background-color:fuchsia; opacity:0.1"><br> 
              <div class="container">
                  <div class="row">
                      <div class="col text-center">
                          <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                           Submit</button>
                        </div>
                        <div class="form-group col-md-2"></div>
                </div><br>
              </div>
        </form>
       
    </div>
</div>


@include('partials.client-portal.footer')

<script>
$(function() {
    let repeater    =   $(document).on('click', '.btn-add', function(e) {
        e.preventDefault();
        let controlForm  =  $('#RepeatingFields:first'),
            currentEntry =  $(this).parents('.entry:first'),
            newEntry     =  $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('remove');
    });
    repeater.on('click', '.btn-remove', function(e) {
        e.preventDefault();
        $(this).parents('.entry:first').remove();
        return false;
    });
});

</script>
