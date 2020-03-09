@include('partials.client-portal.master_header')
<br><br><br>
@foreach ($tracking as $key => $track)
<div class="timeline mb-30">
    <div class="timeline-month">
        {!! date("F, Y", strtotime( $track->created_at )) !!}
    </div>
    <div class="timeline mb-30">
        @switch( $track->status )
        @case("completed")
        <div class="timeline-month completed" style="background-color:#28a745" 
        data-toggle="tooltip" data-placement="right" title="{!! ucfirst($track->status) !!}">
            {!!  ucfirst($track->phase)  !!}         
        </div>
        @break
        @case("cancelled")
        <div class="timeline-month cancelled" style="background-color:#ec5447"
        data-toggle="tooltip" data-placement="right" title="{!! ucfirst($track->status) !!}">
            {!!  ucfirst($track->phase)  !!}         
        </div>
        @break
        @case("stalled")
        <div class="timeline-month stalled" style="background-color:#626e79" 
        data-toggle="tooltip" data-placement="right" title="{!! ucfirst($track->status) !!}">
            {!!  ucfirst($track->phase)  !!}         
        </div>
        @break
        @default
        <div class="timeline-month ongoing" style="background-color:#22a4b9"
        data-toggle="tooltip" data-placement="right" title="{!! ucfirst($track->status) !!}">
            {!!  ucfirst($track->phase)  !!}         
        </div>
        @break        
        @endswitch
        <div class="timeline-section">
            <div class="timeline-date">
                {!! date("d, l", strtotime( $track->uploaded_date )) !!}
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="timeline-box">
                        <div class="box-title">
                            <i class="bx bx-briefcase"></i> {!! $track->title !!}
                        </div>
    
                        <div class="box-content">
                            <div class="box-item"><strong>landmark</strong>: {!! $track->landmark !!}</div>
                            <div class="box-item"><strong>Location</strong>: {!! $track->location !!}</div>
                            <div class="box-item"><strong>Start Date</strong>: {!! date("l, jS M Y", strtotime( $track->created_at )) !!}</div>
                        </div>
    
                        <div class="box-footer">Owner- {!! Auth::user()->full_name !!}</div>
                    </div>
                </div>
    
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="timeline-box">
                        <div class="box-title">
                            <i class="bx bx-edit"></i> Job Edited
                        </div>
    
                        <div class="box-content">
                            <div class="box-item"><strong>Project Manager</strong>: Marlyn</div>
                            <div class="box-item"><strong>Supervisor</strong>: Carol</div>
                        </div>
    
                        <div class="box-footer">- Andro Smith</div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="row">
    <!-- Pagination-Counter-Start -->
   <div class="col-md-6">
       <nav>
           {{-- <ul class="pagination justify-content-start"> Page {!! ( $data["currentPage"] ) !!} of {!! $data["total"] !!} </ul> --}}
       </nav>
   </div>
    <!-- Pagination-Counter-End -->

   <!-- Pagination-Start -->
   <div class="col-md-6">
       <nav> 
           <ul class="pagination justify-content-end">{!! $tracking->links() !!} </ul>
       </nav>
   </div>
   <!-- Pagination-End -->
</div>
@include('partials.client-portal.footer')
