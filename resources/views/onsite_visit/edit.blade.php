@include('partials.master_header')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Edit Onsit Visit Info</h3>
                @foreach ($getAllVisit as $visit)
        <?php $ownedBy  = ($visit->full_name) ? $visit->full_name : $visit->company_name  ?>
        <div class="row">
            <div class="col-md-12">
                <i class="text-center badge badge-primary">Project Owner: </i>
                    <i class="badge badge-primary">{{ $ownedBy}}</i>
            </div>
        </div>
    @endforeach
            </div>
    <div class="card-body">
        @foreach ($getAllVisit as $visit)
            <?php $encryptId = Crypt::encrypt($visit->vid) ?>
            <form class="mt-5" action="{{ route('onsite-visit.update', $encryptId) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" id="" value="PUT">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="title">Date of Visit </label>
                            <input type="date" id="vdate" name="vdate" class="form-control"
                            value="{{ old('vdate', $visit->vdate) }}"  >
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="bank-brank">Project</label>
                            <select class="custom-select" name="pid" id="pid" required>
                            @foreach ($projects as $key => $value )
                                <option value="{{ $value->pid }}" {{ old('pid', in_array($visit->pid,[$value->pid]) ? $visit->pid : 'null') == $visit->pid ? 'selected' : '' }}>
                                    {{ ucwords($value->title) }}
                                </option>
                             @endforeach
                             </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="project_state">Comments</label>
                                <textarea name="comments" id="comments" cols="30" rows="5" class="form-control" required dir="ltr">
                                    {{ old('comments', ($visit->comments)) }}
                                </textarea>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                        </div>
                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                  Update</button>
                              </div>
                              <div class="form-group col-md-2"></div>
                      </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
