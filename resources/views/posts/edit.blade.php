@extends('layouts.app')

@section('content')
<div class="card-header">Board</div>
<div class="card-body">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif
  <div class="card">
    <div class="card-body">
      @if($errors->any())
      <div>
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form action="{{ route('posts.update', $post ?? '') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="exampleInputTitle">title:</label>
          <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp"
          value="{{ $post->title }}" name="title">
        </div>
        <div class="form-group">
          <label for="exampleInputText">comment:</label>
          <textarea class="form-control" id="exampleInputComment" aria-describedby="commentHelp"
          value="{{ $post->content }}" name="content">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">file:</label>
          <input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp" name="files">
        </div>

        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <button type="submit" class="btn btn-primary">決定</button>
        <a href="{{ route('posts.index' )}}">トップページへ戻る</a>
      </form>
    </div>
  </div>
</div>
@endsection
