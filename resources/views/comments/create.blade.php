@extends('layouts.app')

@section('content')
<div class="card-header">Comment</div>
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
      <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="exampleInputComment">comment:</label>
          <textarea class="form-control" id="exampleInputComment" aria-describedby="commentHelp"
          placeholder="コメントを入力してください" name="comment"></textarea>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="post_id" value="{{ $post_id }}">
        <button type="submit" class="btn btn-primary">投稿</button>
      </form>
    </div>
  </div>
</div>
@endsection
