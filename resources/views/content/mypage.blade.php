<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>新規投稿</title>
</head>

<body>
    @include('includes.header')
    <div class="container-white">
        <div class="user">
            <div class="user-image">
                <img src="{{asset('storage/images/'.Auth::user()->image)}}" alt="">
            </div>
            <div class="user-data">
                <div class=users>
                    <div class="user-name">
                        <h1>{{ Auth::user()->name}}</h1>
                    </div>
                    <div class="user-edit">
                        <a href="/setting">
                            <p>編集</p>
                        </a>
                    </div>
                </div>
                <p>{{ Auth::user()->prof}}</p>
            </div>
        </div>
        <div class="select">
            <div class="select-tab">
                <a href="/mypage" class="post">
                    <p>投稿</p>
                </a>
                <a href="/like" class="like">
                    <p>いいね</p>
                </a>
            </div>
        </div>
    </div>
    <div class="container-mypage">
        <div class="my-create">
            <div class="my-contents">
                <ul>
                    @foreach($contents as $content)
                    <li>
                        <a class="link" href="/detail/{{ $content->id}}">
                            <div class="contents-detail">
                                <div class="contents-image">
                                    <img src="{{asset('storage/images/'.$content->user->image)}}" alt="">
                                </div>
                                <div class="contents-title">
                                    <h2>{{ $content->title }}</h2>
                                    <h3>{{ $content->user->name }}</h3>
                                    <div class="good-count">
                                        <h4>♥</h4><p>{{ $content->good()->count()}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @include('includes.footer')
</body>

</html>