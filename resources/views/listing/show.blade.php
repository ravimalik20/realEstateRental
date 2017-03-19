@extends('layouts.main')

@section('extra-styles')

	<link rel="stylesheet" type="text/css" href="/css/listing.css" />
    <link rel="stylesheet" type="text/css" href="/css/modal-gallery.css" />

@endsection

@section('extra-scripts')

	<script src="/assets/js/neary-by-place.js"></script> 
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U&libraries=places"></script> 
	<script src="/assets/js/jquery.fancybox.js"></script>

@endsection

@section('content')

<!-- Property Detail Start -->
<section id="property" class="padding">
	<div class="container property-details">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-uppercase">{{ explode(',', $listing->address)[0] }}</h2>
				<p class="bottom30">{{ $listing->address }}</p>

				@if ($listing->photos && count($listing->photos) > 0)
				<div id="property-d-1" class="owl-carousel single">
				@foreach ($listing->photos as $photo)
					<div class="item"><img src="{{$photo->path}}" alt="image"/></div>
				@endforeach				
				</div>
				@endif

				@if ($listing->photos && count($listing->photos) > 0)
				<div id="property-d-1-2" class="owl-carousel single">				
				@foreach ($listing->photos as $photo)
					<div class="item"><img src="{{$photo->path}}" alt="image"/></div>
				@endforeach
				</div>
				@endif
				
			</div>
		</div>
		<div class="row" style="margin-top:30px;">
			<div class="col-md-8 listing1" style="margin-top: 2%;">
				@if ($listing->description)
				<h2 class="text-uppercase">Property Description</h2>
				<p class="bottom30">
					{{$listing->description}}
				</p>
				@endif
				
				<h2 class="text-uppercase bottom20">Quick Summary</h2>
				<div class="row property-d-table bottom40">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<table class="table table-striped table-responsive">
							<tbody>
								<tr>
									<td><b>Property Id</b></td>
									<td class="text-right">{{$listing->id}}</td>
								</tr>
								<tr>
									<td><b>Rent</b></td>
									<td class="text-right">${{$listing->rent}} / month</td>
								</tr>
								<tr>
									<td><b>Bedrooms</b></td>
									<td class="text-right">{{$listing->num_bedrooms}}</td>
								</tr>
								<tr>
									<td><b>Bathrooms</b></td>
									<td class="text-right">{{$listing->num_bathrooms}}</td>
								</tr>
								<tr>
									<td><b>Available From</b></td>
									<td class="text-right">{{$listing->date_available}}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<table class="table table-striped table-responsive">
							<tbody>
								<tr>
									<td><b>Housing Type</b></td>
									<td class="text-right">{{$listing->housingType->name}}</td>
								</tr>
								<tr>
									<td><b>Initial Payment</b></td>
									<td class="text-right">{{$listing->initialPaymentType->name}}</td>
								</tr>
								<tr>
									<td><b>Lease</b></td>
									<td class="text-right">{{$listing->lease_required ? 'Required' : 'Not Required'}}</td>
								</tr>
								<tr>
									<td><b>Utilities</b></td>
									<td class="text-right">{{$listing->utilities_required ? 'Required' : 'Not Required'}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="row">
					@if ($listing->amenities && count($listing->amenities) > 0)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2 class="text-uppercase bottom20">Amenities</h2>
						<div class="bottom40">
							<div class="">
								<ul class="pro-list">
								@foreach ($listing->amenities as $amenity)
									<li>
										{{$amenity->name}}
									</li>
								@endforeach
								</ul>
							</div>
						</div>
					</div>
					@endif

					@if ($listing->restrictions && count($listing->restrictions) > 0)
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2 class="text-uppercase bottom20">Restrictions</h2>
						<div class="bottom40">
							<div class="">
								<ul class="pro-list">
								@foreach ($listing->restrictions as $restriction)
									<li>
										{{$restriction->name}}
									</li>
								@endforeach
								</ul>
							</div>
						</div>
					</div>
					@endif
				</div>
				
				<h2 class="text-uppercase bottom20">Property Map</h2>
				<div class="row bottom40">
					<div class="col-md-12 bottom20">
						<div class="property-list-map">
							<div id="" class="multiple-location-map" style="width:100%;height:430px;">
								<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
									src="https://maps.google.com/maps?q={{$listing->lat}},{{$listing->lng}}&hl=es;z=14&amp;output=embed"
									style="height:100%; width:100%;"
								>
								</iframe>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			<aside class="col-md-4 col-xs-12" style="margin-top: 2%;">
				<h2 class="text-uppercase bottom20">Property Owner</h2>
				<div class="row">
					<div class="col-sm-4 bottom40">
						<div class="agent_wrap">
							<div class="image">
								<img src="/assets/images/agent-one.jpg" alt="Agents">
							</div>
						</div>
					</div>
					<div class="col-sm-8 bottom40">
						<div class="agent_wrap">
							<h3>{{$listing->user->name}}</h3>
							
						</div>
					</div>
					<div class="col-sm-12 agent_wrap bottom30">
						<table class="agent_contact table">
							<tbody>
								<tr class="bottom10">
									<td><strong>Phone:</strong></td>
									<td class="text-right">(+01) 34 56 7890</td>
								</tr>
								<tr class="bottom10">
									<td><strong>Mobile:</strong></td>
									<td class="text-right">(+033) 34 56 7890</td>
								</tr>
								<tr>
									<td><strong>Email Adress:</strong></td>
									<td class="text-right"><a href="#.">{{$listing->user->email}}</a></td>
								</tr>
								
							</tbody>
						</table>
						<div style="border-bottom:1px solid #d3d8dd;" class="bottom15"></div>
					</div>
					
				</div>
			</aside>
		</div>
	</div>
</section>
<!-- Property Detail End -->

@endsection
