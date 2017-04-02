<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<title>Housing Project</title>

	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/reality-icon.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootsnav.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/cubeportfolio.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/jquery.fancybox.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/owl.transitions.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/settings.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/range-Slider.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/search.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/dropzone.min.css">

	@yield('extra-styles')

</head>

<body>

	<!--Header-->
	<header class="layout_default">
	  
	  <div class="header-upper">
		<div class="container">
		  <div class="row">
		    <div class="col-md-3 col-sm-12">
		      <div class="logo">
				<a href="/">
					<i class="fa fa-home fa-3x"></i> <span class="fa-2x">Housing</span>
				</a>
			  </div>
		    </div>
		    <!--Info Box-->
		    <div class="col-md-9 col-sm-12 right">
		      <div class="info-box first">
		        <div class="icons"><i class="fa fa-phone"></i></div>
		        <ul>
		          <li><strong>Phone Number</strong></li>
		          <li>+1 519-748-5220</li>
		        </ul>
		      </div>
		      <div class="info-box">
		        <div class="icons"><i class="fa fa-building"></i></div>
		        <ul>
		          <li><strong>Conestoga College</strong></li>
		          <li>Ontario, Canada</li>
		        </ul>
		      </div>
		      <div class="info-box">
		        <div class="icons"><i class="fa fa-envelope"></i></div>
		        <ul>
		          <li><strong>Email Address</strong></li>
		          <li><a href="javascript:void(0)">abc@xyz.com</a></li>
		        </ul>
		      </div>
		    </div>
		  </div>
		</div>
	  </div>
	  <nav class="navbar navbar-default navbar-sticky bootsnav">
		<div class="container">
		  <div class="row">
		    <div class="col-md-12">
		      <div class="attr-nav">
		        <ul class="social_share clearfix">
		          <li><a href="javascript:void(0)" class="facebook"><i class="fa fa-facebook"></i></a></li>
		          <li><a href="javascript:void(0)" class="twitter"><i class="fa fa-twitter"></i></a></li>
		          <li><a class="google" href="javascript:void(0)"><i class="fa fa-google"></i></a></li>
		        </ul>
		      </div>
		      <!-- Start Header Navigation -->
		      <div class="navbar-header">
		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
		        <i class="fa fa-bars"></i>
		        </button>
		        <a class="navbar-brand sticky_logo" href="/" style="color:white;">
					<i class="fa fa-home fa-2x"></i> <span class="fa-1x">Housing</span>
				</a>
		      </div> <!-- End Header Navigation -->
		      <div class="collapse navbar-collapse" id="navbar-menu">
		        <ul class="nav navbar-nav" data-in="fadeIn" data-out="fadeOut">
				  <li><a
					@if (\Auth::user())
						href="/home"
					@else
						href="/"
					@endif
				  >Home</a></li>
		          <li><a href="/listing">Listings</a></li>
				  <li><a href="/blog">Blogs</a></li>
				  @if (\Auth::user())
				  <li><a href="/listing/create">Create Listing</a></li>
				  <li><a href="/posts/create">Create Blog</a></li>
				  <li class="dropdown">
		              <a href="#." class="dropdown-toggle" data-toggle="dropdown">{{ \Auth::user()->name }}</a>
		              <ul class="dropdown-menu animated fadeOut" style="display: none; opacity: 1;">
						  <li><a href="/profile">Profile</a></li>
		                  <li>
							<a href="{{ route('logout') }}" class="logout_button"
				                onclick="event.preventDefault();
				                         document.getElementById('logout-form').submit();">
				                Logout
				            </a>

				            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				                {{ csrf_field() }}
				            </form>
						  </li>
	                  </ul>
	              </li>
				  @else
				  <li><a href="/login">Login</a></li>
				  <li><a href="/register">Register</a></li>
				  @endif
		        </ul>
		      </div>
		    </div>
		  </div>
		</div>
	  </nav>
	</header>
	<!--Header Ends-->

	@yield('content')

	<!--Footer-->
	<footer class="padding_top footer2">
	  <div class="container">
		<div class="row">
		  
		  
		  <div class="col-md-6 col-sm-6">
		    <div class="footer_panel bottom30">
		      <h4 class="bottom30">Latest Blog Posts</h4>

			  <?php
					$blogs = \App\Models\Post::orderBy("created_at", "DESC")->paginate(3);
			  ?>

			  @if(isset($blogs) && count($blogs) > 0)
			  @foreach ($blogs as $post)
		      <div class="media">
		        <a class="media-object">
				@if($post->videourl)
                  <img src="/img/video_placeholder.png" alt="" style="height:52px;width:53px;" />
                @elseif($post->thumbnail_image)
                    <img src="/assets/post/images/{{ $post->thumbnail_image }}" alt="" style="height:52px;width:53px;" />
				@else
					<img src="/assets/images/blog-1.jpg" alt="" style="height:52px;width:53px;" />
                @endif
				</a>
		        <div class="media-body">
		          <a href="/blog/{{$post->id}}">{{$post->title}}</a>
		          <span><i class="fa fa-clock-o"></i>Feb 22, 2017</span>
		        </div>
		      </div>
			  @endforeach
			  @endif
		    </div>
		  </div>
		  <div class="col-md-6 col-sm-6">
		    <div class="footer_panel bottom30">
		      <h4 class="bottom30">Get in Touch</h4>
		      <ul class="getin_touch">
		        <li><i class="fa fa-phone"></i>+1 519-748-5220</li>
		        <li><a href="javascript:void(0)"><i class="fa fa-envelope"></i>info@abc.com</a></li>
		        <li><a href="javascript:void(0)"><i class="fa fa-arrow-right"></i>http://www.conestogac.on.ca/</a></li>
		        <li><i class="fa fa-building"></i>299 Doon Valley Dr, Kitchener, ON N2G 4M4, Canada</li>
		      </ul>
		    </div>
		  </div>
		</div>
	  </div>
	</footer>
	<!--CopyRight-->
	<div class="copyright index2">
	  <div class="copyright_inner">
		<div class="container">
		  <div class="row">
		    <div class="col-md-7">
		      <p>Copyright &copy; 2017 <span>Housing Project</span>. All rights reserved.</p>
		    </div>
		    
		  </div>
		</div>
	  </div>
	</div>

	<script src="/assets/js/jquery-2.1.4.js"></script> 
	<script src="/assets/js/bootstrap.min.js"></script> 
	<script src="/assets/js/bootsnav.js"></script>
	<script src="/assets/js/jquery.parallax-1.1.3.js"></script>
	<script src="/assets/js/jquery.appear.js"></script>
	<script src="/assets/js/jquery-countTo.js"></script>
	<script src="/assets/js/masonry.pkgd.min.js"></script>
	<script src="/assets/js/jquery.cubeportfolio.min.js"></script>
	<script src="/assets/js/range-Slider.min.js"></script>
	<script src="/assets/js/owl.carousel.min.js"></script> 
	<script src="/assets/js/selectbox-0.2.min.js"></script>
	<script src="/assets/js/zelect.js"></script>
	<script src="/assets/js/jquery.fancybox.js"></script>
	<script src="/assets/js/jquery.themepunch.tools.min.js"></script>
	<script src="/assets/js/jquery.themepunch.revolution.min.js"></script>
	<script src="/assets/js/revolution.extension.layeranimation.min.js"></script>
	<script src="/assets/js/revolution.extension.navigation.min.js"></script>
	<script src="/assets/js/revolution.extension.parallax.min.js"></script>
	<script src="/assets/js/revolution.extension.slideanims.min.js"></script>
	<script src="/assets/js/revolution.extension.video.min.js"></script>
	<script src="/assets/js/functions.js"></script>
	<script src="/assets/js/custom.js"></script>
	<script src="/assets/js/jquery.steps.min.js"></script>
	<script src="/assets/js/jquery.validate.min.js"></script>
	<script src="/assets/js/dropzone.min.js"></script>

	<script>
		$(document).ready(function () {
			$("body").on("click", ".listing_delete", function () {
				if (!confirm("Are you sure you wish to delete?"))
					return false;

				$(this).find("form").submit();
			});
		});
	</script>

	@yield('extra-scripts')

</body>

</html>
