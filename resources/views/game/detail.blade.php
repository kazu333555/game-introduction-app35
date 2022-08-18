@extends('layout')
@section('title','ゲーム詳細')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>{{$game->title}}</h2>
        <span>
            作成日：{{$game->created_at}}
        </span>
        <span>
            更新日：{{$game->updated_at}}
        </span>
        <p>{{$game->content}}</p>
  </div>
</div>
@endsection