@include('partials.master_header')
@include('partials.success_alert')

        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Project Document</h3>
            </div>
            <div class="card-body">
<form action="{{ route('project-docs.store') }}" method="POST"  class="mt-3" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
    <div class="col col-4">
        <div class="custom-control custom-checkbox mb-3">
            <label class="" for="ready_document">Documents Already Available</label>
            <select class="custom-select" required name="is_ready" id="is_ready">
                <option value="">--select--</option>
                <option value="yes">{{ ucfirst("yes") }}</option>
                <option value="no">{{ ucfirst("no") }}</option>
            </select>
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="col col-2"></div>
<div class="col col-4">
    <div class="custom-control custom-radio">
        <label class="" for="document_submitted">Documents Submitted</label>
        <select class="custom-select" required name="is_submitted" id="is_submitted">
            <option value="">--select--</option>
            <option value="yes">{{ ucfirst("yes") }}</option>
            <option value="no">{{ ucfirst("no") }}</option>
        </select>
    </div>

</div>

</div>
<div class="row">
    <div class="col col-4">
        <div class="custom-control custom-radio mb-3">
            <label class="" for="document_prepared">Documents Prepared by Company</label>
            <select class="custom-select" required name="is_prepared" id="is_prepared">
                <option value="">--select--</option>
                <option value="yes">{{ ucfirst("yes") }}</option>
                <option value="no">{{ ucfirst("no") }}</option>
            </select>
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="col col-2"></div>
    <div class="col col-4">
        <div class="custom-control custom-radio mb-3">
            <label class="" for="document_prepared">Project</label>
            <select class="custom-select" required name="pid" id="pid">
                <option value="">--select--</option>
               @foreach ($clientWithProjects as $key => $value )
               <option value="{{ $value->pid }}">{{ ucfirst($value->project_title) }}</option>
               @endforeach
            </select>
            <div class="invalid-feedback"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-4" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="You can attach one or more documents">
        <div class="custom-control custom-radio mb-3">
            <label for="document">Attach Documents</label>
            <input type="file" class="form-control" accept=".pdf,.doc,.docx,.xl,.xlx" max="50000" id="docname" name="docname[]" multiple="" required="">
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="col col-2"></div>
    <div class="col col-4">
        <div class="custom-control custom-radio mb-3">
            {{-- <label class="" for="document_prepared">Project</label> --}}            
            <div class="invalid-feedback"></div>
        </div>
    </div>
</div>
<hr style="background-color:fuchsia; opacity:0.1">
<div class="container">
    <div class="row">
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
        <!-- End -->

    @include('partials.footer')