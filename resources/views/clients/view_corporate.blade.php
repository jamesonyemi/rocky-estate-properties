@include('partials.master_header')
<div class="card mb-30 mt-4">
    <div class="row">
        <h3>View Corporate Info</h3>
        <div class="col-md-8"></div>
        <div class="row">
            <div>
                <a href="{!! url()->previous()!!}" class="btn btn-outline-primary btn-sm waves-effect waves-light" >Back</a>
            </div>
        </div>
    </div>
    <hr style="background-color:fuchsia; opacity:0.1">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-body">
            @foreach ($corporate as $client)
            <form class="mt-5">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                        <label for="c-name">Company Name</label>
                        <input type="text" class="form-control " value="{!! old('company_name', $client->cc_company_name) !!}" id="company_name" name="company_name" placeholder="" disabled>
                    </div>
                    <div class="form-group col-md-2">

                    </div>
                    <div class="form-group col-md-4">
                        <label for="c-mobile">Mobile Number</label>
                        <input type="text" class="form-control " value="{!! old('mobile', $client->cc_mobile) !!}" id="mobile" name="mobile" placeholder="" disabled >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                        <label for="p-email">Primary Email</label>
                        <input type="email" class="form-control" value="{!! old('primary_email', $client->email) !!}"  placeholder="" id="primary_email" name="primary_email" disabled>
                        </div>
                            <div class="form-group col-md-2"> </div>
                    <div class="form-group col-md-4">
                        <label for="s-email">Secondary Email</label>
                        <input type="email" class="form-control" value="{!! old('secondary_email', $client->cc_secondary_email) !!}"  placeholder="" id="secondary_email" name="secondary_email" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                        <label for="p-addr">Postal Address</label>
                        <input type="text" class="form-control" value="{!! old('postal_addr', $client->cc_postal_addr) !!}" disabled id="postal_addr" name="postal_addr" >
                    </div>
                    <div class="form-group col-md-2">

                    </div>
                    <div class="form-group col-md-4">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control" value="{!! old('fax', $client->cc_fax) !!}" id="fax"name="fax" disabled >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-1"></div>
                    <div class="form-group col-md-4">
                          <label for="tel-no">Telephone Number</label>
                          <input type="tel" class="form-control" value="{!! old('tel_no', $client->cc_tel_no) !!}" id="tel_no"name="tel_no" disabled>
                      </div>
                      <div class="form-group col-md-2"> </div>
                      <div class="form-group col-md-4">
                        <label for="res-addr">Residential Address</label>
                      <input type="text" name="res_addr" value="{!! old('res_addr',  $client->cc_res_addr) !!}" class="form-control" id="res_addr" disabled>
                    </div>
                  </div>
            </form>
            <br><br>
            @endforeach
        </div>
    </div>
</div>

@include('partials.footer')