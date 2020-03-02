<div class="gallery-area">
    <div class="row">
        @foreach ( $image as $item )
            @foreach ( json_decode($item) as $img)
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="single-gallery-image mb-30">
                    <img class="img-thumbnail rounded" src="{{ asset('/project_img/'.$img) }}" alt="Gallery Image" data-original="{{ asset('/project_img/'.$img) }}">
                </div>
            </div>
        @endforeach
        @endforeach
    </div>
</div>