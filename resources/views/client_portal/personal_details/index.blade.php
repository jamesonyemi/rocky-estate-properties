@include('partials.client-portal.master_header')
    <br><br><br>
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Personal Details</h3>
            </div>
           
            <div class="card-body">
            <form class="mt-5" action="#" method="#">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="first_name">Full Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" 
                            value="{!! $clients->full_name !!}" disabled>        
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="middle_name">Client Primary Phone</label>
                        <input type="text" class="form-control" name="primary_contact" id="primary_contact"
                            value="{!! $clients->phone1 !!}" disabled >        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{!! $clients->email !!}" disabled>  
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="nat">Nationality</label>
                            <input type="text" class="form-control" name="Nationality" value="{!! $clients->nationality !!}" disabled>  
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="dob">Date Of Birth</label>
                            <input type="text" class="form-control" name="dob" value="{!! $clients->dob !!}" disabled>
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="kin">Next of Kin</label>
                            <input type="text" class="form-control" name="nkin" value="{!! $clients->nok !!}" disabled>  
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="rel-kin">Relationship to Next of Kin</label>
                            <input type="text" class="form-control" name="rel-kin" value="{!! ucfirst($clients->relationship) !!}" disabled>
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="kin">Phone Number of Next of Kin</label>
                            <input type="text" class="form-control" name="nkin" value="{!! $clients->nokphone !!}" disabled>  
                        </div>
                    </div><br><br>
                </form>
            </div>
        </div>
        <!-- End -->
        <div class="flex-grow-1"></div>
 @include('partials..client-portal.footer')
</div>

<script>
    ( function () {

        let password    = $('input[name="password"]');
        let confirmPwd  = $('input[name="password_confirmation"]');
        let error       = $('#error-msg');
        let success     = $('#success-msg');
        let saveButton  = $('button[type="submit"]');
    
    confirmPwd.on('keypress,keyup, keydown, change', function () {
        if ( confirmPwd.val() === password.val() ) {

            let accepted = function () {
                success.show();
                error.hide();
                saveButton.removeAttr("disabled","disabled");
                AlertMsg(success, "\n"+ "Accepted");
            } 
            return accepted();
        }
        
            if (  confirmPwd.val() !== password.val()  ) {

                let rejected = function () {
                    success.hide();
                    error.show();
                    saveButton.attr("disabled","disabled");
                    AlertMsg(error, "\n"+ "Password mis-match");
                } 
                return rejected();
            }

            // let comparePwd  =   ( password.val() === confirmPwd.val() ? accepted() : rejected() );
         });
        
    password.on('keypress,keyup, keydown, change', function () {
        if ( password.val() === confirmPwd.val()   ) {

            let accepted = function () {
                success.show();
                error.hide();
                saveButton.removeAttr("disabled","disabled");
                AlertMsg(success, "\n"+ "Accepted");
            } 
            return accepted();
        }
        
            if (  password.val() !== confirmPwd.val()  ) {

                let rejected = function () {
                    success.hide();
                    error.show();
                    saveButton.attr("disabled","disabled");
                    AlertMsg(error, "\n"+ "Password mis-match");
                } 
                return rejected();
            }

            // let comparePwd  =   ( password.val() === confirmPwd.val() ? accepted() : rejected() );
         });

    })();

    function AlertMsg(params, msg) {
        let targetElement = params;
        let msgContent    = targetElement.textContent;
        let msgText       = targetElement.val(targetElement.text(msg));
        msgContent        = msgText;
    };
</script>
