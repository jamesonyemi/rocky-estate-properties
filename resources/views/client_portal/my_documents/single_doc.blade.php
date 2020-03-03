@include('partials.client-portal.master_header')
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

<div class="card-header d-flex justify-content-between align-items-center">
    <h3>Submit More Document</h3>
</div>

<div class="card mb-30">
    <div class="card-body">
<form action="{{ route('project-docs.store') }}" method="POST"  class="mt-3" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="row">
    <div class="col col-md-3"></div>
<div class="col col-2">
<div class="custom-control custom-radio mb-3">
    <label for="document">Document Name</label>
    <input type="text" class="form-control" name="doc" id="doc">
</div>

</div>
<div class="col col-3">
    <label for="document">Attach Documents</label>
    <input type="file" class="form-control" accept=".pdf,.doc,.docx,.xl,.xlx" max="50000" id="docname" name="docname" required="">
</div>
<div class="col col-2"></div>
</div>
<hr style="background-color:fuchsia; opacity:0.1">
<div class="container">
<div class="row">
<div class="col text-center">
    <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
     Save</button>
  </div>
  <div class="form-group col-md-2"></div>
</div>
</div>
</form>
</div>
</div>
@include('partials.client-portal.footer')
