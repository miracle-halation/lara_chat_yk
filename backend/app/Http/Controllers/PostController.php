<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $posts = Post::all();
    return view('posts.index')->with(['posts'=>$posts]);
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store(Request $request)
  {
    $datas = $request['data'];
    $img_pathes = array();
    $images = $request->file('images');
    foreach($images as $img){
      $path = $img->store('img','public');
      $img_pathes[] = $path;
    }
    foreach($datas as $key => $data){
      $post = new Post();
      $data['img_path'] = $img_pathes[$key-1];
      if(!$post->fill($data)->save()){
        return redirect()->route('posts.create');
      }
    }
    return redirect()->route('posts.index');
  }

  public function show($id)
  {
    $post = Post::find($id);
    return view('posts.show')->with(['post'=>$post]);
  }
}
