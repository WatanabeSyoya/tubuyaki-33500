@extends('layouts.app')

@section('content')
<div class="card-header">Board</div>
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
      @if( Auth::check() && Auth::id() === $post->user->id )
        <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-primary">編集</a>
        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">削除</button>
        </form>
      @endif
      
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">タイトル:{{ $post->title }}</h5>
            <h5 class="card-title">
                カテゴリー:{{ $post->category->category_name }}
            </h5>
            <h5 class="card-title">
                投稿者:{{ $post->user->name }}
            </h5>
            <p class="card-text">{{ $post->content }}</p>
          </div>
        </div>

       <div class="p-3">
        <h3 class="card-title">コメント一覧</h3>
        @foreach($post->comments as $comment)
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{ $comment->comment }}</p>
                    <p class="card-text">
                        投稿者:
                        <a href="{{ route('users.show', $comment->user->id) }}">
                            {{ $comment->user->name }}
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
        <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="btn btn-primary">コメントする</a>
    </div>
</div>
@endsection