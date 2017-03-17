@foreach([1, 2, 3, 4, 5 , 6 ,7, 8] as $i)

<div class="col-sm-6">
	<div class="property_item heading_space">
	  <div class="image">
		<a href="/listing/1"><img src="/assets/images/listing1.jpg" alt="latest property" class="img-responsive"></a>
		<div class="price clearfix"> 
		  <span class="tag pull-right">$8,600 Per Month</span>
		</div>
		<span class="tag_t">For Sale</span> 
		<span class="tag_l">Featured</span>
	  </div>
	  <div class="proerty_content">
		<div class="proerty_text">
		  <h3 class="captlize"><a href="/listing/1">Historic Town House</a></h3>
		  <p>45 Regent Street, London, UK</p>
		</div>
		<div class="property_meta transparent"> 
		  <span><i class="icon-select-an-objecto-tool"></i>4800 sq ft</span> 
		  <span><i class="icon-bed"></i>2 Office Rooms</span> 
		  <span><i class="icon-safety-shower"></i>1 Bathroom</span>   
		</div>
		<div class="property_meta transparent bottom30">
		  <span><i class="icon-old-television"></i>TV Lounge</span>
		  <span><i class="icon-garage"></i>1 Garage</span>
		  <span></span>
		</div>
		<div class="favroute clearfix">
		  <p class="pull-md-left">5 Days ago &nbsp; <i class="icon-calendar2"></i></p>
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
