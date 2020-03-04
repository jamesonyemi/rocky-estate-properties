@include('partials.client-portal.master_header')
<!-- Main Content Layout -->
    <!-- Start Profile Area -->
    <section class="profile-area">
        <div class="profile-header mb-30">
            <div class="user-profile-images">
                <img src=" {!! asset('assets/img/profile-banner.jpg') !!} " class="cover-image" alt="image">
            </div>
            <div class="user-profile-nav"></div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                        <div class="row">
                            <div class="col-lg-4">
                                
                                <div class="card user-info-box mb-30">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3>Other Info</h3>   
                                    </div>

                                    <div class="card-body">
                                        <ul class="list-unstyled mb-0">
                                            @foreach ($visit as $project)
                                            <li class="d-flex">
                                                <i class='bx bx-map mr-2'></i>
                                                <span class="d-inline-block">Landmark <a href="#" class="d-inline-block">{!! $project->landmark  !!}</a></span>
                                            </li>
                                            <li class="d-flex">
                                                <i class='bx bx-calendar mr-2'></i>
                                                <span class="d-inline-block">Created On <a href="#" class="d-inline-block">{!! date("D F j, Y", strtotime($project->created_at))   !!}</a></span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="timeline-story-content">
                                    <div class="card mb-30">
                                        @foreach ($visit as $vcomment)
                                            
                                        
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="timeline-story-header d-flex align-items-center">
                                                <div class="info ml-3">
                                                    <h3>Comment</h3>
                                                    <span class="d-block">
                                                        {!! date("F j, Y", strtotime($project->date_of_visit)) !!} 
                                                        at {!! date("g:i a", strtotime($project->time_of_visit)) !!} </span>
                                                </div>
                                            </div>

                                            {{-- <div class="dropdown">
                                                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class='bx bx-dots-horizontal-rounded' ></i>
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
                                            </div> --}}
                                        </div>

                                        <div class="card-body">
                                            <p class="mb-0">{!! $vcomment->comments !!}</p>

                                            {{-- <div class="feedback-summary mt-4">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Like"><i class='bx bx-like'></i> 9898</a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Comment"><i class='bx bx-comment'></i> 898</a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Share"><i class='bx bx-share'></i> 354</a>
                                            </div> --}}
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="card mb-30">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div class="timeline-story-header d-flex align-items-center">   
                                                <div class="info ml-3">
                                                    <h3>Photos on Visit</h3>
                                                    <span class="d-block"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            @include('client_portal.onsite_visit.gallery')
                                            
                                            {{-- <div class="feedback-summary mt-4">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Like"><i class='bx bx-like'></i> 9898</a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Comment"><i class='bx bx-comment'></i> 898</a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Share"><i class='bx bx-share'></i> 354</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card user-events-box mb-30">
                    @foreach ( $visit as $item )
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>{!! $item->title !!}</h3>
                    </div>

                    <div class="card-body">
                        <ul class="list-unstyled d-flex flex-wrap mb-0">
                            <li>
                                <a href="#">
                                    <i class="bx bx-calendar"></i>
                                    <span>Date of Visit</span>
                                    {!! $item->date_of_visit !!}
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="bx bx-stats"></i>
                                    <span>Status</span>
                                    @switch($item->status)
                                        @case('completed')
                                            <span class="text-success">{!! ucfirst($item->status) !!}</span>
                                            @break
                                        @case('cancelled')
                                            <span class="text-danger">{!! ucfirst($item->status) !!}</span>
                                            @break
                                        @case('stalled')
                                            <span class="text-warning">{!! ucfirst($item->status) !!}</span>
                                            @break
                                        @default
                                        <span class="text-info">{!! ucfirst($item->status) !!}</span>
                                    @endswitch
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Profile Area -->
@include('partials.client-portal.footer')

