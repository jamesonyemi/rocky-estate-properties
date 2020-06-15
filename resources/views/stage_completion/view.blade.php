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
                <h3>View Stage of Completion  </h3>
                <div class="row">
                    <div>
                        <span>
                            <i class="badge badge-default">Project Owner:</i>
                               <i class="badge badge-primary"> {{ ($r->full_name) ? $r->full_name : $r->company_name  }}</i>
                            </span>
                    </div>
                    <div class="col-1"></div>
                    <div>
                        <span>
                            <i class="badge badge-default">Project Budget:</i>
                            <i class="badge badge-primary">
                                {{ !empty($r->project_budget) ? $r->project_budget : 'Not Specified yet'  }}
                            </i>
                        </span>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div><hr>
            <div class="card-body">
                <div class="form-row mt-2">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                        <label for="comment">Region</label>
                        <input type="text" value="{{ strip_tags($r->region) }}" class="form-control"  disabled required>
                    </div>
                    <div class="form-group col-md-2"></div>
                    <div class="form-group col-md-4">
                        <label for="comment">Town</label>
                        <input type="text" value="{{ strip_tags($r->town)}}" class="form-control"  disabled required>
                    </div>
                </div>
                        <div class="form-row">
                            <div class="col-1"></div>
                            <div class="form-group col-md-4">
                                <label for="amount_spent">Amount Spent</label>
                            <input type="number" step="0.1" value="{{ $r->amtspent }}" class="form-control" id="amtspent" disabled  name="amtspent" required>
                            </div>
                            <div class="form-group col-md-2">  </div>
                            <div class="form-group col-md-4">
                                <label for="status">Status of Completion</label>
                            <input type="text" id="status_id" value="{{ ucfirst(strip_tags($r->status)) }}" name="status_id"
                                class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col-1"></div>
                            <div class="form-group col-md-4">
                                <label for="comment">Materials Purchased</label>
                                <input type="text" value="{{ strip_tags($r->matpurchased) }}" class="form-control"  disabled required>
                            </div>
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">
                                <label for="comment">Details of Amount Spent</label>
                                <input type="text" value="{{ strip_tags($r->amtdetails)}}" class="form-control"  disabled required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-1"></div>
                            <div class="form-group col-md-4">
                            <label for="phase">Project Phase</label>
                            <input type="text" class="form-control" disabled  value="{{ $r->phase }}">
                            </div>
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">
                                <td>
                                    <hr style="background-color:darkgray">
                                    <label for="img_name">Photos of Work Done</label><br>
                                    @foreach (json_decode($r->img_name) as $picture)
                                        <img id="db-images" src="{{ asset('/stage_of_completion_img/'.$picture) }}" style="height:50px; width:50px"/>
                                        {{-- <i class="bx bx-trash" id="removes" ></i> --}}
                                     @endforeach
                                  </td>
                            </div>
                        </div>
                 <br>
            </div>
        </div>
     <!-- End -->

<!-- End Main Content Wrapper -->

@include('partials.footer')

{{-- <script>
   let images =  document.querySelectorAll("#db-images");
   let trashIcon =  document.querySelectorAll("#removes");
   images.forEach(element => {
    // console.log(element);
       trashIcon.addEventListener("click", function(){
           let imgs = document.querySelector("#db-images").remove();
           let removeIcon = document.querySelector("#removes").remove();
           console.log(element.values = 120);
        });

   });

</script> --}}
