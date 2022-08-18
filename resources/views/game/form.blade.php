@extends('layout')
@section('title', 'ゲーム投稿')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ゲーム投稿フォーム</h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
            @csrf
            <div class="form-group">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
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
                    value="{{ old('url') }}"
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
                >{{ old('content') }}</textarea>
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
                    投稿する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection