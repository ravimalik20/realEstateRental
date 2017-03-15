@extends('layouts.main')

@section('extra=styles')

	<link rel="stylesheet" type="text/css" href="/css/index.css"></style>

@endsection

@section('content')

	<div class="jumbotron-wrapper">
        
        <div class="jumbotron">                                    

            <div class="container" data-bind="with: searchParametersViewModel">                                                                                                                                                                        

                <h1>Start your search:</h1>
                      
                <div class="row form-horizontal no-margin">

					<form method="GET" action="/listing">
						<div class="form-group">
		                    <div class="col-md-3">
		                        <!-- Campus -->
		                        <label for="CampusDropDown" class="control-label">Campus:</label>
		                        <div class="input-group">
		                            <span class="input-group-addon">
		                                <i class="fa fa-institution fa-fw"></i>
		                            </span>
		                            <select id="CampusDropDown" class="form-control">
										<option value="">Any</option>
									@if (isset($campuses) && count($campuses) > 0)
									@foreach ($campuses as $campus)
										<option value="{{$campus->id}}">{{$campus->name}}</option>
									@endforeach
									@endif
		                            </select>
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <!-- Accommodation Type -->
		                        <label for="AccommodationTypeDropDown" class="control-label">Housing Type:</label>
		                        <div class="input-group">
		                            <span class="input-group-addon">
		                                <i class="fa fa-building-o fa-fw"></i>
		                            </span>
		                            <select id="AccommodationTypeDropDown" class="form-control">
										<option value="">Any</option>
									@if (isset($housing_types) && count($housing_types) > 0)
									@foreach ($housing_types as $type)
										<option value="{{$type->id}}">{{$type->name}}</option>
									@endforeach
									@endif
		                            </select>
		                        </div>
		                    </div>

		                    <div class="col-md-3">
		                        <!-- Number of Bedrooms -->
		                        <label for="NumberOfBedroomsDropDown" class="control-label">Bedrooms</label>
		                        <div class="input-group">
		                            <span class="input-group-addon">
		                                <i class="fa fa-bed fa-fw"></i>
		                            </span>
		                            <select id="Select3" class="form-control">
										<option value="">Any</option>
									@if (isset($bedrooms) && count($bedrooms) > 0)
									@foreach ($bedrooms as $bedroom)
										<option value="{{$bedroom->id}}">{{$bedroom->name}}</option>
									@endforeach
									@endif
		                            </select>
		                        </div>
		                    </div>

		                    <div class="col-md-3">

		                        <!-- Number of Bathrooms -->
		                        <label for="NumberOfBathroomsDropDown" class="control-label">Bathrooms</label>

		                        <div class="input-group">
		                            <span class="input-group-addon">
		                                <i class="fa fa-male fa-fw"></i>
		                            </span>
		                            <select id="Select4" class="form-control">
										<option value="">Any</option>
									@if (isset($bathrooms) && count($bathrooms) > 0)
									@foreach ($bathrooms as $bathroom)
										<option value="{{$bathroom->id}}">{{$bathroom->name}}</option>
									@endforeach
									@endif
		                            </select>
		                        </div>

		                    </div>

		                </div>
		                <!-- /.form-group -->                  

		                <div class="form-group">

		                    <div class="col-md-6" data-bind="with: searchParameters.priceRange">

		                        <!-- Price Range -->
		                        <label for="PriceRange" class="control-label">Price Range:</label>

		                        <div class="input-group" id="PriceRange">
		                            <span class="input-group-addon">
		                                <i class="fa fa-dollar fa-fw"></i>
		                            </span>
		                            <select id="MinPriceDropDown" class="form-control">
									@if (isset($price_ranges) && count($price_ranges) > 0)
									@foreach ($price_ranges as $range)
										<option value="{{$range->name}}">{{$range->name}}</option>
									@endforeach
									@endif
		                            </select>
		                            <span class="input-group-addon fa-fw">to</span>
		                            <select id="MaxPriceDropDown" class="form-control">
										<option value="">Unlimited</option>
									@if (isset($price_ranges) && count($price_ranges) > 0)
									@foreach ($price_ranges as $range)
										<option value="{{$range->name}}">{{$range->name}}</option>
									@endforeach
									@endif
		                            </select>
		                        </div>

		                    </div>

		                    <div class="col-md-6">

		                        <label for="UtilitiesIncludedOnlyCheckbox" class="control-label">&nbsp;</label>

		                        <!-- Utilities Included Only -->
		                        <div class="checkbox">
		                            <label>
		                                <input type="checkbox" id="UtilitiesIncludedOnlyCheckbox" data-bind="checked: searchParameters.utilitiesIncludedOnly" />
		                                <span>Utilities included only</span>
		                            </label>
		                        </div>
		                        
		                    </div>

		                </div>
		                <!-- /.form-group -->

		                <br />                    

		                <div class="form-group">
		                    <div class="col-md-12 text-right">
		                        <button class="btn btn-lg btn-primary" style="width: 200px;" type="submit">Search</button>
		                    </div>                        
		                </div>

					</form>

                </div>
            </div>

        </div>

    </div>   
    
    <div class="content-section">

        <div class="container">

            <h1>Landlord Account</h1>

            <div class="row">

                <div class="col-sm-12 col-md-4">

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-12">
                            <i class="fa fa-cloud-upload landlord-account-icon"></i>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-12">

                            <p class="lead text-muted">Our streamlined service for landlords allows you to create professional listings within minutes.</p>


                            <a href="/Landlord/CreateNewAccount.aspx" style="width: 180px;" class="btn btn-lg btn-success">Create an account</a>

                            <span style="margin-left: 1em; margin-right: 1em;">or</span>

                            <a href="/landlord/SignIn.aspx">Sign In&nbsp;<i class="fa fa-sign-in"></i></a>
                        </div>

                    </div>                                                                          
                    
                </div>

                <br />

                <!-- Account Sign Up -->
                <div class="col-sm-6 col-md-4">
                    <div class="panel price-panel account-sign-up">
                        <div class="panel-heading">Account Sign Up</div>
                        <div class="panel-body">

                            <!-- Price -->
                            <div class="price">
                                <span class="note">$</span>
                                <span class="value">0</span>
                            </div>

                            <p>FREE</p>

                        </div>
                        <div class="panel-footer">
                            <ul class="price-item-list">
                                <li>Create and manage listings</li>
                                <li>Preview your listings before you pay</li>
                                <li>Manage your Landlord profile</li>
                            </ul>                            
                        </div>
                    </div>
                </div>

                <!-- Listing Fee -->
                <div class="col-sm-6 col-md-4">
                    <div class="panel price-panel listing-fee">
                        <div class="panel-heading">Listing Fee</div>
                        <div class="panel-body">

                            <!-- Price -->
                            <div class="price">
                                <span class="note">$</span>
                                <span class="value" data-bind="text: listingDuration().price">&nbsp;</span>
                            </div>

                            <p>per listing/<span data-bind="text: listingDuration().description.toLowerCase()"></span></p>

                        </div>
                        <div class="panel-footer">
                            <ul class="price-item-list">
                                <li>Upload up to <b>15</b> photos</li>
                                <li>Pay with your <b>VISA</b> or <b>MasterCard</b></li>
                                <li>Admin reviewed listings</li>
                            </ul>                            
                        </div>
                    </div>
                </div>                

            </div>

        </div>

    </div>

@endsection
