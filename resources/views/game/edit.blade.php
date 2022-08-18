@extends('layout')
@section('title', 'ゲーム編集')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ゲーム編集フォーム</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
            @csrf
            <input type="hidden" name="id" value="{{$game->id}}">
            <div class="form-group">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{$game->title}}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="url">
                    url
                </label>
                <input
                    id="url"
                    name="url"
                    class="form-control"
                    value="{{$game->url}}"
                    type="text"
                >
                @if ($errors->has('url'))
                    <div class="text-danger">
                        {{ $errors->first('url') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">
                      内容
                </label>
                <textarea
                    id="content"
                    name="content"
                    class="form-control"
                    rows="4"
                >{{$game->content}}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('games') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection