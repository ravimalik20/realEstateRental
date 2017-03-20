<div class="row">

	@if (isset($listings) && count($listings) > 0)
	@foreach($listings as $listing)

	<div class="col-sm-6">
		<div class="property_item heading_space">
		  <div class="image">
			<a href="/listing/{{$listing->id}}"><img src="{{$listing->thumbnail()}}" alt="latest property" style="height:230px;" class="img-responsive"></a>
			<div class="price clearfix"> 
			  <span class="tag pull-right">${{$listing->rent}} Per Month</span>
			</div>
			<span class="tag_t">For Rent</span>
		  </div>
		  <div class="proerty_content">
			<div class="proerty_text">
			  <h3 class="captlize"><a href="/listing/{{$listing->id}}">{{explode(',', $listing->address)[0]}}</a></h3>
			  <p>{{$listing->address}}</p>
			</div>
			<div class="property_meta transparent"> 
			  <span><i class="icon-select-an-objecto-tool"></i>{{$listing->max_tenants}} max. tenants</span> 
			  <span><i class="icon-bed"></i>{{$listing->num_bedrooms}} Bedrooms</span> 
			  <span><i class="icon-safety-shower"></i>{{$listing->num_bathrooms}} Bathroom</span>   
			</div>
		
			<div class="favroute clearfix">
			  <p class="pull-md-left">{{$listing->created_at->format("M,d Y")}}; <i class="icon-calendar2"></i></p>
			  <ul class="pull-right">
				@if (\Auth::user() && $listing->user_id == \Auth::user()->id)
				<li><a href="/listing/{{$listing->id}}/edit" title="Edit"><i class="fa fa-edit"></i></a></li>
				@endif
				<li><a href="#one" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
			  </ul>
			</div>
			
		  </div>
		</div>
	</div>

	@endforeach
	@endif

</div>



