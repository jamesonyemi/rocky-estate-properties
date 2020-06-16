@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>View Payment Details</h3>
            </div>
            <hr>
    <div class="card-body">
        @foreach ($get_payments as $payment)
                <form class="mt-4" >
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Client</label>
                            @foreach ($clientWithProjects as $item)
                                @if ( ($payment->clientid === $item->clientid) && ($payment->pid === $item->pid) )
                                <input type="text" id="clientid" name="clientid" class="form-control"
                                value="{{ old('clientid', ( $item->full_name ) ) }}" disabled >
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Project</label>
                            @foreach ($clientWithProjects as $item)
                            @if ( ($payment->clientid === $item->clientid) && ($payment->pid === $item->pid) )
                            <input type="text" id="pid" name="pid" class="form-control"
                            value="{{ old('pid', ( $item->project_title ) ) }}" disabled >
                            @endif
                        @endforeach
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
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
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Bank Name</label>
                            <input type="text" id="bankname" name="bankname" class="form-control"
                            value="{{ old('amt_received', $payment->bankname) }}" disabled >
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Bank Branch</label>
                            <input type="text" id="bankbranch" name="bankbranch" class="form-control"
                                value="{{ old('bankbranch', $payment->bankbranch) }}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Payment Date</label>
                            <input type="text" id="paymentdate" name="paymentdate" class="form-control"
                            value="{{ old('paymentdate', str_replace('-', '/', $payment->paymentdate)) }}" disabled >
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Cheque Number</label>
                            <input type="text" id="chequeno" name="chequeno" class="form-control"
                                value="{{ old('chequeno', $payment->chequeno) }}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Received By</label>
                            <input type="text" id="receivedby" name="receivedby" class="form-control"
                            value="{{ old('receivedby', ( $payment->receivedby === Auth::id()  ) ? ucfirst(Auth::user()->name) : '' ) }}" disabled >
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Received From</label>
                            <input type="text" id="receivedfrom" name="receivedfrom" class="form-control"
                                value="{{ old('receivedfrom', $payment->receivedfrom) }}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Comments</label>
                            <input type="text" id="comments" name="comments" class="form-control"
                                value="{{ old('comments', $payment->comments) }}" disabled>
                        </div>
                        <div class="form-group col-md-8"></div>

                    </div>
                      @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
