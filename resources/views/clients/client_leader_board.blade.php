<fieldset class="border p-2" >
    <legend  class="w-auto btn btn-outline-primary text-uppercase">Client Leader Board</legend>
    <div class="card-deck mb-30" style="margin-top: 10px">
        <div class="card p-0">
            <div class="card-body p-4">
                <h5 class="card-title font-weight-bold text-uppercase">Action Button
                    <hr>
                    <div class="row bx-pull-left" >
                        <a href="{!!url('admin-portal/clients/create') !!}" style="margin-left: 20px;">
                            <button type="button" class="btn btn-outline-primary">
                                Add New Client
                            </button>
                        </a>
                        {{-- <a href="{!!url('admin-portal/clients/create') !!}" style="margin-left: 20px;">
                            <button type="button" class="btn btn-outline-primary">
                                All Clients
                            </button>
                        </a> --}}
                    </div>
                </div>
        </div>
        <div class="card p-0">
            <div class="card-body p-4">
                <h5 class="card-title font-weight-bold text-uppercase">Corporate</h5>
                <hr>
                <div class="row">
                    <a href="{!!url('admin-portal/corporate-client-wp') !!}" style="margin-left: 20px;">
                        <button type="button" class="btn btn-outline-primary">
                            With Project
                        </button>
                    </a>
                    <a href="{!!url('admin-portal/corporate-client-wnp') !!}" style="margin-left: 20px;">
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
                <a href="{!!url('admin-portal/client-wp') !!}" style="margin-left: 20px;">
                    <button type="button" class="btn btn-outline-primary">
                        With Project
                    </button>
                </a>
                <a href="{!!url('admin-portal/client-wnp') !!}" style="margin-left: 20px;">
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