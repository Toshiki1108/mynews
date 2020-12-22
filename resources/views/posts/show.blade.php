@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
               <h3>詳細ページ</h3>
               <a href="{{route('posts.create')}}" class="btn btn-primary">新規投稿</a>
             <div class="card text-center">
            <div class="card-header">
              <div class="card-header">Mynews</div>
            </div>
               <div class="card-body">
                <h5 class="card-title">タイトル:{{ $post->title}}</h5>
                <p class="card-text">内容:{{ $post->body }}</p>
                <img src="{{ $post->image_path }}" alt="画像">
                @if($post->user_id ===Auth::id())
                <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">編集画面へ</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method='POST'>
                   {{ csrf_field() }}
                   {{ method_field('DELETE') }}
                     <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("削除しますか？？");'>
                </form>
                @endif
               </div>
            
            <div class="card-footer text-muted">
                投稿日:{{ $post->created_at }}
            </div>

        </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('comments.store') }}" method="POST">
            {{csrf_field()}}
                 <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                
                </div>
                <div class="form-group">
                    <label>コメント</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">コメントする</button>
            </form>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($post->comments as $comment)
            <div class="card mt-3">
                <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                <div class="card-body">
                    <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                    <p class="card-text">内容：{{ $comment->body }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection 