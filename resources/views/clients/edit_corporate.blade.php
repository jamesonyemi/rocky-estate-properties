@include('partials.master_header')
<div class="card mb-30">
    <h3>Edit Corporate Info</h3>
    <hr style="background-color:fuchsia; opacity:0.1">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="card-body">
@foreach ($corporate as $client)
<form class="mt-5" action="{{route('update-corporate-client', $client->clientid) }}"  method="POST">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PUT">
    <div class="form-row">
        <div class="form-group col-md-1"></div>
        <div class="form-group col-md-4">
            <label for="c-name">Company Name</label>
            <input type="text" class="form-control " value="{!! old('company_name', $client->cc_company_name) !!}" id="company_name" name="company_name" placeholder="">
        </div>
        <div class="form-group col-md-2">

        </div>
        <div class="form-group col-md-4">
            <label for="c-mobile">Mobile Number</label>
            <input type="text" class="form-control " value="{!! old('mobile', $client->cc_mobile) !!}" id="mobile" name="mobile" placeholder="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-1"></div>
        <div class="form-group col-md-4">
            <label for="p-email">Primary Email</label>
            <input type="email" class="form-control" value="{!! old('primary_email', $client->email) !!}" placeholder="" id="primary_email" name="primary_email">
            </div>
                <div class="form-group col-md-2"> </div>
        <div class="form-group col-md-4">
            <label for="s-email">Secondary Email</label>
            <input type="email" class="form-control" value="{!! old('secondary_email', $client->cc_secondary_email) !!}" placeholder="" id="secondary_email" name="secondary_email">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-1"></div>
        <div class="form-group col-md-4">
            <label for="p-addr">Postal Address</label>
            <input type="text" class="form-control" value="{!! old('postal_addr', $client->cc_postal_addr) !!}" id="postal_addr" name="postal_addr" required>
        </div>
        <div class="form-group col-md-2">

        </div>
        <div class="form-group col-md-4">
            <label for="fax">Fax</label>
            <input type="text" class="form-control" value="{!! old('fax', $client->cc_fax) !!}" id="fax"name="fax">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-1"></div>
        <div class="form-group col-md-4">
              <label for="tel-no">Telephone Number</label>
              <input type="tel" class="form-control" value="{!! old('tel_no', $client->cc_tel_no) !!}" id="tel_no"name="tel_no">
          </div>
          <div class="form-group col-md-2"> </div>
          <div class="form-group col-md-4">
            <label for="res-addr">Residential Address</label>
          <input type="text" name="res_addr" value="{!! old('res_addr', $client->cc_res_addr) !!}" class="form-control" id="res_addr" required>
        </div>
      </div>
      <hr style="background-color:fuchsia; opacity:0.1">
      <div class="container">
          <div class="row">
        <div class="form-group col-md-2"></div>
              <div class="col text-center">
                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                    Save Changes</button>
                </div>
            <div class="form-group col-md-2"></div>
        </div>
      </div>
</form>
 @endforeach
        </div>
    </div>
</div>
@include('partials.footer')