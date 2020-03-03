@include('partials.client-portal.master_header')
 <!-- Start -->
 <div class="row">
   
    <div class="col-lg-12 col-md-12">
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Project Documents</h3>
            </div>
            <div class="card mb-30 collapse-card-box">
                <div class="card-body">
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
        </div>
    </div>
</div>
<br><br><br>
@include('partials.client-portal.footer')
