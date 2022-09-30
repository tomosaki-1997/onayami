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
            <h1>最新の投稿</h1>
            <div class="contents-list">
                <ul>
                    @foreach($contents as $content)
                    <li>
                        <div class="contents">
                            <a class="link" href="/detail/{{ $content->id}}">
                                <div class="contents-detail">
                                    <div class="contents-image">
                                        <object><a href="/userpage/{{$content->user->id}}">
                                            <img src="{{asset('storage/images/'.$content->user->image)}}" alt="">
                                        </a></object>
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
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            {{ $contents->links('pagination::bootstrap-4') }}
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
                                            <img src="{{asset('storage/images/'.$content->user->image)}}" alt="">
                                        </a></object>
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
                        </div>
                    </li>
                    @endforeach
                </ul>
                
            </div>
        </div>
    </div>
    @include('includes.footer')
</body>