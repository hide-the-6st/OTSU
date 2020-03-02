@extends('layouts.app')

@section('content')
<div class="card-header">Board</div>
<div class="card-body">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif
  @foreach($posts as $post)
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">タイトル: {{ $post->title }}</h5>
      <h5 class="card-author">投稿者: {{ $post->user->name }}</h5>
      <p class="card-text">本文: {{ $post->content }}</p>
      <p class="card-timestamps">投稿日時: {{ $post->created_at->format('Y/m/d') }}</p>
      <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">詳細</a>
    </div>
  </div>
  @endforeach
  {{ $posts->links() }}
</div>
@endsection
