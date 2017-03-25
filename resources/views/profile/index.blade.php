@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="margin-top:20px;">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

						<div class="row">
							<div class="col-lg-6">
				                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
				                    <label for="name" class="col-md-4 control-label">First Name</label>

				                    <div class="col-md-6">
				                        <input id="name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required autofocus>

				                        @if ($errors->has('first_name'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('first_name') }}</strong>
				                            </span>
				                        @endif
				                    </div>
				                </div>

								<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
				                    <label for="last_name" class="col-md-4 control-label">Last Name</label>

				                    <div class="col-md-6">
				                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>

				                        @if ($errors->has('last_name'))
				                            <span class="help-block">
				                                <strong>{{ $errors->first('last_name') }}</strong>
				                            </span>
				                        @endif
				                    </div>
				                </div>

				                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

				                    <div class="col-md-6">
				                        <p class="form-control-static">{{$user->email}}</p>
				                    </div>
				                </div>

								<div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
				                    <label for="mobile" class="col-md-4 control-label">Mobile</label>

				                    <div class="col-md-6">
				                        <input id="mobile" type="string" class="form-control" name="mobile" value="{{ $user->mobile }}" required>
										@if ($errors->has('mobile'))
						                    <span class="help-block">
						                        <strong>{{ $errors->first('mobile') }}</strong>
						                    </span>
						                @endif
				                        
				                    </div>
				                </div>

				                <div class="form-group">
				                    <div class="col-md-6 col-md-offset-4">
				                        <button type="submit" class="btn btn-primary">
				                            Save
				                        </button>
				                    </div>
				                </div>
							</div>

							<div class="col-lg-6">
								<img src="{{$user->profile_pic}}" alt="profile picture" style="height: 250px; width:250px;"></img><br />

								<div class="form-group{{ $errors->has('profile_pic') ? ' has-error' : '' }}">
									<input type="file" name="profile_pic" />
									@if ($errors->has('profile_pic'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('profile_pic') }}</strong>
				                        </span>
				                    @endif
								</div>
							</div>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
