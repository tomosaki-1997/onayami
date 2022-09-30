<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Good;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GoodController extends Controller
{
    // public function good(Content $content, Request $request){
    //     $good=New Good();
    //     $good->content_id=$content->id;
    //     $good->user_id=Auth::user()->id;
    //     $good->save();
    //     return back();
    // }

    // public function ungood(Content $content, Request $request){
    //     $user=Auth::user()->id;
    //     $good=Good::where('content_id', $content->id)->where('user_id', $user)->first();
    //     $good->delete();
    //     return back();
    // }

    public function switchGood(Request $request)
    {
        Log::emergency($request->goodFlag);

        try {
            if ($request->goodFlag === 'true') {
                Log::emergency('いいね登録処理');
                // いいね登録処理
                $good = new Good();
                $good->content_id = $request->content_id;
                $good->user_id = $request->user_id;
                Log::emergency($good->user_id);
                $good->save();
            } else {
                // いいね解除処理
                Log::emergency('いいね削除処理');
                // $user = Auth::user()->id;
                $good = Good::where('content_id', $request->content_id)->where('user_id', $request->user_id)->first();
                if($good !== null) {
                    $good->delete();
                }
            }
            return $request->all();
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
        }
    }
}
