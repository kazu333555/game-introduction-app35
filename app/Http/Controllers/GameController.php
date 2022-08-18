<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Http\Requests\GameRequest;

class GameController extends Controller
{

    public function showList(){
        $games = Game::all();
        return view('game.list',['games' => $games]);
    }

    public function showDetail($id){
        $game = Game::find($id);
        if(is_null($game)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('games'));
        }
        return view('game.detail',['game'=>$game]);
    }

    public function showCreate(){
        return view('game.form');
    }

    public function exeStore(GameRequest $request){
        $inputs = $request->all();

        \DB::beginTransaction();
        try{
            Game::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
       
        \Session::flash('err_msg','ゲームを登録しました');
        return redirect(route('games'));
    }

    public function showEdit($id){
        $game = Game::find($id);
        if(is_null($game)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('games'));
        }
        return view('game.edit',['game'=>$game]);
    }

    public function exeUpdate(GameRequest $request){
        $inputs = $request->all();
        \DB::beginTransaction();
        try{
            $game = Game::find($inputs['id']);
            $game->fill([
                'title' => $inputs['title'],
                'url' => $inputs['url'],
                'content' => $inputs['content']
            ]);
            $game->save();
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
       
        \Session::flash('err_msg','ゲームを更新しました');
        return redirect(route('games'));
    }

    public function exeDelete($id){
        if(empty($id)){
            \Session::flash('err_msg','データがありません。');
            return redirect(route('games'));
        }
        try{
            Game::destroy($id);
        }catch(\Throwable $e){
            abort(500);
        }
        \Session::flash('err_msg','削除しました');
        return redirect(route('games'));
    }

}
