<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-10">
      <form role="form" action="{{ url('/posts') }}" method="post" enctype="multipart/form-data">
        @include('errors.validation')
        <h2>Create Blog Post</h2>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <hr class="">
        <div class="row">

          <div class="">
            <div class="form-group">
              <input type="text" name="title" value="{{ old('title')}}" id="title" class="form-control input-lg" placeholder="Title" tabindex="1">
            </div>
            <div class="form-group">
              <textarea name="content" id="post">{{ old('content')}}</textarea>
            </div>
            <div class="form-group">
              <input type="file" name="file" class="form-control input-lg" placeholder="Title" tabindex="1">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-6"><input type="submit" value="post" name="type" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
