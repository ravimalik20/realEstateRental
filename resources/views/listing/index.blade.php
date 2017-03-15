@extends('layouts.main')

@section('extra-styles')

	<link rel="stylesheet" type="text/css" href="/css/listing-search.css" />
    <link rel="stylesheet" type="text/css" href="/css/listing-repeater.css" />
    <link rel="stylesheet" type="text/css" href="/css/listing-summary-view.css" />
    <link rel="stylesheet" type="text/css" href="/css/listing-list-view.css" />
    <link rel="stylesheet" type="text/css" href="/css/listing-grid-view.css" />
    <link rel="stylesheet" type="text/css" href="/css/pager.css" />

@endsection

@section('extra-scripts')

	<script src="/js/listing/index.js"></script>

@endsection

@section('content')

	<div class="container-fluid" data-bind="with: listingSearchViewModel">
	   <div class="row">
		  <div class="col-lg-3 form-horizontal search-sidebar">
		     <div class="search-heading clearfix">
		        <div class="pull-left">
		           <span>Search Filter</span>        
		        </div>
		        <div class="btn-group-separated pull-right">
		           <button type="button" class="btn btn-gray" data-bind="click: searchParameters.clearAll.bind(searchParameters)">Clear</button>
		           <button type="button" class="btn btn-primary" data-bind="click: $root.executeSearch.bind($root)">Search</button>
		        </div>
		     </div>
		     <div class="search-category">
		        <a class="search-category-heading" data-toggle="collapse" href="#basic-search-panel">
		        <span>Basic</span>
		        <i class="fa collapse-toggle fa-fw"></i>
		        </a>
		        <div id="basic-search-panel" class="collapse in">
		           <div class="search-category-criteria" data-bind="component: { name: 'basic-search-parameters', params: { 'searchParametersViewModel': $data } }">
		              <div class="form-horizontal" data-bind="with: searchParametersViewModel">
		                 <div class="form-group">
		                    <div class="col-md-12">
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
		                 </div>
		                 <!-- /.form-group -->
		                 <div class="form-group">
		                    <div class="col-md-12">
		                       <!-- Accommodation Type -->
		                       <label for="AccommodationTypeDropDown" class="control-label">Housing Type:</label>
		                       <div class="input-group">
		                          <span class="input-group-addon">
		                          <i class="fa fa-building-o fa-fw"></i>
		                          </span>
		                          <select id="AccommodationTypeDropDown" class="form-control" >
		                             <option value="">Any</option>
		                             @if (isset($housing_types) && count($housing_types) > 0)
									@foreach ($housing_types as $type)
										<option value="{{$type->id}}">{{$type->name}}</option>
									@endforeach
									@endif
		                          </select>
		                       </div>
		                    </div>
		                 </div>
		                 <!-- /.form-group -->
		                 <div class="form-group" data-bind="with: searchParameters.priceRange">
		                    <div class="col-md-12">
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
		                 </div>
		                 <!-- /.form-group -->
		                 <div class="form-group">
		                    <div class="col-md-6">
		                       <!-- Number of Bedrooms -->
		                       <label for="NumberOfBedroomsDropDown" class="control-label">Bedrooms</label>
		                       <div class="input-group">
		                          <span class="input-group-addon">
		                          <i class="fa fa-bed fa-fw"></i>
		                          </span>
		                          <select id="Select3" class="form-control" data-bind="options: bedroomOptions, value: searchParameters.numberOfBedrooms.expression, optionsCaption: 'Any'">
		                             <option value="">Any</option>
		                             @if (isset($bedrooms) && count($bedrooms) > 0)
									@foreach ($bedrooms as $bedroom)
										<option value="{{$bedroom->id}}">{{$bedroom->name}}</option>
									@endforeach
									@endif
		                          </select>
		                       </div>
		                    </div>
		                    <div class="col-md-6">
		                       <!-- Number of Bathrooms -->
		                       <label for="NumberOfBathroomsDropDown" class="control-label">Bathrooms</label>
		                       <div class="input-group">
		                          <span class="input-group-addon">
		                          <i class="fa fa-male fa-fw"></i>
		                          </span>
		                          <select id="Select4" class="form-control" data-bind="options: bathroomOptions, value: searchParameters.numberOfBathrooms.expression, optionsCaption: 'Any'">
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
		                    <div class="col-md-12">
		                       <!-- Utilities Included Only -->
		                       <div class="checkbox">
		                          <label>
		                          <input type="checkbox" data-bind="checked: searchParameters.utilitiesIncludedOnly">
		                          <span>Utilities included only</span>
		                          </label>
		                       </div>
		                    </div>
		                 </div>
		                 <!-- /.form-group -->
		              </div>
		              <!-- /.search-category-criteria -->
		           </div>
		           <div class="search-category-footer text-right">
		              <button type="button" class="btn btn-success" data-bind="click: $root.executeSearch.bind($root)">Update</button>
		           </div>
		        </div>
		     </div>
		     <!-- /Basic Search Criteria -->
		     <!-- Amenities Search Criteria -->
		     <div class="search-category">
		        <a class="search-category-heading" data-toggle="collapse" href="#amenities-panel">
		        <span>Amenities&nbsp;</span><span class="text-muted" data-bind="text: amenitySelectionDescription">(Any)</span>
		        <i class="fa collapse-toggle"></i>
		        </a>
		        <div id="amenities-panel" class="clearfix collapse in">
		           <div class="search-category-criteria clearfix">
		              <ul id="AmenityList" class="list-inline clearfix" data-bind="foreach: availableAmenities">
						@if (isset($amenities) && count($amenities) > 0)
						@foreach ($amenities as $amenity)
		                 <li class="pull-left" style="width: 50%;">
		                    <div class="checkbox">
		                       <label>
		                       <input type="checkbox" value="{{$amenity->id}}">
		                       <span data-bind="text: name">{{$amenity->name}}</span>
		                       </label>
		                    </div>
		                 </li>
						@endforeach
						@endif
		              </ul>
		           </div>
		           <div class="search-category-footer text-right">
		              <button type="button" class="btn btn-success">Update</button>
		           </div>
		        </div>
		     </div>
		     <!-- /Amenities Search Criteria -->
		     <!-- Restrictions Search Criteria -->
		     <div class="search-category">
		        <a class="search-category-heading" data-toggle="collapse" href="#restrictions-panel">
		        <span>Restrictions&nbsp;</span><span class="text-muted">(Any)</span>
		        <i class="fa collapse-toggle"></i>
		        </a>
		        <div id="restrictions-panel" class="clearfix collapse in">
		           <div class="search-category-criteria">
		              <ul id="RestrictionList" class="list-inline clearfix">
						@if (isset($restrictions) && count($restrictions) > 0)
						@foreach ($restrictions as $restriction)
		                 <li class="pull-left" style="width: 50%;">
		                    <div class="checkbox">
		                       <label>
		                       <input type="checkbox" value="{{$restriction->id}}">
		                       <span data-bind="text: name">{{$restriction->name}}</span>
		                       </label>
		                    </div>
		                 </li>
						@endforeach
						@endif
		              </ul>
		           </div>
		           <div class="search-category-footer text-right">
		              <button type="button" class="btn btn-success" data-bind="click: $root.executeSearch.bind($root)">Update</button>
		           </div>
		        </div>
		     </div>
		     <!-- /Restrictions Search Criteria -->
		     <!-- Geographic Search Criteria -->
		     <div class="search-category">
		        <a class="search-category-heading" data-toggle="collapse" href="#geographic-panel">
		        <span>Geographic</span>
		        <i class="fa collapse-toggle"></i>
		        </a>
		        <div id="geographic-panel" class="collapse in">
		           <div class="search-category-criteria">
		              <div class="form-group">
		                 <div class="col-md-12">
		                    <!-- Distance from Campus Range -->
		                    <label for="PriceRange" class="control-label">Distance from Campus:</label>
		                    <div class="input-group" id="DistanceFromCampusRange">
		                       <span class="input-group-addon">km
		                       </span>
		                       <select id="MinDistanceFromCampusDropDown" class="form-control" data-bind="options: minValues, value: selectedMinValue">
		                          <option value="0">0</option>
		                          <option value="1">1</option>
		                          <option value="2">2</option>
		                          <option value="3">3</option>
		                          <option value="4">4</option>
		                          <option value="5">5</option>
		                          <option value="10">10</option>
		                          <option value="15">15</option>
		                       </select>
		                       <span class="input-group-addon fa-fw">to</span>
		                       <select id="MaxDistanceFromCampusDropDown" class="form-control" data-bind="options: maxValues, value: selectedMaxValue, optionsCaption: 'Unlimited'">
		                          <option value="">Unlimited</option>
		                          <option value="0">0</option>
		                          <option value="1">1</option>
		                          <option value="2">2</option>
		                          <option value="3">3</option>
		                          <option value="4">4</option>
		                          <option value="5">5</option>
		                          <option value="10">10</option>
		                          <option value="15">15</option>
		                       </select>
		                    </div>
		                 </div>
		              </div>
		              <!-- /.form-group -->
		           </div>
		           <!-- /.search-category-criteria -->
		           <div class="search-category-footer text-right">
		              <button type="button" class="btn btn-success">Update</button>
		           </div>
		        </div>
		     </div>
		     <!-- /Geographic Search Criteria -->
		     
		  </div>
		  <div class="col-lg-9 search-results">
		     <h3 class="form-header" data-bind="text: title">Search Results</h3>
		     <div data-bind="component: { name: 'listing-repeater', params: repeaterParams }">
		        <div class="listing-repeater">
		           <div id="repeater-toolbar" class="toolbar clearfix" data-bind="visible: showToolbars">
		              <!-- List View -->
		              <button type="button" class="btn" title="" data-original-title="List View">
	              			<i class="fa fa-list fa-fw"></i>
		              </button>
		              <!-- Grid View -->
		              <button type="button" class="btn active" title="" data-original-title="Tile View">
	              			<i class="fa fa-th fa-fw"></i>
		              </button>
		              <div class="toolbar-spacer"></div>
		              <a href="#" class="btn border-left" aria-label="Previous">
		              		<i class="fa fa-chevron-left"></i>
		              </a>
		              <div class="pager-page">10-18 of 72</div>
			          <a href="#" class="btn" aria-label="Next" data-bind="click: moveNext, css: { 'disabled': totalPages() <= 1 }">
			          		<i class="fa fa-chevron-right"></i>
			          </a>
		              <div class="toolbar-spacer"></div>
		              <select style="border-right: none;">
		                 <option value="Rent">Price</option>
		                 <option value="DistanceFromCampus">Distance</option>
		                 <option value="AccommodationType.Name">Housing Type</option>
		                 <option value="PostDate">Date Posted</option>
		                 <option value="NumberOfBedrooms">Number of Bedrooms</option>
		                 <option value="NumberOfBathrooms">Number of Bathrooms</option>
		                 <option value="MaximumNumberOfTenants">Tenant Capacity</option>
		              </select>
		              <button type="button" class="btn">
		              		<i class="fa fa-long-arrow-up"></i>
		              </button>
		           </div>
		           
		           <div class="clearfix">
		              <div id="listing-area">
							<!-- Listings are populated here -->
		              </div>
		           </div>

		           <div class="toolbar text-center" style="margin-top: 15px;" data-bind="visible: showToolbars">
		              <a href="#" class="btn border-left" aria-label="Previous" onclick="window.scrollTo(0,0)">
		              		<i class="fa fa-chevron-left"></i>
		              </a>
		              <div class="pager-page">10-18 of 72</div>
		              <a href="#" class="btn" aria-label="Next">
		              		<i class="fa fa-chevron-right"></i>
		              </a>
		              <a href="#" class="btn pull-right"><i class="fa fa-chevron-up"></i>&nbsp;Back to Top</a>        
		           </div>
		           <!-- Searching Message -->
		           <div class="row" data-bind="visible: showSearchingMessage" style="display: none;">
		              <div class="col-md-12 search-progress">
		                 <span style="color: #555; text-shadow: 0 1px 1px #fff;">Searching for listings...</span>
		                 <br>
		                 <img src="/images/loading-squares.gif" alt="Loading" class="img-responsive" style="width: 200px;">
		              </div>
		           </div>
		           <div class="clearfix"></div>
		           <!-- No Listing Matches Found Message -->
		           <div class="alert alert-warning pull-left" data-bind="fadeVisible: showNoMatchesMessage" style="display: none;">
		              <p class="lead">No listings matching your search criteria were found.</p>
		              <p>Suggestions:</p>
		              <ul>
		                 <li>Remove some filters</li>
		                 <li>Clear the search criteria, then start making incremental changes</li>
		              </ul>
		           </div>
		           <div data-bind="component: { name: 'modal-progress', params: { isVisible: showProgressModal } }">
		              <div class="modal modal-progress" data-bind="modalVisible: isVisible, modalOptions: { backdrop: 'static', verticalCenter: true }" aria-hidden="true" style="display: none;">
		                 <div class="modal-dialog modal-sm" style="margin-top: 307.5px;">
		                    <div class="modal-content">
		                       <div class="modal-body">
		                          <div class="preloader preloader-horizontal preloader-sm" data-bind="text: message">Processing request...</div>
		                       </div>
		                    </div>
		                 </div>
		              </div>
		           </div>
		        </div>
		     </div>
		  </div>
	   </div>
	</div>

@endsection
