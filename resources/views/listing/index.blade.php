@extends('layouts.main')

@section('extra-styles')

	<link rel="stylesheet" type="text/css" href="/assets_old/css/listing-search.css" />
    <link rel="stylesheet" type="text/css" href="/assets_old/css/listing-repeater.css" />
    <link rel="stylesheet" type="text/css" href="/assets_old/css/listing-summary-view.css" />
    <link rel="stylesheet" type="text/css" href="/assets_old/css/listing-list-view.css" />
    <link rel="stylesheet" type="text/css" href="/assets_old/css/listing-grid-view.css" />
    <link rel="stylesheet" type="text/css" href="/assets_old/css/pager.css" />

@endsection

@section('extra-scripts')

	<script src="/assets/listing/index.js"></script>

@endsection

@section('content')

<!-- Listing Start -->
<section id="listing1" class="listing1 padding_top">
  <div class="container">
    <div class="row">

	  <div class="col-lg-4 form-horizontal search-sidebar">
	     <div class="search-heading clearfix">
	        <div class="pull-left">
	           <span>Search Filter</span>        
	        </div>
	        <div class="btn-group-separated pull-right">
	           <button type="button" class="btn btn-gray">Clear</button>
	           <button type="button" class="btn btn-primary">Search</button>
	        </div>
	     </div>
	     <div class="search-category">
	        <a class="search-category-heading" data-toggle="collapse" href="#basic-search-panel">
	        <span>Basic</span>
	        <i class="fa collapse-toggle fa-fw"></i>
	        </a>
	        <div id="basic-search-panel" class="collapse in">
	           <div class="search-category-criteria">
	              <div class="form-horizontal">
	                 <div class="form-group">
	                    <div class="col-md-12">
	                       <!-- Campus -->
	                       <label for="CampusDropDown" class="control-label">Campus:</label>
	                       <div class="input-group">
	                          <span class="input-group-addon">
	                          <i class="fa fa-institution fa-fw"></i>
	                          </span>
	                          <select id="CampusDropDown" class="form-control" name="campus">
	                             <option value="">Any</option>
	                             @if (isset($campuses) && count($campuses) > 0)
								@foreach ($campuses as $campus)
									<option value="{{$campus->id}}"
									@if (\Request::get("campus") && \Request::get("campus") == $campus->id)
										selected
									@endif
									>{{$campus->name}}</option>
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
	                          <select id="AccommodationTypeDropDown" class="form-control" name="housing_type">
	                             <option value="">Any</option>
	                             @if (isset($housing_types) && count($housing_types) > 0)
								@foreach ($housing_types as $type)
									<option value="{{$type->id}}"
									@if (\Request::get("housing_type") && \Request::get("housing_type") == $type->id)
										selected
									@endif
									>{{$type->name}}</option>
								@endforeach
								@endif
	                          </select>
	                       </div>
	                    </div>
	                 </div>
	                 <!-- /.form-group -->
	                 <div class="form-group">
	                    <div class="col-md-12">
	                       <!-- Price Range -->
	                       <label for="PriceRange" class="control-label">Price Range:</label>
	                       <div class="input-group" id="PriceRange">
	                          <span class="input-group-addon">
	                          <i class="fa fa-dollar fa-fw"></i>
	                          </span>
	                          <select id="MinPriceDropDown" class="form-control" name="price_range_min">
	                             @if (isset($price_ranges) && count($price_ranges) > 0)
								@foreach ($price_ranges as $range)
									<option value="{{$range->name}}"
									@if (\Request::get("price_range_min") && \Request::get("price_range_min") == $range->name)
										selected
									@endif
									>{{$range->name}}</option>
								@endforeach
								@endif
	                          </select>
	                          <span class="input-group-addon fa-fw">to</span>
	                          <select id="MaxPriceDropDown" class="form-control" name="price_range_max">
									<option value="">Unlimited</option>
	                             @if (isset($price_ranges) && count($price_ranges) > 0)
								@foreach ($price_ranges as $range)
									<option value="{{$range->name}}"
									@if (\Request::get("price_range_max") && \Request::get("price_range_max") == $range->name)
										selected
									@endif
									>{{$range->name}}</option>
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
	                          <select id="Select3" class="form-control" name="bedroom">
	                             <option value="">Any</option>
	                             @if (isset($bedrooms) && count($bedrooms) > 0)
								@foreach ($bedrooms as $bedroom)
									<option value="{{$bedroom->id}}"
									@if (\Request::get("bedroom") && \Request::get("bedroom") == $bedroom->id)
										selected
									@endif
									>{{$bedroom->name}}</option>
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
	                          <select id="Select4" class="form-control" name="bathroom">
	                             <option value="">Any</option>
	                             @if (isset($bathrooms) && count($bathrooms) > 0)
								@foreach ($bathrooms as $bathroom)
									<option value="{{$bathroom->id}}"
									@if (\Request::get("bathroom") && \Request::get("bathroom") == $bathroom->id)
										selected
									@endif
									>{{$bathroom->name}}</option>
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
	                          <input type="checkbox">
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
	              <button type="button" class="btn btn-success">Update</button>
	           </div>
	        </div>
	     </div>
	     <!-- /Basic Search Criteria -->
	     <!-- Amenities Search Criteria -->
	     <div class="search-category">
	        <a class="search-category-heading" data-toggle="collapse" href="#amenities-panel">
	        <span>Amenities&nbsp;</span><span class="text-muted">(Any)</span>
	        <i class="fa collapse-toggle"></i>
	        </a>
	        <div id="amenities-panel" class="clearfix collapse in">
	           <div class="search-category-criteria clearfix">
	              <ul id="AmenityList" class="list-inline clearfix">
					@if (isset($amenities) && count($amenities) > 0)
					@foreach ($amenities as $amenity)
	                 <li class="pull-left" style="width: 50%;">
	                    <div class="checkbox">
	                       <label>
			                   <input type="checkbox" value="{{$amenity->id}}">
			                   <span>{{$amenity->name}}</span>
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
			                   <span>{{$restriction->name}}</span>
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
	                       <select id="MinDistanceFromCampusDropDown" class="form-control">
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
	                       <select id="MaxDistanceFromCampusDropDown" class="form-control">
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

      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-md-9">
            <h2 class="uppercase">PROPERTY LISTINGS</h2>
            <p class="heading_space">We have Properties in these Areas View a list of Featured Properties.</p>
          </div>
          <div class="col-md-3">
          <form class="callus">
            <div class="single-query">
              <div class="intro">
                <select>
                  <option class="active">Default Order</option>
                  <option>Price</option>
                  <option>Created At</option>
                </select>
              </div>
            </div>
            </form>
          </div>
        </div>

        <div id="listing-area" class="row">
          	<!-- Listings are populated here. -->
        </div>
        
        <div class="padding_bottom text-center">
          <ul class="pager">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div>
      </div>
      
    </div>
  </div>
</section>
<!-- Listing end -->

@endsection
