<style>
.bbn {
  margin-bottom: 15px;
}
</style>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-10">
      <form role="form" action="{{ url('/posts') }}" method="post" enctype="multipart/form-data">
        @include('errors.validation')
        <h2>Post Edit</h2>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $post->id }}">
        <hr class="">
        <div class="row" style="margin-bottom: 30px;">

          <div class="">
            <div class="form-group">
              <input type="text" name="title" value="{{ $post->title}}" id="title" class="form-control input-lg" placeholder="Title" tabindex="1">
            </div>
            <div class="form-group">
              <textarea name="content" id="post">{{ $post->content}}</textarea>
            </div>
            <div class="form-group">
              <input type="file" name="file" class="form-control input-lg" placeholder="Title" tabindex="1">
              <br/>
              @if($post->videourl)
              <div class="image-thumbnail">
                <img height="100px;" width="100px;" src="/img/video_placeholder.png"></img>
              </div>
              @elseif($post->thumbnail_image)

              <div class="image-thumbnail">
                <img height="100px;" width="100px;" src="/assets/post/images/{{ $post->thumbnail_image}}"></img>
              </div>

              @endif
            </div>
          </div>
          <div class="row bbn" >
            <!-- <div class="col-xs-12 col-md-4"><input type="submit" value="saved" name="type" class="btn btn-primary btn-block btn-lg" tabindex="7"></div> -->
            <div class="col-xs-12 col-md-4"><input type="submit" value="Save" name="type" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
            
            <div class="col-xs-12 col-md-4">
              <a href="/admin/posts/{{ $post->id }}/delete" class="btn btn-danger btn-block btn-lg" tabindex="7">Delete</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
      <p>comments</p>
      <ul class="list-group">
        @if(count($post->allcomments) > 0)
         @foreach($post->allcomments as $comment)
           <li class="list-group-item">{{ substr($comment->comment, 0, 50) }}
             <span style="float:right;">
               <a href="/admin/comment/{{ $post->id }}/delete" onclick="return confirm('Are you sure?');">Delete</a>
             </span>
           </li>
          @endforeach
        @else
         <p>No comments exists.</p>
        @endif
      </ul>
  </div>
</div>
