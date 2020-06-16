@include('partials.master_header')
        <!-- Start -->
        <h3>Stage of Completion </h3>
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="row">
                    <div >
                        <span>
                            <i class="badge badge-default">Project Owner:</i>
                               <i class="badge badge-primary"> {{ ($r->full_name) ? $r->full_name : $r->company_name  }} </i>
                            </span>
                    </div>
                    <div>
                        <span>
                            <i class="badge badge-default">Project Budget:</i>
                            <i class="badge badge-primary">
                                {{ !empty($r->project_budget) ? $r->project_budget : 'Not Specified yet'  }} </i>
                        </span>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-md-6 col-lg-12">
                            <label for="" style="float: right; clear: both;"> image preview</label>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-md-6 col-lg-12">
                            @include('stage_completion.gallery_modal')
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body">
            <form method="POST" action="{{ route('stage-of-completion.update', $r->id)}}" enctype="multipart/form-data" class="mt-5">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">

                        <div class="form-row">
                            <div class="col-1"></div>
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
                            <div class="col-1"></div>
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
                          </div>
                        </div>
                        <br>

                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="comment">Materials Purchased</label>
                                <textarea name="matpurchased" id="matpurchased"  cols="50" rows="4"  required class="form-control">
                                    {{ strip_tags($r->matpurchased) }}
                                </textarea>
                            </div>
                            <div class="form-group col-md-2"></div>
                            <div class="form-group col-md-4">
                                <label for="comment">Details of Amount Spent</label>
                                    <textarea name="amtdetails" id="amtdetails" cols="50" rows="4" required  class="form-control">
                                        {{ strip_tags($r->amtdetails)}}</textarea>
                                </div>
                        </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                    <div class="container">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i> Update Info</button>
                            </div>
                        <div class="form-group col-md-2"></div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
     <!-- End -->
<!-- End Main Content Wrapper -->
@include('partials.footer')
