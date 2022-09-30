<header>
    <div class="header-banner">
        <div class="header-nav">
            <a href="/"><h1>DTMagnet</h1></a>
            {{-- <div class="search">
                <input type="text">
                検索
            </div> --}}
            <div class="header-right">
                <ul>
                    @auth
                    <li ><a class="mypage" href="/mypage">{{ Auth::user()->name}}</a></li>
                    <li><a href="/create">投稿</a></li>
                    <li><a href="/random">ランダム</a></li>
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