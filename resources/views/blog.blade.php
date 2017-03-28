@extends('layouts.main')

@section('extra-styles')

<link rel="stylesheet" href="/css/compiled/blog.css" type="text/css" media="screen" />

@stop

@section('content')

<section id="news" class="news-section-details padding_bottom_half padding_top">

	<div class="container">
		<div class="row">
			@if(count($posts) > 0)
			@foreach($posts as $post)
			<div class="col-md-4 col-sm-6 col-xs-12 heading_space">
				<div class="sim-lar-p">
				  <div class="image bottom20">
					<a href="/blog/{{ $post->id }}">
                        @if($post->videourl)
                          <img src="/img/video_placeholder.png" alt="" class="img-responsive" style="height:250px;" />
                        @elseif($post->thumbnail_image)
                            <img src="/assets/post/images/{{ $post->thumbnail_image }}" alt="" class="img-responsive" style="height:250px;" />
						@else
							<img src="/assets/images/blog-1.jpg" alt="" class="img-responsive" style="height:250px;" />
                        @endif

                    </a>
				  </div>
				  <div class="sim-lar-text">
				    <h3 class="bottom10"><a href="/blog/{{$post->id}}">{{$post->title}}</a></h3>
				    <p><span>By:</span> Admin <span>|</span> <span>Date:</span> {{ $post->created_at->format("M d, Y") }}</p>
				    <p class="bottom20">{{ $post->title }}</p>
				    <a class="btn-more" href="/blog/{{$post->id}}">
				    	<i><img alt="arrow" src="/assets/images/arrowl.png"></i>
						<span>More Details</span>
						<i><img alt="arrow" src="/assets/images/arrowr.png"></i>
				    </a>
					@if (\Auth::user() && $post->user_id == \Auth::user()->id)
					<a href="/posts/{{$post->id}}/edit" class="btn-more">
						<i><img alt="arrow" src="/assets/images/arrowl.png"></i>
						<span><i class="fa fa-edit"></i></span>
						<i><img alt="arrow" src="/assets/images/arrowr.png"></i>
					@endif
					</a>
				  </div>
				</div>
			</div>
			@endforeach
			@endif
		</div>

		<div class="row">
			<div class="col-md-12">
			@if(count($posts) > 0)
				{!! $posts->render() !!}
			@endif
			</div>
		</div>
	</div>

</section>

@stop
