@extends('layout')
@section('title','ゲーム一覧')
@section('content')
<div class="row">
  <div class="col-md-12 col-md-offset-2">
      <h2>ゲーム一覧</h2>
      @if(session('err_msg'))
        <p class="text-danger">
          {{session('err_msg')}}
        <p>
      @endif
      <table class="table table-striped">
          <tr>
              <th>タイトル</th>
              <th>url</th>
              <th></th>
              <th></th>
          </tr>
          @foreach($games as $game)
          <tr>
              <td><a href ="/game/{{$game->id}}">{{$game->title}}</a></td>
              <td><a href ="{{$game->url}}">{{$game->url}}</a></td>
              <td><button type="button" class="btn btn-primary" onclick="location.href='/game/edit/{{$game->id}}'">編集</button></td>
              <form method="POST" action="{{ route('delete',$game->id) }}" onSubmit="return checkDelete()">
              @csrf
                <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
              </form>
          </tr>
          @endforeach
      </table>
  </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection