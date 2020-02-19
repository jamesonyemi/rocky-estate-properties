@include('partials.master_header')
<div class="card mb-30">
    <h3>View Corporate Info</h3>
    <hr style="background-color:fuchsia; opacity:0.1">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-body">
            @foreach ($corporate as $client)
            <form class="mt-5">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="c-name">Company Name</label>
                        <input type="text" class="form-control " value="{!! old('company_name', $client->company_name) !!}" id="company_name" name="company_name" placeholder="" disabled>
                    </div>
                    <div class="form-group col-md-2">
            
                    </div>
                    <div class="form-group col-md-4">
                        <label for="c-mobile">Mobile Number</label>
                        <input type="text" class="form-control " value="{!! old('mobile', $client->mobile) !!}" id="mobile" name="mobile" placeholder="" disabled >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="p-email">Primary Email</label>
                        <input type="email" class="form-control" value="{!! old('primary_email', $client->primary_email) !!}"  placeholder="" id="primary_email" name="primary_email" disabled>
                        </div>
                            <div class="form-group col-md-2"> </div>    
                    <div class="form-group col-md-4">
                        <label for="s-email">Secondary Email</label>
                        <input type="email" class="form-control" value="{!! old('secondary_email', $client->secondary_email) !!}"  placeholder="" id="secondary_email" name="secondary_email" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="p-addr">Postal Address</label>
                        <input type="text" class="form-control" value="{!! old('postal_addr', $client->postal_addr) !!}" disabled id="postal_addr" name="postal_addr" >
                    </div>
                    <div class="form-group col-md-2">
            
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control" value="{!! old('fax', $client->fax) !!}" id="fax"name="fax" disabled >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                          <label for="tel-no">Telephone Number</label>
                          <input type="tel" class="form-control" value="{!! old('tel_no', $client->tel_no) !!}" id="tel_no"name="tel_no" disabled>
                      </div>
                      <div class="form-group col-md-2"> </div>
                      <div class="form-group col-md-4">
                        <label for="res-addr">Residential Address</label>
                      <input type="text" name="res_addr" value="{!! old('res_addr',  $client->res_addr) !!}" class="form-control" id="res_addr" disabled>
                    </div>
                  </div>
            </form>
            @endforeach
        </div>
    </div>
</div>

@include('partials.footer')