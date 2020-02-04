@include('partials.header')
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
                <h3>Project Details</h3>

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
                <!-- <form>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                </form> -->
                {{ dd($regionTownMap) }}
                @foreach ($towns as $town)
                <form class="mt-5">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_country">Region</label>
                            <input type="text" class="form-control" name="rid" id="rid" value="{{ old('rid', $town->rid ) }}" readonly>

                            @foreach ($regionId as $key => $value)
                            <input type="text" class="form-control" name="rid" id="rid" 
                             value="{{ old('rid', in_array($town->rid,[$value]) ? $town->rid : 'null') === $key ?  ucwords($value)  : '' }}" >
                                {{-- {{ ucwords($value) }} --}}
                            @endforeach

                            {{-- <select id="region" name="region" class="form-control custom-select" required>
                                @foreach ($regionId as $key => $value)
                            <option value="{{ $town->rid }}" {{ old('rid', in_array($value,[$value]) ? $town->rid : 'null') === $key ? 'selected' : '' }}>
                                {{ ucwords($value) }}</option>
                            @endforeach --}}
                            </select>
                        </div>
                        
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_country">Town</label>
                        <input type="text" class="form-control" name="town" id="town" value="{{ old('town', $town->town) }}" readonly>
                        </div>
                    </div>
               
                      @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
  <!-- Footer -->
  <div class="flex-grow-1"></div>
</div>
<!-- End Main Content Wrapper -->

@include('partials.footer')
    

      