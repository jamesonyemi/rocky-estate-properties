   <h4><i class="glyphicon glyphicon-picture"></i> Display Data Image    </h4>
   <table class="table table-bordered table-hover table-striped">
    <thead>
    <tr><th>#</th>
        <th>Picture</th>
    </tr>
    </thead>
    <tbody>
@foreach($stageOfCompletionImg as $image)
       <tr><td>{{$image->id}}</td>
           <td> <?php foreach (json_decode($image->img_name) as $picture) { ?>
                 <img src="{{ asset('/stage_of_completion_img/'.$picture) }}" style="height:120px; width:200px"/>
                <?php } ?>
           </td>
      </tr>
        @endforeach
    </tbody>
   </table>