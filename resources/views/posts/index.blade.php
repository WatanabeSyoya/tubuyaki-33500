@extends('layouts.app')

@section('content')
<div class="card-body">
    <form class="form-inline" action="{{ route('posts.search') }}" method="get">
        {{ csrf_field() }}
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control"  name="search" id="inputPassword2" placeholder="検索できます">
        </div>
        <button type="submit" class="btn btn-primary mb-2">検索する</button>
    </form>
</div>

<div class="card-header">今の気持ちをつぶやいて下さい</div>

@isset($search_result)
    <h5 class="card-title">{{ $search_result }}</h5>
@endisset

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @foreach($posts as $post)
    <div class="card">
        <div class="card-body">
        <h5 class="card-title">タイトル:{{ $post->title }}</h5>
        <h5 class="card-title">
            カテゴリー:
            <a href="{{ route('posts.index', ['category_id' => $post->category_id]) }}">
            {{ $post->category->category_name }}
            </a>
        </h5>
        <h5 class="card-title">
            投稿者:
            <a href="{{ route('users.show', $post->user_id) }}">
            {{ $post->user->name }}
            </a> 
        </h5>   
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細</a>
        </div>
    </div>
    @endforeach

@if(isset($category_id))
    {{ $posts->appends(['category_id' => $category_id])->links() }}

@elseif(isset($search_query))
    {{ $posts->appends(['search' => $search_query])->links() }}

@else
    {{ $posts->links() }}
@endif

</div>
@endsection
