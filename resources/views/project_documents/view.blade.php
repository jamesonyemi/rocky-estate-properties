@include('partials.master_header')
    <!-- Start -->
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card mb-30">
                @foreach ($owners as $owner)
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i><b>Project Owner  <br></b>{{ $owner->full_name }}</i></span>
                    <span><i><b>Project  <br></b>{{ $owner->title}}</i></span>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Project Documents</h3>
                </div>

                <div class="card-body widget-todo-list">
                    <ul>
                        <li>
                    @foreach ($projectDocs as $item)
                        @foreach (json_decode($item->doc_link) as $doc)
                        <iframe src="{{ $doc }}" frameborder="0" width="500px" height="500px"  style="border:none;"></iframe>            
                        @endforeach
                    @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
@include('partials.footer')