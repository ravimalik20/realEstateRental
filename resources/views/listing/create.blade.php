@extends('layouts.main')

@section('extra-styles')

	<style>
		.form-group {
			height: 30px;
			margin-bottom: 20px;
		}

		.wizard .content {
			min-height: 100px;
		}
		.wizard .content > .body {
			width: 100%;
			height: auto;
			padding: 15px;
			position: relative;
		}
	</style>

@endsection

@section('extra-scripts')

	<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
	<script src="/assets/listing/create.js"></script>

@endsection

@section('content')

<section id="property" class="padding">
	<div class="container property-details">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-uppercase">Create Listing</h2>

				<form id="example-advanced-form" method="POST"
				@if (isset($listing))
					action="/listing/{{$listing->id}}"
				@else
					action="/listing"
				@endif
				>
					{{ csrf_field() }}

					@if (isset($listing))
						{{ method_field('PUT') }}
					@endif

					<h3>Geographic</h3>
					<fieldset>
						<div class="row">
							<div class="col-lg-6">
								  <div class="form-group">
									<label class="control-label col-sm-2" for="email">Campus</label>
									<div class="col-sm-10">
									  <select class="form-control" name="campus_id" required>
										  @if (isset($campuses) && count($campuses) > 0)
										@foreach ($campuses as $campus)
											<option value="{{$campus->id}}" data-lat="{{$campus->lat}}" data-lng="{{$campus->lng}}"
											@if (isset($listing) && $listing->campus_id == $campus->id)
												selected
											@endif
											>{{$campus->name}}</option>
										@endforeach
										@endif
									  </select>
									</div>
								  </div>
								  <div class="form-group">
									<label class="control-label col-sm-2" for="email">Program</label>
									<div class="col-sm-10">
									  <select class="form-control" name="program_id" required>
										  @if (isset($programs) && count($programs) > 0)
										@foreach ($programs as $program)
											<option value="{{$program->id}}"
											@if (isset($listing) && $listing->program_id == $program->id)
												selected
											@endif
											>{{$program->name}}</option>
										@endforeach
										@endif
									  </select>
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" name="address" required
										@if (isset($listing))
											value="{{$listing->address}}"
										@endif
										>
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">City</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" name="city" required
										@if (isset($listing))
											value="{{$listing->city}}"
										@endif
										>
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Province</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" name="province" required
										@if (isset($listing))
											value="{{$listing->province}}"
										@endif
										>
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Postal Code</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" name="postal_code" required
										@if (isset($listing))
											value="{{$listing->postal_code}}"
										@endif
										>
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Country</label>
									<div class="col-sm-10">
									  <select class="form-control" name="country_id" required>
										  @if (isset($countries) && count($countries) > 0)
										@foreach ($countries as $country)
											<option value="{{$country->id}}">{{$country->name}}</option>
										@endforeach
										@endif
									  </select>
									</div>
								  </div>
								  <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Distance from Campus</label>
									<div class="col-sm-10">
									  <input type="number" class="form-control" name="distance" required
										@if (isset($listing))
											value="{{$listing->distance}}"
										@endif
										>
									</div>
								  </div>
							</div>

							<div class="col-lg-6">
								<div id="map" style="height:433px !important;"></div>
								<input type="text" name="location" id="pac-input" style="margin-top: 2%; height: 28px; width: 70%;"/>

								<input type="hidden" name="lat" 
								@if (isset($listing) && $listing->lat)
									value="{{$listing->lat}}"
								@else
									value="51.531344"
								@endif
								/>
								<input type="hidden" name="lng"
								@if (isset($listing) && $listing->lng)
									value="{{$listing->lng}}"
								@else
									value="-86.854957"
								@endif
								/>
							</div>
						</div>
					</fieldset>
				 
					<h3>Accomodation Details</h3>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-sm-2">Accomodation Type:</label>
							<div class="col-sm-10">
							  <select class="form-control" name="housing_type_id" required >
								  @if (isset($housing_types) && count($housing_types) > 0)
								@foreach ($housing_types as $type)
									<option value="{{$type->id}}"
									@if (isset($listing) && $listing->housing_type_id == $type->id)
										selected
									@endif
									>{{$type->name}}</option>
								@endforeach
								@endif
							  </select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2">Date Available:</label>
							<div class="col-sm-10">
								<input type="date" class="form-control datetime" name="date_available" required
								@if (isset($listing))
									value="{{$listing->date_available}}"
								@endif
								>
							</div>  
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2">Num. of bedrooms</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="num_bedrooms" required
								@if (isset($listing))
									value="{{$listing->num_bedrooms}}"
								@endif
								>
							</div>  
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2">Num. of bathrooms</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="num_bathrooms" required
								@if (isset($listing))
									value="{{$listing->num_bathrooms}}"
								@endif
								>
							</div>  
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2">Max. tenants</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="max_tenants" required
								@if (isset($listing))
									value="{{$listing->max_tenants}}"
								@endif
								>
							</div>  
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2">Num. parking spots</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="num_parking" required
								@if (isset($listing))
									value="{{$listing->num_parking}}"
								@endif
								>
							</div>  
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2">License Number</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="license_number"
								@if (isset($listing))
									value="{{$listing->license_number}}"
								@endif
								>
							</div>  
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2">Rent</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="rent" required
								@if (isset($listing))
									value="{{$listing->rent}}"
								@endif
								>
							</div>  
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2">Intl. paym. type</label>
							<div class="col-sm-10">
							  <select class="form-control" name="initial_payment_type_id" required>
								  @if (isset($initial_payment_type) && count($initial_payment_type) > 0)
								@foreach ($initial_payment_type as $type)
									<option value="{{$type->id}}"
									@if (isset($listing) && $listing->initial_payment_type_id == $type->id)
										selected
									@endif
									>{{$type->name}}</option>
								@endforeach
								@endif
							  </select>
							</div>
						  </div>
						  <div class="form-group">
							  <div class="col-sm-10 col-sm-offset-2">
								  <div class="checkbox">
									<label>
									  <input type="checkbox" value="1" name="lease_required"
										@if (isset($listing) && $listing->lease_required)
											checked="checked"
										@endif
										> Lease  
									</label>
								  </div>
							  </div>
						  </div>
						  <div class="form-group">
							  <div class="col-sm-10 col-sm-offset-2">
								  <div class="checkbox">
									<label>
									  <input type="checkbox" value="1" name="utilities_required"
										@if (isset($listing) && $listing->utilities_required)
											checked
										@endif
										> Utilities Included
									</label>
								  </div>
							  </div>
						  </div>

					</fieldset>
				 
					<h3>Amenities & Restriction</h3>
					<fieldset>
						<div class="form-group">

		                    <!-- Amenities Column -->
		                    <div class="col-md-6">

		                        <!-- Amenities Panel -->
		                        <div class="panel panel-default">
		                            <div class="panel-heading">
		                                <i class="fa fa-plus-circle text-success"></i>
		                                <span>&nbsp;Amenities</span>
		                            </div>
		                            <div class="panel-body">
										<div class="row">
											@if (isset($amenities) && count($amenities) > 0)
											@foreach ($amenities as $amenity)
											 <div class="col-lg-6">
												<div class="checkbox">
												   <label>
													   <input type="checkbox" value="{{$amenity->id}}" name="amenity[]"
														@if (isset($amenity_ids) && in_array($amenity->id, $amenity_ids))
															checked
														@endif
														>
													   <span>{{$amenity->name}}</span>
												   </label>
												</div>
											 </div>
											@endforeach
											@endif
										</div>
		                            </div>
		                        </div>
		                        <!-- //End Amenities Panel -->

		                    </div>
		                    <!-- //End Amenities Column -->

		                    <!-- Restrictions Column -->
		                    <div class="col-md-6">

		                        <!-- Restrictions Panel -->
		                        <div class="panel panel-default">
		                            <div class="panel-heading">
		                                <i class="fa fa-ban text-danger"></i>
		                                <span>&nbsp;Restrictions</span>
		                            </div>
		                            <div class="panel-body">
										<div class="row">
											@if (isset($listing))
												{{-- */
													$restriction_ids = array_map(function ($restriction) {
														return $restriction->id;
													}, $listing->restrictions);
												/* --}}
											@endif

				                            @if (isset($restrictions) && count($restrictions) > 0)
											@foreach ($restrictions as $restriction)
											 <div class="col-lg-6">
												<div class="checkbox">
												   <label>
													   <input type="checkbox" value="{{$restriction->id}}" name="restriction[]"
														@if (isset($restriction_ids) && in_array($restriction->id, $restriction_ids))
															checked
														@endif
														>
													   <span>{{$restriction->name}}</span>
												   </label>
												</div>
											 </div>
											@endforeach
											@endif
										</div>
		                            </div>
		                        </div>
		                        <!-- //End Restrictions Panel -->

		                    </div>
		                    <!-- //End Restrictions Column -->

		                </div>
					</fieldset>

					<h3>Photos</h3>
					<fieldset>
						<div id="myId" class="dropzone" style="width: 100%; height: 400px;">
							<div class="fallback">
								<input name="file" type="file" multiple />
							  </div>
							<div class="dz-default dz-message">
								<span>
									<i class="fa fa-plus-circle"></i>
									Click here or drop files to upload
								</span>
							</div>
							{{csrf_field()}}
							<input type="hidden" value="" name="images">
						</div>
					</fieldset>

					<h3>Additional Details</h3>
					<fieldset>
						<div class="form-group">
							<label class="control-label col-sm-2">Description</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="3" name="description">@if(isset($listing)) {{$listing->description}}@endif</textarea>
							</div>  
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2">Website</label>
							<div class="col-sm-10">
								<input type="url" class="form-control" name="website"
								@if (isset($listing))
									value="{{$listing->website}}"
								@endif
								>
							</div>  
						  </div>
					</fieldset>
				</form>

			</div>
		</div>
	</div>
</div>

@endsection
