@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>View Onsite Visit</h3>
            </div>
    <div class="card-body">
        <form class="mt-5" >
            @foreach ($getAllVisit as $visit)
                    {{ csrf_field() }}  
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
                                value="{{ old('comments', $visit->comments) }}" disabled>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
        

      