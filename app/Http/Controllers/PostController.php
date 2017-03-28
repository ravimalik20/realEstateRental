<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, Validator, Redirect;

use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $filemime = array('video/mp4', 'image/jpeg',  'image/jpg', 'image/png', 'video/3gp');
    public function index()
    {
      $data = [];
      $data['page'] = 'posts';
      $data['posts'] = Post::all();
      return view('admin', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected function validator(array $data)
     {
         return Validator::make($data, [
             'title' => 'required',
             'content' => 'required',
         ]);
     }

    public function create()
    {
      $data = [];
      $data['page'] = 'create_post';
      return view('admin', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = $this->validator($request->all());
      if($validator->fails())
      {
          return Redirect::back()->withInput()->withErrors($validator);
      }
      if($request->hasFile('file')) {
          $mime = $request->file->getMimeType();

          if(!in_array($mime, $this->filemime)){

              return Redirect::back()->withInput()->withErrors(array('errors'=>['file must be type of '. implode($this->filemime, ',')]));
          }

      }

      Post::store($request);
      Session::flash('success_message', 'Your post has been submited successfully.');
      return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = [];
      $data['page'] = 'admin_post_edit';
      $data['post'] = Post::find($id);
      return view('admin', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approvePost($id)
    {
      $post = Post::find($id);
      if($post)
      {
          $post->is_approved = 1;
          $post->save();
          Session::flash('success_message', 'Post has been approved successfully.');
      }
      else
      {
          Session::flash('error_message', 'Something went wrong with approval.');
      }
      return back();
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        if($post) {
            $post->delete();
            Session::flash('success_message', 'Post has been deleted successfully.');
            return redirect('/posts');
        }
        Session::flash('error_message', 'Something went wrong.');
        return back();
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        if($comment) {
            $comment->delete();
            Session::flash('success_message', 'comment has been deleted successfully.');
            return back();
        }
        Session::flash('error_message', 'Something went wrong.');
        return back();
    }
}
