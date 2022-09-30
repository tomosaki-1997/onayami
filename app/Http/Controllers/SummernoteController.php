<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Content;
use Illuminate\Support\Facades\Auth;


class SummernoteController extends Controller
{
    public function create( ){
        return view('content.create');
    }

    public function confirm(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'title' => 'required',
            'content'  => 'required',
        ]);
        
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('content.create_conf', [
            'inputs' => $inputs,
        ]);
    }

    public function image (Request $request){
        $result=$request->file('file')->isValid();
        if($result){
            $filename = $request->file->getClientOriginalName();
            $file=$request->file('file')->move('summernote_images', $filename);
            echo '/summernote_images/'.$filename;
        }
    }

    public function store(Request $request){
        $id = Auth::id();

        $content=new Content();
        $content->title=$request->title;
        $content->content=$request->content;
        $content->user_id = $id;
        $content->save();
        return redirect('/');
        }

        public function edit($id) {
        $content = Content::find($id);
            return view('content.create_edit', ['content' => $content]);
        }

        public function editConfirm(Request $request,$id )
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'title' => 'required',
            'content'  => 'required',
        ]);
        
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();
        $content = Content::find($id);


        //入力内容確認ページのviewに変数を渡して表示
        return view('content.create_edit_conf', [
            'inputs' => $inputs,'content' => $content

        ]);
    }

    public function editStore(Request $request,$id ){
        // $id = Auth::id();
        $inputs = $request->all();

        // $content= Content::find($id);
        // $content->title=$request->title;
        // $content->content=$request->content;
        // $content->user_id = $id;

        $content = Content::find($inputs['id']);
        $content->fill([
            'title' => $inputs['title'],
            'content' => $inputs['content'],
        ]);
        $content->save();
        return redirect('/');
        }

        public function delete($id)  {
            // if (empty($id)) {
            //     \Session::flash('err_msg', 'データがありません');
            //     return redirect(route('content'));
            // }
            $content = Content::destroy($id);
            return redirect('/');
        }
}