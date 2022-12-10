@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <a href="{{route('posts.index')}}">
      <button type="button" class="btn btn-success">トップへ戻る</button>
    </a>
    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @for ($i = 1; $i <= 2; $i++)
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="data[{{$i}}][title]">
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="data[{{$i}}][content]"></textarea>
      </div>
      <div class="mb-3">
        <label for="img_path" class="form-label">画像</label>
        <input type="file" class="form-control" id="img_path" name="images[]" multiple>
      </div>
      @endfor
      <button type="submit" class="btn btn-success">作成</button>
    </form>
  </div>
</div>
@endsection
