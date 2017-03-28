@extends('layouts.main')

@section('extra-styles')

<link rel="stylesheet" href="/css/compiled/blogpost.css" type="text/css" media="screen" />

@stop

@section('content')

<section id="news-section-1" class="news-section-details property-details padding_top">
	<div class="container">
		<div class="row heading_space">
			<div class="col-md-10 col-md-offset-1">
      
			  	<div class="row">
					<div class="news-1-box clearfix">
				    	<div class="col-md-12 col-sm-12 col-xs-12">
				           @if($post->videourl)
						   <video width="600" height="400"   controls>
						        <source src="/assets/post/images/{{ $post->videourl }}" type="video/mp4">
						        <source src="/assets/post/images/{{ $post->videourl }}" type="video/3gp">

						   </video>

						   @else
						      <img src="/assets/post/images/{{ $post->thumbnail_image }}" alt="" class="post_pic img-responsive" />
						   @endif
				        </div>
				        
				        <div class="col-md-12 col-sm-12 col-xs-12 top30">
				        
				        	<div class="news-details bottom10">
				            	<span><i class="fa fa-user"></i> {{$post->user->name}}</span>
				        		<span><i class="fa fa-calendar"></i> August 22, 2017</span>
				            </div>
				            
				        	<h3>{{ $post->title }}</h3>
				            
				            {!!   $post->content !!}

				        </div>
				    </div>
				 </div>

				<div class="row heading_space">
        
				  <div class="col-md-7 col-sm-7 col-xs-12 text-right">
				    <div class="social-icons">
				      <h4>Share:</h4>
				      <ul class="social_share">
				          <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
				          <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
				          <li><a href="https://plus.google.com/share?url={{ urlencode(Request::url()) }}" target="_blank" class="google"><i class="fa fa-google"></i></a></li>
				       </ul>
				    </div>
				  </div>
			   </div>
				        
			   <div class="row heading_space">
					<div class="col-md-12 bottom10">
				    	<h2 class="text-uppercase">Comments</h2>
				    </div>
				 </div>

				@if(count($post->comments) > 0)
                @foreach($post->comments as $comment)
				<div class="row bottom10">
					<div class="col-md-2 col-sm-2 col-xs-12">
				    	<img src="/assets/images/news-comnts-1.jpg" alt="image">
				    </div>
				    <div class="col-md-10 col-sm-10 col-xs-12">
				    	<div class="news-comnts-text">
				        	<h4>{{$comment->name}} <span>{{$comment->created_at->format("M d, Y")}}</span></h4>
				            <p class="p-font-15">{{$comment->comment}}</p>
				        </div>
				    </div>    
				</div>
				<hr />
				@endforeach
				@endif

				<div class="row">
					<div class="col-md-12 margin40">
				    	<h2 class="text-uppercase bottom20">LEAVE A COMMENT</h2>
				    </div>
				 </div>

				<form class="callus padding_bottom" action="/post/comment" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                  	<input type="hidden" name="post_id" value="{{ $post->id }}">

				      <div class="row">
				        <div class="col-sm-6">
				          <div class="form-group">
				            <input type="text" class="form-control" placeholder="Name" name="name">
				          </div>
				          <div class="form-group">
				            <input type="email" class="form-control" placeholder="Email" name="email">
				          </div>
				        </div>
				        <div class="col-sm-6">
				          <div class="form-group">
				            <textarea class="form-control" placeholder="Message" name="comment"></textarea>
				          </div>
				        </div>
				        <div class="col-sm-12 row">
				          <div class="row">
				            <div class="col-sm-3">
				              <input type="submit" class="btn-blue uppercase border_radius" value="submit now">
				            </div>
				          </div>
				        </div>
				      </div>
		        </form>
				
		   </div>
		</div>
	</div>
</section>

@stop
