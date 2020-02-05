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
                <h3>Create Town</h3>
            </div>
            @foreach ($nationality as $nation)
            <div class="card-body">
                <form class="mt-5">
                    {{ csrf_field() }}
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_region">Country Name</label>
                        <input type="text" id="country_name" value="{{ old('country_name', $nation->country_name) }}"  
                            name="country_name" class="form-control" disabled>
                            {{-- <select id="rid" name="rid" class="form-control custom-select" required>
                                <option>-- select --</option>
                            @foreach ($nationality as $id => $nation)
                                    <option value="{{ $id }}" class="text-capitalize">{{ ucwords($nation->country_name)  }}</option>
                                    @endforeach
                            </select> --}}
                        </div>
                        <div class="form-group col-md-2"></div>
                
                        <div class="form-group col-md-4">
                            <label for="title">Country Code:</label>
                            <input type="text" id="country_code" value="{{ old('country_name', $nation->country_code) }}"
                             name="country_code" class="form-control" disabled>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
        

      