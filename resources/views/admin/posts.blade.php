<!-- /.row -->

<div class="container">
  <div class="row">
    <a href="/posts/create" class="btn btn-primary">Create Post</a>
  </div>
  <br/>
<div class="row">
  <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#new-posts">New posts</a></li>
  <li><a data-toggle="tab" href="#posts">Posts</a></li>
</ul>

<div class="tab-content">
    <div id="new-posts" class="tab-pane fade in active">
      <div class="col-lg-12">
        @if(count($posts) > 0)
          <div class="panel panel-default">
              <div class="panel-heading">
                  New Posts lists
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables-example">
                      <thead>
                          <tr>
                              <th>Title</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($posts as $post)
                          @if(!$post->is_approved)
                          <tr class="gradeU">
                              <td><a href="/posts/{{ $post->id }}/edit"> {{ $post->title }}</a></td>
                              <td class="center">
                               <a href="/admin/posts/{{ $post->id }}/approve" onclick="return confirm('Are you sure?');">Approve</a> |
                               <a href="/admin/posts/{{ $post->id }}/delete" onclick="return confirm('Are you sure?');">Delete</a>


                              </td>
                          </tr>
                          @endif
                        @endforeach
                      </tbody>
                  </table>
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
          @else
            <h3>Post lists empty.</h3>
          @endif
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <div id="posts" class="tab-pane fade">
      <div class="col-lg-12">
        @if(count($posts) > 0)
          <div class="panel panel-default">
              <div class="panel-heading">
                  posts lists
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>Title</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($posts as $post)
                          @if($post->is_approved)
                          <tr class="gradeU">
                              <td>
                                   <a href="/posts/{{ $post->id }}/edit"> {{ $post->title }}</a>  
                                    <a href="/posts/{{ $post->id }}/edit" style="float:right;" >Comments <span class="badge">{{ count( $post->allcomments) }}</span>
                                    </a>
                              </td>
                              <!-- <td class="center"><a href="/admin/posts/{{ $post->id }}/edit">Edit</a></td> -->
                          </tr>
                          @endif
                        @endforeach

                      </tbody>
                  </table>
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
          @else
            <h3>Post lists empty.</h3>
          @endif
      </div>
      <!-- /.col-lg-12 -->
    </div>
  </div>
</div>
<!-- /.row -->
</div>
