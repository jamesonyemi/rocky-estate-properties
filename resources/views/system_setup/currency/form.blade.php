@include('partials.master_header')
    @include('partials.breadcrumb')
    <!-- End Breadcrumb Area -->
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Add New Currency Type</h3>
            </div>
            <div class="card-body">
                <form class="mt-5" action="{{route('currency.store') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_region">Currency Name (e.g Ghana Cedi):</label>
                            <input type="text" id="long_name" name="long_name"
                            class="form-control" required>
                        </div>
                        <div class="form-group col-md-2"></div>

                        <div class="form-group col-md-4">
                            <label for="title">Currency Code (e.g GHC):</label>
                            <input type="text" id="short_name" name="short_name" class="form-control" required maxlength="3">
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
 @include('partials.footer')
