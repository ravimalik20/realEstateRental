@extends('layouts.main')

@section('extra-styles')

	<link rel="stylesheet" type="text/css" href="/css/listing.css" />
    <link rel="stylesheet" type="text/css" href="/css/modal-gallery.css" />

@endsection

@section('extra-scripts')

	<script src="/assets/js/neary-by-place.js"></script> 
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U&libraries=places"></script> 
	<script src="/assets/js/google-map.js"></script> 
	<script src="/assets/js/jquery.fancybox.js"></script>

@endsection

@section('content')

<!-- Property Detail Start -->
<section id="property" class="padding">
	<div class="container property-details">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-uppercase">987 Cantebury Drive</h2>
				<p class="bottom30">45 Regent Street, London, UK</p>
				<div id="property-d-1" class="owl-carousel single">
					<div class="item"><img src="/assets/images/property-details/property-d-1-1.jpg" alt="image"/></div>
					<div class="item"><img src="/assets/images/property-details/property-d-1-1.jpg" alt="image"/></div>
					<div class="item"><img src="/assets/images/property-details/property-d-1-1.jpg" alt="image"/></div>
					<div class="item"><img src="/assets/images/property-details/property-d-1-1.jpg" alt="image"/></div>
					<div class="item"><img src="/assets/images/property-details/property-d-1-1.jpg" alt="image"/></div>
					<div class="item"><img src="/assets/images/property-details/property-d-1-1.jpg" alt="image"/></div>
					<div class="item"><img src="/assets/images/property-details/property-d-1-1.jpg" alt="image"/></div>
				</div>
				<div id="property-d-1-2" class="owl-carousel single">
					<div class="item" ><img src="/assets/images/property-details/property-d-s-1-1.jpg" alt="image"/></div>
					<div class="item" ><img src="/assets/images/property-details/property-d-s-1-2.jpg" alt="image"/></div>
					<div class="item" ><img src="/assets/images/property-details/property-d-s-1-3.jpg" alt="image"/></div>
					<div class="item" ><img src="/assets/images/property-details/property-d-s-1-4.jpg" alt="image"/></div>
					<div class="item" ><img src="/assets/images/property-details/property-d-s-1-5.jpg" alt="image"/></div>
					<div class="item" ><img src="/assets/images/property-details/property-d-s-1-1.jpg" alt="image"/></div>
					<div class="item" ><img src="/assets/images/property-details/property-d-s-1-2.jpg" alt="image"/></div>
				</div>
				
			</div>
			<div class="col-md-8 listing1" style="margin-top: 2%;">
				<h2 class="text-uppercase">Property Description</h2>
				<p class="bottom30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum, bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt. Duis euismod placerat rhoncus. Phasellus mollis imperdiet placerat. Sed ac turpis nisl. Mauris at ante mauris. Aliquam posuere fermentum lorem, a aliquam mauris rutrum a. Curabitur sit amet pretium lectus, nec consequat orci.</p>
				<p class="bottom30">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus in libero sollicitudin venenatis eu sed enim. Nam felis lorem, suscipit ac nisl ac, iaculis dapibus tellus. Cras ante justo, aliquet quis placerat nec, molestie id turpis. </p>
				<div class="text-it-p bottom40">
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam power nonummy nibh tempor cum soluta nobis eleifend option congue nihil imperdiet doming Lorem ipsum dolor sit amet. consectetuer elit sed diam power nonummy</p>
				</div>
				<h2 class="text-uppercase bottom20">Quick Summary</h2>
				<div class="row property-d-table bottom40">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<table class="table table-striped table-responsive">
							<tbody>
								<tr>
									<td><b>Property Id</b></td>
									<td class="text-right">5456</td>
								</tr>
								<tr>
									<td><b>Price</b></td>
									<td class="text-right">$8,600 / month</td>
								</tr>
								<tr>
									<td><b>Property Size</b></td>
									<td class="text-right">5,500 ft2</td>
								</tr>
								<tr>
									<td><b>Bedrooms</b></td>
									<td class="text-right">5</td>
								</tr>
								<tr>
									<td><b>Bathrooms</b></td>
									<td class="text-right">3</td>
								</tr>
								<tr>
									<td><b>Available From</b></td>
									<td class="text-right">22-04-2017</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<table class="table table-striped table-responsive">
							<tbody>
								<tr>
									<td><b>Status</b></td>
									<td class="text-right">Rent</td>
								</tr>
								<tr>
									<td><b>Year Built</b></td>
									<td class="text-right">1991</td>
								</tr>
								<tr>
									<td><b>Garages</b></td>
									<td class="text-right">1</td>
								</tr>
								<tr>
									<td><b>Cross Streets</b></td>
									<td class="text-right">Nordoff</td>
								</tr>
								<tr>
									<td><b>Floors</b></td>
									<td class="text-right">Carpet - Ceramic Tile</td>
								</tr>
								<tr>
									<td><b>Plumbing</b></td>
									<td class="text-right">Full Copper Plumbing</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<h2 class="text-uppercase bottom20">Features</h2>
				<div class="row bottom40">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<ul class="pro-list">
							<li>
								Air Conditioning
							</li>
							<li>
								Barbeque
							</li>
							<li>
								Dryer
							</li>
							<li>
								Laundry
							</li>
						</ul>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<ul class="pro-list">
							<li>
								Microwave
							</li>
							<li>
								Outdoor Shower
							</li>
							<li>
								Refrigerator
							</li>
							<li>
								Swimming Pool
							</li>
						</ul>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<ul class="pro-list">
							<li>
								Quiet Neighbourhood
							</li>
							<li>
								TV Cable & WIFI
							</li>
							<li>
								Window Coverings
							</li>
						</ul>
					</div>
				</div>
				
				
				<h2 class="text-uppercase bottom20">Property Map</h2>
				<div class="row bottom40">
					<div class="col-md-12 bottom20">
						<div class="property-list-map">
							<div id="property-listing-map" class="multiple-location-map" style="width:100%;height:430px;"></div>
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
							<h3>Bohdan Kononets</h3>
							<p class="bottom30">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis …</p>
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
									<td class="text-right"><a href="#.">bohdan@castle.com</a></td>
								</tr>
								<tr>
									<td><strong>Skype:</strong></td>
									<td class="text-right"><a href="#.">bohdan.kononets</a></td>
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
