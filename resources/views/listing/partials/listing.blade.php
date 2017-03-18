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
				<li><a href="#."><i class="icon-like"></i></a></li>
				<li><a href="#one" class="share_expender" data-toggle="collapse"><i class="icon-share3"></i></a></li>
			  </ul>
			</div>
			<div class="toggle_share collapse" id="one">
			  <ul>
				<li><a href="#." class="facebook"><i class="icon-facebook-1"></i> Facebook</a></li>
				<li><a href="#." class="twitter"><i class="icon-twitter-1"></i> Twitter</a></li>
				<li><a href="#." class="vimo"><i class="icon-vimeo3"></i> Vimeo</a></li>
			  </ul>
			</div>
		  </div>
		</div>
	</div>

	@endforeach
	@endif

</div>

@if (isset($listings) && count($listings) > 0)
<div class="row">
	<div class="padding_bottom text-center">
	  {!! $listings->render() !!}
	</div>
</div>
@endif

