@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Edit Payment</h3>
            </div>

            <div class="card-body"> 
                @foreach ($get_payments as $payment)
                <?php $encryptId = Crypt::encrypt($payment->id) ?>
                <form class="mt-5" action="{{ route('payments.update', $encryptId) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" id="" value="PUT">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="amt">Amount Received</label>
                            <input type="text" id="amt_received" name="amt_received" class="form-control" 
                                value="{{ old('amt_received', $payment->amt_received) }}" >
                        </div>
                        <div class="form-group col-md-2"></div>
                
                        <div class="form-group col-md-4">
                            <label for="title">Payment Mode</label>
                            <input type="text" id="paymentmode" name="paymentmode" class="form-control"
                                value="{{ old('paymentmode', $payment->paymentmode) }}" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="title">Bank Name</label>
                            <input type="text" id="bankname" name="bankname" class="form-control"
                            value="{{ old('amt_received', $payment->bankname) }}"  >
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Bank Branch</label>
                            <input type="text" id="bankbranch" name="bankbranch" class="form-control" 
                                value="{{ old('bankbranch', $payment->bankbranch) }}" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="title">Payment Date</label>
                            <input type="text" id="paymentdate" name="paymentdate" class="form-control"
                            value="{{ old('paymentdate', str_replace('-', '/', $payment->paymentdate)) }}"  >
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Cheque Number</label>
                            <input type="text" id="chequeno" name="chequeno" class="form-control" 
                                value="{{ old('chequeno', $payment->chequeno) }}" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Received From</label>
                            <input type="text" id="receivedfrom" name="receivedfrom" class="form-control" 
                            value="{{ old('receivedfrom', $payment->receivedfrom) }}" >
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Comments</label>
                            <input type="text" id="comments" name="comments" class="form-control" 
                                value="{{ old('comments', $payment->comments) }}" >
                        </div>
                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                   Update</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                      @endforeach
                </form> 
               
            </div>
        </div> 
        <br><br>
        <br><br>
        <br><br>
        <!-- End -->
 @include('partials.footer')
        

      