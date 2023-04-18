<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\User;
use App\Models\Good;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContentController extends Controller
{
    /**
     * コンテンツ一覧を表示する
     *
     * @return view
     */
    public function showList(Content $content, Request $request)
    {

        $contents = Content::orderBy('id', 'desc')->paginate(20);
        $keyword = $request->input('keyword');
        $query = Content::query()->orderBy('id','desc');

        // $user_id = Auth::id();
        // $contents = Content::with('user')->where('user_id', '=', $user_id)->Paginate(2);

        if(!empty($keyword)){
            $query->where('content', 'LIKE', "%{$keyword}%")->orderBy('id', 'desc')->paginate(20);
        }
        $contents = $query->get();
        $user = User::all();
        // $user_id = $content->user_id;
        // $user = DB::table('users')->where('id', $user_id)->first();

        $goodContents = $query -> withCount('good')->orderBy('good_count', 'desc')->take(6)->get();


        // dd($goodContents[0]->good()->count());

    //    $goodNum =Content::withCount('good')->get();
    //    return view(
    //        'content.index',
    //        ['contents' => $contents, 'user' => $user, 'goodContents' => $goodContents]
    //    );
        return view('content.index', compact('contents', 'keyword', 'user', 'goodContents'));
    }

    /**
     * 投稿ページを表示する
     *
     * @return view
     */
    public function showCreate()
    {
        return view('content.create');
    }

    /**
     * 投稿確認ページを表示する
     *
     * @return view
     */
    public function showCreateconf()
    {
        return view('content.create_conf');
    }

    /**
     * 詳細を表示する
     *
     * @return view
     */
    public function showDetail(Content $content ,$id)
    {
        // $good = DB::table('goods')->where('content_id', $id)->where('user_id', auth()->user()->id)->first();
        // return view('content.detail', compact('content', 'good'));

        $content = Content::find($id);
        $user_id = $content->user_id;
        $user = DB::table('users')->where('id', $user_id)->first();
        $good = Good::where('content_id', $content->id)
            ->where('user_id', $user->id)
            ->first();
        return view('content.detail', [
            'content' => $content,
            'user' => $user,
            'hasGood' => $good !== null? true:false,
        ]);
    }

    public function showRandom(Content $content)
    {

        $names =Content::pluck('id');

        // $random = Content::inRandomOrder()->first('id');

        $random = rand(72,76);
        $array = [$random];
        // dd($random);

        // $random = Arr::random($names);
        $content = DB::table('contents')->where('id', $random)->first();

        $user_id = $content->user_id;
        $user = DB::table('users')->where('id', $user_id)->first();

        $good = Good::where('content_id', $content->id)
            ->where('user_id', $user->id)
            ->first();
        return view('content.detail', ['content' => $content, 'user' => $user,'hasGood' => $good !== null? true:false,]);
    }

    /**
     * マイページを表示する
     *
     * @return view
     */
    public function showMypage(Content $content)
    {

        $user_id = Auth::id();
        $contents = Content::with('user')->where('user_id', '=', $user_id)->paginate();
        $good = Content::with('good')->where('user_id', '=', $user_id)->paginate();

        $user = User::all();
        return view(
            'content.mypage',
            ['contents' => $contents, 'user' => $user,'good' => $good]
        );
    }



    /**
     * ユーザーページを表示する
     *
     * @return view
     */
    public function showUserpage($id)
    {
        $user = User::find($id);
        $contents = Content::with('user')->where('user_id', '=', $id)->paginate();
        return view(
            'content.userpage',
            ['contents' => $contents, 'user' => $user]
        );
    }

    /**
     * いいね一覧を表示する
     *
     * @return view
     */
    public function showMylike(Content $content)
    {
        $user_id = Auth::id();
        $contents = Content::whereHas('good', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->paginate();
        $goods = Good::with('user','content')->where('user_id', '=', $user_id)->where('user_id', '=', $user_id)->paginate();

        $user = User::all();
        return view(
            'content.like',
            ['user' => $user,'goods' => $goods, 'contents' => $contents]
        );
    }



    /**
     * 設定を表示する
     *
     * @return view
     */
    public function showSetting(Content $content)
    {


        return view('content.setting');
    }


    public function show(Content $content)
   {

       $nice=Nice::where('content_id', $post->id)->where('user_id', auth()->user()->id)->first();
       return view('contetnt.show', compact('content', 'good'));
   }
}
