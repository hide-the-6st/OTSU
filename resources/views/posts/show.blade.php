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
      <h5 class="card-title">タイトル: {{ $post->title }}</h5>
      <h5 class="card-author">投稿者: {{ $post->user->name }}</h5>
      <p class="card-text">本文: {{ $post->content }}</p>
      <p class="card-timestamps">投稿日時: {{ $post->created_at->format('Y/m/d') }}</p>
      <div class="d-flex">
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary ml-1">編集</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
          @method('DELETE')
          @csrf
          <button onclick="return confirm('削除します。よろしいですか？')" class="btn btn-secondary ml-1">削除</botton>
          </form>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      </div>
    </div>
  </div>
@endsection
