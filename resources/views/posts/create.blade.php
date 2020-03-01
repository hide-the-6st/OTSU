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

        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('posts.index' )}}">トップページへ戻る</a>
      </form>
    </div>
  </div>
</div>
@endsection
