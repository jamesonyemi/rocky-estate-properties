@include('partials.header')

    <!-- Side Menu -->
    <!-- Start Sidemenu Area -->
    @include('partials.side_menu')

    <!-- End Sidemenu Area -->

    <!-- Main Content Wrapper -->
    <div class="main-content d-flex flex-column">
        <!-- Top Navbar -->
        <!-- Top Navbar Area -->
        @include('partials.topnav')
        <!-- End Top Navbar Area -->

        <!-- Main Content Layout -->
        <!-- Breadcrumb Area -->
        @include('partials.breadcrumb')

        <!-- End Breadcrumb Area -->

        <!-- Start -->

        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Stage of Completion  </h3>
            </div>

            <div class="card-body">

            <form method="POST" action="{{ route('stage-of-completion.store')}}" enctype="multipart/form-data" class="mt-5">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                        <label for="client">Client</label>
                        <select id="clientid" name="clientid" class="form-control custom-select" required>
                            <option value="">-- select --</option>
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
                        <select id="pid" name="pid" class="form-control" required></select>
                    </div>
                </div>
                        <div class="form-row">
                            <div class="col-1"></div>
                            <div class="form-group col-md-4">
                                <label for="amount_spent">Amount Spent</label>
                                <input type="number" step="0.1" class="form-control" id="amtspent"  name="amtspent" required>
                            </div>
                            <div class="form-group col-md-2">  </div>
                            <div class="form-group col-md-4">
                                <label for="status">Status of Project</label>
                                <select id="status_id" name="status_id" class="form-control custom-select" required>
                                    <option value="">-- select --</option>
                                    @foreach ($project_status as $key => $status)
                                        <option value="{{ $status }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col-1"></div>
                            <div class="form-group col-md-4">
                                <label for="phase">Stage of Completion</label>
                                <select id="phase_id" name="phase_id" class="form-control custom-select" required>
                                    <option value="">-- select --</option>
                                    @foreach ($project_phase as $key => $phase)
                                    <option value="{{ $phase }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">
                                <label for="img_name">Photos of Work Done</label>
                                <input type="file" class="form-control" id="img_name" name="img_name[]" multiple   #imageInput accept="image/*" onChange="processFile(img_name)"  >
                            </div>
                        </div>
                        <br>

                    <div class="form-row">
                    <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="comment">Materials Purchased</label>
                                <textarea name="matpurchased" id="matpurchased" cols="32" rows="5" dirname="matpurchased.dir" required ></textarea>
                            </div>
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">
                                <label for="comment">Details of Amount Spent</label>
                                    <textarea name="amtdetails" id="amtdetails" cols="32" rows="5" dirname="amtspent.dir" required ></textarea>
                                </div>
                        </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                    <div class="container">
                        <div class="row">
                    <div class="col-2"></div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i> Save</button>
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
