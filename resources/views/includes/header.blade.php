<header>
    <div class="header-banner">
        <div class="header-nav">
            <a href="/"><h1>お悩み掲示板</h1></a>
            {{-- <div class="search">
                <input type="text">
                検索
            </div> --}}
            <div class="header-right">
                <ul>
                    @auth
                    <li ><a class="mypage" href="/mypage">マイページ</a></li>
                    @if(Auth::user()->role == 0)
                    <li><a href="/users">ユーザーリスト</a></li>
                    @endif
                    <li><a href="/create">新規投稿</a></li>

                    <!-- <li><a href="/">投稿一覧</a></li> -->
                    <li><a href="/setting">設定</a></li>
                    <li>
                        <form method="POST" name="form1" action="{{route('logout')}}">
                            @csrf
                            <input type="hidden">
                            <a href="javascript:form1.submit()">ログアウト</a>
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li><a href="/login">ログイン</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>
