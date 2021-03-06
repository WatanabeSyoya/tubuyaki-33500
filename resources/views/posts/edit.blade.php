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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
              <div class="form-group">
                <label for="exampleInputEmail1">title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="title" name="title" value="{{ $post->title }}">
              </div>

               <div class="form-group">
                    <label for="exampleFormControlSelect1">category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id" >
                        <option selected="">選択する</option>
                        <option value="1" @if( $post->category->id == 1 ) selected @endif >book</option>
                        <option value="2" @if( $post->category->id == 2 ) selected @endif >cafe</option>
                        <option value="3" @if( $post->category->id == 3 ) selected @endif >travel</option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="comment">Comment:</label>
                  <textarea class="form-control" rows="5" id="comment" name="content" >{{ $post->content }}</textarea>
                </div>

              <button type="submit" class="btn btn-primary">更新する</button>
            </form>
          </div>
        </div>
</div>
@endsection