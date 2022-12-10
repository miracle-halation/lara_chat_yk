@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <a href="{{route('posts.index')}}">
      <button type="button" class="btn btn-success">トップへ戻る</button>
    </a>
    <div class="card" style="width: 18rem;">
      <img src="{{Storage::url($post->img_path)}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->content}}</p>
      </div>
    </div>
  </div>
</div>
@endsection
