@include('partials.master_header')
<div class="card mb-20">
    <div class="card-body">
    <section class="profile-area">
        <div class="profile-header mb-20">
            <div class="row" >
                <ul class="row" >
                    <li class="btn btn-primary" id="btn-corporate">Corporate</li>
                    <div class="col-1"></div>
                    <li class="btn btn-primary" id="btn-individual">Individual </li>
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
                                        <div class="card-body" id="cc">
                                            <h3>Corporate Client</h3>
                                            @include('clients.corporate')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                        @include('clients.form')
                    </div> --}}
                    <div class="tab-pane fade" id="cc-individual" role="tabpanel" aria-labelledby="about-tab">
                        <div class="row">
                            <div class="col-lg-12">
                        @include('clients.form')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="flex-grow-1"></div>

@include('partials.footer')

<script>
    $("#btn-corporate").click(function(){
  $("#cc-individual").show();
});
</script>