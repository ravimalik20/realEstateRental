@extends('layouts.main')

@section('extra-styles')

@endsection

@section('content')

<!--Slider-->
<div class="rev_slider_wrapper">
  <div id="rev_slider_third" class="rev_slider"  data-version="5.0">
    <ul>
	  @if (isset($listings) && count($listings) > 0)
	  @foreach ($listings as $listing)
      <!-- SLIDE  -->
      <li data-transition="fade">
        <img src="{{$listing->thumbnail()}}" alt="" data-bgposition="center center" data-bgfit="cover">
        <div class="black-caption tp-caption tp-resizeme"
         data-start="1300"
          data-x="['left','left','center','center']" data-hoffset="['0','0','0','15']" 
          data-y="['center','center','center','center']" data-voffset="['0','0','0','0']" 
          data-responsive_offset="on" 
          data-transform_idle="o:1;"
          data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;" 
		  data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;">
          <div class="price">For Rent</div>
          <h2>{{$listing->address}}</h2>{{$listing->address}} {{$listing->city}} {{$listing->province}}
            
          </p>
          <div class="property_meta"> 
            <span><i class="fa fa-home"></i>{{$listing->num_bedrooms}} Bedrooms</span> 
            <span><i class="fa fa-bed"></i>{{$listing->num_bathrooms}} Bathrooms</span> 
            <span><i class="fa fa-car"></i>{{$listing->num_parking}} Parking Space</span> 
          </div>
          <div class="bottom row">
            <div class="col-sm-6"><span> <i class="fa fa-address-card"></i>{{$listing->city}}, {{$listing->province}}</span></div>
            <div class="col-sm-6"><span>${{$listing->rent}} Per Month -<small> {{$listing->housingType->name}}</small></span></div>
          </div>
        </div>
      </li>
	  @endforeach
	  @endif
    </ul>
  </div>
  <!-- END REVOLUTION SLIDER -->
</div>

<!--Advance Search-->
<section class="property-query-area bg_light">
  <div class="container">
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
		                <select id="CampusDropDown" class="form-control" name="campus">
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
		                <select id="AccommodationTypeDropDown" class="form-control" name="housing_type">
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
		                <select id="Select3" class="form-control" name="bedroom">
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
		                <select id="Select4" class="form-control" name="bathroom">
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
		                <select id="MinPriceDropDown" class="form-control" name="price_range_min">
						@if (isset($price_ranges) && count($price_ranges) > 0)
						@foreach ($price_ranges as $range)
							<option value="{{$range->name}}">{{$range->name}}</option>
						@endforeach
						@endif
		                </select>
		                <span class="input-group-addon fa-fw">to</span>
		                <select id="MaxPriceDropDown" class="form-control" name="price_range_max">
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
</section>

<!--Advance Search-->

@endsection
