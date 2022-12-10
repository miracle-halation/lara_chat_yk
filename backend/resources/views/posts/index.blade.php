@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <a href="{{route('posts.create')}}">
      <button type="button" class="btn btn-success">新規作成</button>
    </a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">title</th>
          <th scope="col">List</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <th scope="row">{{$post->id}}</th>
          <td>{{$post->title}}</td>
          <td>
            <a href="{{route('posts.show', ['id'=>$post->id])}}">
              <button type="button" class="btn btn-primary">詳細</button>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
