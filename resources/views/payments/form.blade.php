@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>New Payment</h3>
            </div>
            <hr>
            <div class="card-body">
                <form class="mt-4" action="{{route('payments.store') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="client">Client</label>
                            <select id="clientid" name="clientid" class="form-control custom-select" required>
                                <option value="">---select---</option>
                                 @foreach ($clientWithProjects as $item)
                                 <option value="{{ $item->clientid }}" class="text-capitalize">
                                     {{ ucwords( $item->full_name)  }}
                                 </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="pid">Project:</label>
                            <select id="pid" name="pid" class="required form-control" required></select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_region">Amount Received:</label>
                            <input type="number" step="0.1" id="amt_received" name="amt_received" class="form-control" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="rfrom">Received From:</label>
                            <input type="text"  id="receivedfrom" name="receivedfrom" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4">
                            <label for="paymode">Payment Mode:</label>
                            <select id="paymentmode" name="paymentmode" class="form-control custom-select" required>
                                <option value="">--select--</option>
                                @foreach ($paymode as $key => $item)
                                <option value="{{ $key }}"> {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="title">Payment Date (format-- mm/dd/yy):</label>
                        <input type="date" id="paymentdate" name="paymentdate" value="{{ date('Y-m-d') }}" max="{{date('Y-m-d') }}" class="form-control" required>
                            <span class="badge badge-pill badge-danger" id="error-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                            <span class="badge badge-pill badge-success" id="success-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                    </div>
                    </div>
                    <div class="form-row" id="bank">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4" >
                            <label for="bank-name">Bank Name:</label>
                            <input type="text" id="bankname" name="bankname" class="form-control" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Bank Branch:</label>
                            <input type="text" id="bankbranch" name="bankbranch" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="form-group col-md-4 cheque-no">
                            <label for="cheque-no">Cheque Number:</label>
                            <input type="text" id="chequeno" name="chequeno" class="form-control" required>
                        </div>
                        <div class="form-group col-md-2 hide-me"></div>
                        <div class="form-group col-md-4">
                            <label for="cheque-no">Comment:</label>
                            <textarea name="comments" id="comments" cols="30" rows="2" class="form-control" required></textarea>
                        </div>
                    </div>
                     <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                        <div class="col-2"></div>
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                   Save</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>

            </div>
        </div>
 <br><br>
        <!-- End -->
 @include('partials.footer')

 <script>
 ( (e)  => {
     let payMode = $('#paymentmode');
     let targets = $('#bank, .cheque-no, .hide-me');
     let mode = payMode.on('change',  () => {
        switch (payMode.select().val()) {
            case 'cash':
            case 'mobile-money':
                targets.remove();
            break;

            case 'cheque':
            case 'cheque + cash':
                window.location.reload();
                break;
        }

         });
    })();
 </script>

<script>
    'use strict';
    jQuery(document).ready(function ()
    {
        jQuery('select[name="clientid"]').on('change', function(){
            var clientID = jQuery(this).val();
            if(clientID)
            {
                jQuery.ajax({
                    url : '/payments/create/'+clientID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                    console.log(data);
                    jQuery('input[name="receivedfrom"]').empty();
                    jQuery.each(data, function(key,value){
                        let fulName     = value.title+ ' '+ value.fname+ ' '+ value.lname;
                        let targetInput = $('input[name="receivedfrom"].form-control');
                        let clientName  = targetInput.val(fulName);
                        console.log((fulName));
                    });
                    }
                });
            }
            else
            {
                $('input[name="receivedfrom"]').empty();
            }
        });
    });
    </script>

<script>
    ( function () {
        let paymentdate = $('input[type="date"].form-control');
        console.log(paymentdate);
        paymentdate.on('change', function() {
            let formatedDate = $('#date');
            formatedDate.hide();
            paymentdate.fadeIn();
        });

    })();
</script>

<script>
     function AlertMsg(params, msg) {
        let targetElement = params;
        let msgContent    = targetElement.textContent;
        let msgText       = targetElement.val(targetElement.text(msg));
        msgContent        = msgText;
    };
</script>
