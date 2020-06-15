@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30 mt-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>View Onsite Info</h3>
                @foreach ($getAllVisit as $visit)
        <?php $ownedBy  = ($visit->full_name) ? $visit->full_name : $visit->company_name  ?>
        <div class="row">
            <div class="col-md-12">
                <i class="text-center badge badge-primary">Project Owner: </i>
                    <i class="badge badge-primary">{{ $ownedBy}}</i>
            </div>
        </div>
    @endforeach
            </div>
    <div class="card-body">
        @foreach ($getAllVisit as $visit)
            <?php $encryptId = Crypt::encrypt($visit->vid) ?>
            <form class="mt-5" action="{{ route('onsite-visit.update', $encryptId) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Date of Visit </label>
                            <div class="list-group-item">
                                {{ old('vdate', date("l, jS F, Y", strtotime($visit->vdate) )) }}
                            </div>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Project</label>
                            <div class="list-group-item">
                                @foreach ($projects as $key => $value )
                                    @if ( in_array($visit->pid,[$value->pid]) )
                                    {{ old("pid", ucwords($value->title) ) }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Comments</label>
                            <div class="list-group-item">
                                {{ ( ($visit->comments) ) }}
                            </div>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="contact">Contact</label>
                                <div class="list-group-item">
                                    <div class="row">
                                        <div class="col-6 border-right">
                                            <i class="badge badge-primary">{{ $visit->phone1 }}</i>
                                        </div>
                                        <div class="col-6">
                                            <i class="badge badge-secondary
                                            ">{{ $visit->phone2 }}</i>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                    @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
