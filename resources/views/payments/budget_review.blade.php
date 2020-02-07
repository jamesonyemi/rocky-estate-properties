@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>New Payment</h3>
            </div>
            <div class="card-body">
                <form class="mt-5" action="{{route('budget-review') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="client">Project</label>
                            <select id="pid" name="pid" class="form-control custom-select" required>
                                <option value="">-- select --</option>
                                 @foreach ($clientWithProjects as $item)
                                 <option value="{{ $item->pid }}" class="text-capitalize">
                                     {{ ucwords( $item->project_title)  }}
                                 </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                        {{-- {{dd($currency)}} --}}
                        <div class="form-group col-md-2">
                            <label for="cur"> Currency </label>
                            <select id="cur" name="cur" class="form-control custom-select" required>
                                <option value="">-- select --</option>
                                 @foreach ($currency as $type)
                                 <option value="{{ $type }}" class="text-capitalize">
                                     {{ ucwords( $type)  }}
                                 </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="totalcost"> Estimated Budget</label>
                            <input type="number" step="2" id="initial_totalcost" name="initial_totalcost" class="form-control" required>
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
 <br><br>
        <!-- End -->
 @include('partials.footer')
        

      