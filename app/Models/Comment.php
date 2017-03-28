<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = array();

    public static function store($request)
    {
      $comment = self::firstOrNew(array('id'=>$request->id));
      $comment->post_id = $request->post_id;
      $comment->name = $request->name;
      $comment->email = $request->email;
      $comment->comment = $request->comment;
      $comment->is_approved = 1;
      $comment->save();
      return true;
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function post()
    {
      return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }
}
