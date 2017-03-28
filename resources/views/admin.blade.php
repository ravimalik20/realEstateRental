@extends('layouts.main')

@section('extra-scripts')

<script src="/tinymce/tinymce.min.js"></script>
<script>
$(document).ready(function(){
  tinymce.init({
    selector: 'textarea#post',
    height: "380"
  });
  });
  </script>

@endsection

@section('content')
@if(Session::has('success_message'))
<div class="alert alert-success">
  <strong>Success!</strong> {{ Session::get('success_message')}}

</div>
@endif

@if(Session::has('error_message'))
<div class="alert alert-danger">
  <strong>Error!</strong> {{ Session::get('error_message')}}

</div>
@endif

<section id="listing1" class="listing1 padding_top" style="margin-bottom:5%;">
	<div class="container">

		@if($page == 'contact')
		  @include('admin.contact')
		@elseif($page == 'posts')
		  @include('admin.posts')
		 @elseif($page == 'create_post')
		   @include('admin.create_post')
		 @elseif($page == 'admin_post_edit')
		  @include('admin.postedit')
		@endif

	</div>
</section>

@endsection
