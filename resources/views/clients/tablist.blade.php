@include('partials.master_header')
    <section class="profile-area">
        <div class="profile-header mb-30">
            <div class="" >
                <ul class="nav nav-tabs" role="tablist" >
                    <li class="nav-item">
                        <a class="nav-link active" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="true">Corporate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">Individual</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="timeline-story-content">
                                    <div class="card mb-30">
                                        <div class="card-body">
                                            <h3>Corporate Client</h3>
                                            @include('clients.corporate')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                        @include('clients.form')
                    </div>
                </div>
            </div>
            @include('partials.footer')     
       </div>
    </div>
</section>