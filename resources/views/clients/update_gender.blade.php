 <a style="margin:30px 0px 0px 35px;" href="#" id="genderStatus" 
 class="d-inline-block text-success mr-2 text-center" data-toggle="tooltip" data-placement="top" 
 title="" data-original-title="Change Gender Status">
 <i class="bx bx-edit"></i>
 </a>
 
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">New message</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        @foreach ($clients as $client)
        <form class="mt-5" action="{{ route('clients.update', $client->clientid) }}"  method="POST">
          {!! csrf_field() !!}
          <input name="_method" type="hidden" value="PUT">
            <div class="form-row">   
                 {{-- <div class="form-group col-md-2"> </div> --}}
                 <div class="form-group col-md-4">
                  <label for="validate_gender">Gender</label>
                  <select id="gender" name="gender" class="form-control custom-select"
                      required>
                      @foreach ($genders as $id => $gender_type)
                      <option value="{{ $gender_type->id }}" class="text-capitalize">{{ ucwords($gender_type->type)  }}</option>
                      @endforeach
                  </select>
              </div>
                
                </div>
                  
              @endforeach
         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary" id="change-gender">Save Changes</button>
       </div>
     </div>
   </div>
 </div>