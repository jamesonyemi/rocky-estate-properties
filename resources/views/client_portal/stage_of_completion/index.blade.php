@include('partials.client-portal.master_header')
<div>
    <div class="gallery-area">
     <div class="row">
         @if ( count($onsiteVisit) === 0 )
         <div class="col-lg-4 col-sm-6 col-md-6">
             <div class="single-gallery-image mb-30">
                 <p>No Image Available</p>
             </div>
         </div>
         @endif
 
         @if ( count($onsiteVisit) > 0 )
         @foreach ( $onsiteVisit as $item )
             @foreach ( json_decode($item->img_name) as $img)
             <div class="col-lg-4 col-sm-6 col-md-6">
                 <div class="single-gallery-image mb-30">
                     <img class="img-thumbnail rounded" src="{{ asset('/project_img/'.$img) }}" alt="Gallery Image" data-original="{{ asset('/project_img/'.$img) }}">
                 </div>
             </div>
         @endforeach
         @endforeach
         @endif
     </div>
 </div>
 <nav>
     <ul class="pagination justify-content-end">
         {!! $onsiteVisit->links() !!}
     </ul>
 </nav>
</div>


@include('partials.client-portal.footer')
