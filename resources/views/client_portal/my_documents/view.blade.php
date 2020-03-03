@include('partials.client-portal.master_header')
    <!-- Start -->
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <div class="card mb-30">
                @foreach ($owners as $owner)
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i><b>Project Owner  <br></b>{{ $owner->full_name }}</i></span>
                    <span><i><b>Project  <br></b>{{ $owner->title}}</i></span>
                    <span><i><b>Location  <br></b>{{ $owner->location}}</i></span>
                    <span><i><b>Contact <br></b>{{ $owner->phone1}}</i></span>
                </div>
                <div class="card-body"></div>
            </div>
            @endforeach
        </div>
        <div class="col-lg-7 col-md-12">
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
                                            @foreach ($projectDocs as $item)
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
    <!-- End -->
@include('partials.client-portal.footer')