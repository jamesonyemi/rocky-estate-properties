@include('partials.client-portal.master_header')
<div class="welcome-area">
    <div class="row m-0 align-items-center">
        <div class="col-lg-5 col-md-12 p-0">
            <div class="welcome-content">
                <h1 class="mb-2"> <i class="bx bxs-building-house"></i> {!! strtoupper(' welcome to') !!} </h1>
                <p class="mb-0">{!! strtoupper('rocky properties online portal') !!}</p>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 p-0"> 
            <div class="welcome-img">
                <img src="{{ asset('assets/img/welcome-img.png') }}" alt="image">
            </div>
        </div>
    </div>
</div>
@include('partials.client-portal.footer')