@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>View Onsite Visit</h3>
            </div>
    <div class="card-body">
        @foreach ($getAllVisit as $visit)
            <?php $encryptId = Crypt::encrypt($visit->vid) ?>
            <form class="mt-5" action="{{ route('onsite-visit.update', $encryptId) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" id="" value="PUT">  
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="title">Client</label>
                            @foreach ($clientWithProjects as $item)
                                @if ( ($visit->clientid === $item->clientid) && ($visit->pid === $item->pid) )
                                <input type="text" id="clientid" name="clientid" class="form-control"
                                value="{{ old('clientid', ( $item->full_name ) ) }}" disabled >
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Project</label>
                            <input type="text" id="pid" name="pid" class="form-control"
                            value="{{ old('pid', ( $visit->title ) ) }}" disabled >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="title">Visit Date</label>
                            <input type="text" id="vdate" name="vdate" class="form-control"
                            value="{{ old('vdate', str_replace('-', '/', $visit->vdate)) }}" disabled >
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Comments</label>
                            <input type="text" id="comments" name="comments" class="form-control" 
                                value="{{ old('comments', $visit->comments) }}" required>
                        </div>
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
 @include('partials.footer')
        

      