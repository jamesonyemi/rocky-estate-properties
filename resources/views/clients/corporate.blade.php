<hr style="background-color:fuchsia; opacity:0.1">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="mt-5" action="{{route('corporate-client') }}"  method="POST">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="c-name">Company Name</label>
            <input type="text" class="form-control " id="company_name" name="company_name" placeholder="" required>
        </div>
        <div class="form-group col-md-2">

        </div>
        <div class="form-group col-md-4">
            <label for="c-mobile">Mobile Number</label>
            <input type="text" class="form-control " id="mobile" name="mobile" placeholder="" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="p-email">Primary Email</label>
            <input type="email" class="form-control" placeholder="" id="email" name="email" required>
            <span id="signal-message"></span>
            </div>
                <div class="form-group col-md-2"> </div>
        <div class="form-group col-md-4">
            <label for="s-email">Secondary Email</label>
            <input type="email" class="form-control" placeholder="" id="secondary_email" name="secondary_email">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="p-addr">Postal Address</label>
            <input type="text" class="form-control" id="postal_addr" name="postal_addr" required>
        </div>
        <div class="form-group col-md-2">

        </div>
        <div class="form-group col-md-4">
            <label for="fax">Fax</label>
            <input type="text" class="form-control" id="fax"name="fax">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
              <label for="tel-no">Telephone Number</label>
              <input type="tel" class="form-control" id="tel_no"name="tel_no">
          </div>
          <div class="form-group col-md-2"> </div>
          <div class="form-group col-md-4">
            <label for="res-addr">Residential Address</label>
            <input type="text" name="res_addr" class="form-control" id="res_addr" required>
        </div>
      </div>
      <hr style="background-color:fuchsia; opacity:0.1">
      <div class="container">
          <div class="row">
              <div class="col text-center">
                  <button type="submit" id="btn-save" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                    Save</button>
                </div>
            <div class="form-group col-md-2"></div>
        </div>
      </div>
</form>
