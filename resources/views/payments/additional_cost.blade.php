@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Additonal Cost</h3>
            </div>
            <div class="card-body">
                <form class="mt-5" action="{{route('process-additional-cost') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="client">Client</label>
                            <select id="clientid" name="clientid" class="form-control custom-select" required>
                                <option value="">-- select --</option>
                                 @foreach ($clientWithProjects as $item)
                                 <option value="{{ $item->clientid }}" class="text-capitalize">
                                     {{ ucwords( $item->full_name)  }}
                                 </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                
                        <div class="form-group col-md-4">
                            <label for="pid">Project:</label>
                            <select id="pid" name="pid" class="required form-control" required></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="amt_add_on">Extra Expenses:</label>
                            <input type="number" step="0.1" id="amt_add_on" name="amt_add_on" class="form-control" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                
                        <div class="form-group col-md-4">
                            <label for="cheque-no">Type of Cost:</label>
                           <select name="cost_type_id" id="cost_type_id" class=" form-control custom-select">
                            <option value="">-- select --</option>
                               @foreach ($costType as $key => $type)
                           <option value="{{ $key }}"> {{ $type }}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="reason">Brief Explanation:</label>
                            <textarea name="reason" id="reason" cols="30" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="form-group col-md-2"></div>
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
        

      