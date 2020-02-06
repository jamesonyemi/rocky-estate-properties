@include('partials.header')
@include('partials.side_menu')

<!-- End Sidemenu Area -->

<!-- Main Content Wrapper -->
<div class="main-content d-flex flex-column">
    <!-- Top Navbar -->
    <!-- Top Navbar Area -->
    @include('partials.topnav')
    <!-- End Top Navbar Area -->

    <!-- Main Content Layout -->
    <!-- Breadcrumb Area -->
    @include('partials.breadcrumb')
    <!-- End Breadcrumb Area -->


        <!-- Start -->

        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>View Payment</h3>
            </div>

            <div class="card-body">
        @foreach ($get_payments as $payment)
                <form class="mt-5" >
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="amt">Amount Received</label>
                            <input type="text" id="amt_received" name="amt_received" class="form-control" 
                                value="{{ old('amt_received', $payment->amt_received) }}" disabled>
                        </div>
                        <div class="form-group col-md-2"></div>
                
                        <div class="form-group col-md-4">
                            <label for="title">Payment Mode</label>
                            <input type="text" id="paymentmode" name="paymentmode" class="form-control"
                                value="{{ old('paymentmode', $payment->paymentmode) }}" disabled>
                        </div>
                    </div>
                      @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
        

      