<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin</div>

                <div class="panel-body">
                    <table class="table">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Name</th>
						  <th>Email</th>
						  <th>Phone</th>
						  <th>Textarea</th>
						</tr>
					  </thead>
					  <tbody>
						  @foreach($contact as $getcontact)
						<tr>
						  <td>@if(isset($getcontact->id)){{$getcontact->id}}@else  @endif</td>
						  <td>@if(isset($getcontact->name)){{$getcontact->name}}@else  @endif</td>
						  <td>@if(isset($getcontact->email)){{$getcontact->email}}@else  @endif</td>
						  <td>@if(isset($getcontact->phone)){{$getcontact->phone}}@else  @endif</td>
						  <td>@if(isset($getcontact->txtarea)){{$getcontact->txtarea}}@else  @endif</td>
						</tr>
						@endforeach
						</tbody>
					</table>
                </div>

            </div>
        </div>
    </div>
</div>
