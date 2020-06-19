<fieldset class="border p-2" >
    <legend  class="w-auto btn btn-outline-primary text-uppercase">Client Leader Board</legend>
    <div class="card-deck mb-30" style="margin-top: 10px">
        <div class="card p-0">
            <div class="card-body p-4">
                <h5 class="card-title font-weight-bold text-uppercase">Add New Client
                    <hr>
                    <div class="row bx-pull-left" >
                        <div class="row">
                            <div class="col-1"></div>
                            <a href="{!!url('/admin-portal/clients/create/cc-form') !!}" style="margin-left: 20px;">
                                <button type="button" class="btn btn-outline-primary">
                                    Corporate
                                </button>
                            </a>
                            <div class="col-1"></div>
                            <a href="{!!url('/admin-portal/clients/create/ic-form') !!}" style="margin-left: 20px;">
                                <button type="button" class="btn btn-outline-primary">
                                    Individual
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
        </div>
        <div class="card p-0">
            <div class="card-body p-4">
                <h5 class="card-title font-weight-bold text-uppercase">Corporate</h5>
                <hr>
                <div class="row">
                    <div class="col-1"></div>
                    <a href="{!!url('admin-portal/corporate-client-wp') !!}" >
                        <button type="button" class="btn btn-outline-primary">
                            With Project
                        </button>
                    </a>
                    <div class="col-1"></div>
                    <a href="{!!url('admin-portal/corporate-client-wnp') !!}" >
                        <button type="button" class="btn btn-outline-warning">
                            All List
                        </button>
                    </a>
                </div>
                <hr>
            </div>
        </div>
        <div class="card p-0">
            <div class="card-body p-4">
                <h5 class="card-title font-weight-bold text-uppercase">Individual</h5>
                <hr>
                <div class="row">
                    <div class="col-1"></div>
                <a href="{!!url('admin-portal/client-wp') !!}">
                    <button type="button" class="btn btn-outline-primary">
                        With Project
                    </button>
                </a>
                <div class="col-1"></div>
                <a href="{!!url('admin-portal/client-wnp') !!}">
                    <button type="button" class="btn btn-outline-warning">
                        All List
                    </button>
                </a>
                </div>
                <hr>
            </div>
        </div>
    </div>
 </fieldset>