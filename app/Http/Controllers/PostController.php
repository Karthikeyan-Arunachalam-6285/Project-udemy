<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Validator;
class PostController extends Controller
{
    public $user_id; 
    //
    public function show(Post $post)
    {
        return view ('blog-post',['post'=>$post]);
    }
    public function create( )
    {
        return view ('admin.create');
    }
    
    public function store(Request $request)
    {
            $request->validate([
            'title' => 'required',
            'post_image' => 'required',
            'body' => 'required|max:255'
        ]);
        
         
          $post  = new Post();
          $post->user_id = auth()->user()->id;
          $post->title = $request->title; 
          $post->post_image = $request->post_image;
          $post->body = $request->body; 
          $post->save();
         
          $request->session()->flash('message','Post has been created...');
          return redirect('/admin/posts/create');
    }
    public function index( )
    {
        $posts = Post::all();
        return view ('admin.viewallpost',['posts' => $posts]);
    }
    public function delete($post_id)
    {
         $post =Post::find($post_id);
         $post->delete();
         session()->flash('message','Post has been deleted...');
         return redirect('/adminviewpost');
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return view ('admin/editpost',['post'=>$post]);
    }
    public function updatePost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'post_image' => 'required',
            'body' => 'required|max:255'
        ]);
        $post = Post::find($request->id);   
        $post->title = $request->title;
        $post->body= $request->body;
        $post->save();
        $request->session()->flash('message','Post has been Updated..');
        return redirect('adminviewpost');
    }
}
 
