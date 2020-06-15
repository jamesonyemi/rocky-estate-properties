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
                <h3>Edit Town</h3>
            </div>
            <div class="card-body">
                @foreach ($towns as $town)
                <?php $encrypt = Crypt::encrypt($town->tid);  ?>
                <form class="mt-5" action="{{route('towns.update', $encrypt) }}"  method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_country">Region</label>
                            <select id="rid" name="rid" class="form-control custom-select" required>
                                @foreach ($regionId as $key => $value)
                            <option value="{{ $town->rid }}" {{ old('rid', in_array($value,[$value]) ? $town->rid : 'null') === $key ? 'selected' : '' }}>
                                {{ ucwords($value) }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_country">Town</label>
                        <input type="text" class="form-control" name="town" id="town" value="{{ old('town', $town->town) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="project_state">Status</label>
                            <select id="active" name="active" class="form-control custom-select" required>
                                @php
                                    $yes  = ( $town->active !== 'yes' ) ? "yes" : $town->active;
                                    $no   = ( $town->active === 'no' ) ? $town->active : "no";
                                @endphp
                                <option value="{!!$yes !!}">{!!ucwords($yes) !!}</option>
                                <option value="{!!$no !!}">{!! ucwords($no) !!}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8"></div>
                    </div>

                     <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                    Update</button>
                                </div>
                                <div class="form-group col-md-2"></div>
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
