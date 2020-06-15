@include('partials.master_header')
        @include('partials.breadcrumb')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>On Site Visits  </h3>
            </div>

            <div class="card-body">
            <form method="POST" action="{{ route('onsite-visit.store')}}" enctype="multipart/form-data" class="mt-5">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="client">Client</label>
                        <select id="clientid" name="clientid" class="form-control custom-select" required>
                            <option value="">--select--</option>
                            @foreach ($clients as $client_id => $client)

                                @if ($client->clientid )
                                <option value="{{ $client->clientid }}" class="text-capitalize">
                                    {{ ucwords( $client->title . " " .$client->fname . " " . $client->lname)  }}
                                </option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2"></div>

                    <div class="form-group col-md-4">
                        <label for="pid">Project:</label>
                        <select id="pid" name="pid" class="form-control"></select>
                    </div>
                </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="date_of_visit">Date of Visit</label>
                            <input type="date" class="form-control" id="vdate" name="vdate">

                        </div>
                        <div class="form-group col-md-2">  </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status of Project on Visit</label>
                            <select id="status" name="status" class="form-control custom-select" required>
                                <option value="">---select---</option>
                                @foreach ($project_status as $key => $status)
                                    <option value="{{ $status }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="img_url">Photos of Project on Visit</label>
                            <input type="file" class="form-control" id="img_name" name="img_name[]" multiple required>

                        </div>
                        <div class="form-group col-md-2">

                        </div>
                       <div class="form-group col-md-4">
                            <label for="visit_comment">Brief Comment</label>
                            <textarea name="comments" id="comments" cols="44" rows="6" required dir="ltr" required></textarea>
                        </div>
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
     <!-- End -->
<!-- End Main Content Wrapper -->
@include('partials.footer')
