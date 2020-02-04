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
                <span><i><b>Project Owner:</b>   {{$r->full_name}} </i></span>
                
                <!-- <div class="dropdown">
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class='bx bx-dots-horizontal-rounded'></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-show'></i> View
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-edit-alt'></i> Edit
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-trash'></i> Delete
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-printer'></i> Print
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-download'></i> Download
                        </a>
                    </div>
                </div> -->
            </div>

            <div class="card-body">
            <form method="POST" action="{{ route('stage-of-completion.update', $r->id)}}" enctype="multipart/form-data" class="mt-5">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
              
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="amount_spent">Amount Spent</label>
                            <input type="number" step="0.1" value="{{ $r->amtspent }}" class="form-control" id="amtspent"  name="amtspent" required>
                            </div>
                            <div class="form-group col-md-2">  </div>
                            <div class="form-group col-md-4">
                                <label for="status">Status of Completion</label>
                                <select id="status_id" name="status_id" class="form-control custom-select" required>
                                    @if ( empty($r->status_id) )
                                        <option>-- select --</option>
                                    @endif
                                    @foreach ($project_status as $key => $status) 
                                        @if ( !empty($r->status_id) )
                                            <option value="{{ $status }}" {{ old('phase_id', in_array($r,[$key]) ? $r->status_id : 'null') === $key ? 
                                            'selected' : '' }}> {{ ucwords($key) }} </option>    
                                        @else
                                    @endif
                                    @endforeach
                                </select>  
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="phase">Project Phase</label>
                            <select id="phase_id" name="phase_id" class="form-control custom-select" required>
                                @if ( empty($r->phase_id) )
                                    <option>-- select --</option>
                                @endif
                                @foreach ($project_phase as $key => $phase) 
                                    @if ( !empty($r->phase_id) )
                                        <option value="{{ $phase }}" {{ old('phase_id', in_array($r,[$key]) ? $r->phase_id : 'null') === $key ? 
                                        'selected' : '' }}> {{ ucwords($key) }} </option>    
                                    @else
                                @endif
                                @endforeach
                            </select> 
                            </div>
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">
                                <label for="img_name">Photos of Work Done</label>
                                <input type="file" class="form-control" id="img_name" name="img_name[]" multiple >
                                <hr style="background-color:darkgray">
                                <h6>UPLOADED IMAGE</h6>
                                <td> 
                                @foreach (json_decode($r->img_name) as $picture) 
                                    <img src="{{ asset('/stage_of_completion_img/'.$picture) }}" style="height:50px; width:50px"/>
                                 @endforeach
                              </td>
                    
                              {{-- WORK-TO-DO for, DELETE SPECIFIC IMAGE FROM ARRAY LIST AND DATABASE ON CLICK --}}
                              
                            </div>
                        </div>
                        <br>
                       
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="comment">Materials Purchased</label>
                                <textarea name="matpurchased" id="matpurchased"  cols="50" rows="6"   required > 
                                    {{ strip_tags($r->matpurchased) }}</textarea>
                            </div> 
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">
                                <label for="comment">Details of Amount Spent</label>
                                    <textarea name="amtdetails" id="amtdetails" cols="50" rows="6" required >
                                        {{ strip_tags($r->amtdetails)}}</textarea>
                                </div>
                        </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i> Update Info</button>
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
