<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /**
     * ログイン画面を表示する
     * 
     * @return view
     */
    public function showList()
    {
        return view ('content.login');
    }

    /**
     * 新規登録画面を表示する
     * 
     * @return view
     */
    public function showSignup()
    {
        return view ('content.signup');
    }

    public function signupConfirm(Request $request)
    {
        //バリデーションを実行（結果に問題があれば処理を中断してエラーを返す）
        $request->validate([
            'name' => 'required',
            'email'  => 'required',
            'password'  => 'required',
        ]);
        
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();

        //入力内容確認ページのviewに変数を渡して表示
        return view('content.signup_conf', [
            'inputs' => $inputs,
        ]);
    }

        /**
     * 新規登録画面を表示する
     * 
     * @return view
     */
    public function exeStore(Request $request){
        $content=new User();
        $content->name=$request->name;
        $content->email=$request->email;
        $content->password=Hash::make($request->password);
        $content->save();
        return redirect('/login');
        }

        /**
     * 新規登録画面を表示する
     * 
     * @return view
     */
    public function showResetmail()
    {
        return view ('content.reset_mail');
    }
}