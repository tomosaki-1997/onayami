<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>DTMagnet</title> --}}
</head>

<body>
    @include('includes.header')

    <div class="container">
        <div class="new">
            <div class="flex" style="margin-top: 5rem;">
                <form action="{{ route('index') }}" method="GET"  style="text-align: right;">
                    <input type="text"  name="keyword" placeholder="キーワードを入れる" value="{{ $keyword }}">
                    <input type="submit" value="検索する">

                </form>
            </div>

        </div>
        <div class="new">
            <h1>人気の投稿</h1>
            <div class="contents-list">
                <ul>
                @foreach($goodContents as $content)
                    <li>
                        <div class="contents">
                            <a class="link" href="/detail/{{ $content->id}}">
                                <div class="contents-detail">
                                    <div class="contents-image">
                                        <object><a href="/userpage/{{$content->user->id}}">
                                            @if($content->user->image)
                                            <img src="{{asset('storage/images/'.$content->user->image)}}" alt="">
                                            @else
                                            <img src="{{asset('storage/images/default.png')}}" alt="">
                                            @endif
                                        </a></object>
                                    </div>
                                    <div class="contents-title">
                                        <h2>{{ $content->title }}</h2>
                                        <h3>{{ $content->user->name }}</h3>
                                          <div>{!! Str::limit($content->content, 50, '...続きを読む') !!}</div>
                                        <div class="good-count">
                                            <h4>♥{{ $content->good()->count()}}</h4>
                                            <div class="card-footer">
                                                <span class="mr-2 float-right">
                                                     投稿日時 {{$content->created_at->diffForHumans()}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>

        <div class="new">
            <h1>投稿一覧（最新版）</h1>
            <div class="contents-list">
                <ul>
                    @foreach($contents as $content)
                    <li>
                        <div class="contents">
                            <a class="link" href="/detail/{{ $content->id}}">
                                <div class="contents-detail">
                                    <div class="contents-image">
                                        <object><a href="/userpage/{{$content->user->id}}">
                                            @if($content->user->image)
                                            <img src="{{asset('storage/images/'.$content->user->image)}}" alt="">
                                            @else
                                            <img src="{{asset('storage/images/default.png')}}" alt="">
                                            @endif
                                        </a></object>
                                    </div>
                                    <div class="contents-title">
                                        <h2>{{ $content->title }}</h2>
                                        <h3>{{ $content->user->name }}</h3>
                                        {{-- ここを追加 --}}
                                        <div>{!! Str::limit($content->content, 50, '...続きを読む') !!}</div>
                                        {{-- ここを追加 --}}

                                        <div class="good-count">
                                            <h4>♥{{ $content->good()->count()}}</h4>
                                            <div class="card-footer">
                                               <span class="mr-2 float-right">
                                                   投稿日時 {{$content->created_at->diffForHumans()}}
                                               </span>

                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    @include('includes.footer')
</body>
</html>
