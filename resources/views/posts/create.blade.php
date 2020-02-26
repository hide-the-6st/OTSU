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
      <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputTitle">title:</label>
          <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp"
          placeholder="タイトルを入力してください(必須ではありません)" name="title">
        </div>
        <div class="form-group">
          <label for="exampleInputText">comment:</label>
          <textarea class="form-control" id="exampleInputComment" aria-describedby="commentHelp"
          placeholder="本文を入力してください" name="content"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection
