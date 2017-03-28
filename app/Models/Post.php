<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Post extends Model
{
  protected $table = 'posts';
  protected $guarded = array();

  public static function store($request) {
    $post  = Post::firstOrNew(array('id'=>$request->id));
    $post->user_id = Auth::user()->id;
    $post->title  = $request->title;
    $post->content = $request->content;
    if($request->hasFile('file')){
      $mime = $request->file->getMimeType();
      $imageName = time().'.'.$request->file->getClientOriginalExtension();
      $request->file->move(public_path('assets/post/images'), $imageName);
      if($mime == 'video/mp4' || $mime == 'video/3gp' )
      {
         $post->videourl = $imageName;
      }
      else {
        if($post->videourl)
          self::deleteVideo($post);

        $post->thumbnail_image = $imageName;
      }

    }
    $post->save();
    return true;
  }

  public static function deleteVideo($Post)
  {
    //unlink(' assets/post/images/'.$Post->videourl);
    $Post->videourl = null;
    $Post->save();
    return true;
  }

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function comments()
  {
    return $this->hasMany('App\Models\Comment', 'post_id', 'id')->where('is_approved', 1);
  }

  public function newComments()
  {
    return $this->hasMany('App\Models\Comment', 'post_id', 'id')->where('is_approved', 0);
  }

  public function allcomments()
  {
    return $this->hasMany('App\Models\Comment', 'post_id', 'id');
  }

}
