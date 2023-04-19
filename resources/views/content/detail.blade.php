<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <title>詳細</title>
</head>

<body>
    @include('includes.header')
    <div class="container-white-detail">
        <div class="detail">
            <div class="detail-prof">
                <div class="detail-icon">
                    <a href="/userpage/{{$user->id}}">
                    @if($content->user->image)
                    <img src="{{asset('storage/images/'.$user->image)}}" alt="">
                    @else
                    <img src="{{asset('storage/images/default.png')}}" alt="">
                    @endif
                </div>
                <div class="detail-name">
                        <h2>{{ $user->name }}</h2>
                    </a>
                </div>
            </div>
            <h1>{{ $content->title }}</h1>
            <div class="detail-content">
                {!! $content->content !!}
            </div>

            <div class="edit-bar">

                @auth
                <div class="good-btn">
                    <button id="good-button"
                    @if($hasGood) class="good-btn-enabled" @else class="good-btn-disabled" @endif
                    >いいね</button>
                </div>
                @endauth

                @auth
                @if (Auth::user()->id === $content->user_id || Auth::user()->role === 0)
                <div class="edit-delete">

                    <div class="edit-btn">
                        <a href="/edit/{{ $content->id}}">編集</a>
                    </div>
                        <form method="POST" action="{{ route('delete', $content->id)}}" onsubmit="return checkDelete()">
                            @csrf
                            <div class="delete-btn">
                                <button type="submit" class="btn btn-danger"onClick="return confirm('本当に削除しますか？');">削除</button>
                            </div>
                        </form>
                </div>
                @endif
                @endauth
            </div>
        </div>



{{--<span>
<img src="{{asset('img/goodbutton.png')}}" width="30px">
<!-- もし$goodがあれば＝ユーザーが「いいね」をしていたら -->
@if(isset($good))
<!-- 「いいね」取消用ボタンを表示 -->
	<a href="{{ route('ungood', $content) }}" class="btn btn-success btn-sm">
		いいね
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $content->good->count() }}
		</span>
	</a>
@else
<!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
	<a href="{{ route('good', $content) }}" class="btn btn-secondary btn-sm">
		いいね
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $content->good->count() }}
		</span>
	</a>
@endif
</span>--}}
    </div>
    @include('includes.footer')
@auth

<script>
        const goodButtonId = '#good-button';

        $(function() {
            // ［いいね］ボタンクリックでスイッチ
            $(goodButtonId).click(function() {
                // console.log({
                //     method: 'get',
                //     data: {
                //         user_id: {{ Auth::user()->id}},
                //         content_id: {{ $content->id }},
                //         goodFlag: $(goodButtonId).hasClass('good-btn-disabled'),
                //     },
                //     dataType: 'text',
                //     url: '{{ route('switchGood') }}',
                // })
                // .phpファイルへのアクセス
                $.ajax(
                {
                    method: 'get',
                    data: {
                        user_id: {{ Auth::user()->id }},
                        content_id: {{ $content->id }},
                        goodFlag: $(goodButtonId).hasClass('good-btn-disabled'),
                    },
                    dataType: 'text', //jsonからtextに
                    url: '{{ route('switchGood') }}',
                }
                )
                // 成功時にはページに結果を反映
                .done(function(data) {
                    if ($(goodButtonId).hasClass('good-btn-disabled')) {
                        console.log('いいね済み', data);
                        $(goodButtonId).addClass('good-btn-enabled');
                        $(goodButtonId).removeClass('good-btn-disabled');
                    } else {
                        console.log('いいね削除', data);
                        $(goodButtonId).addClass('good-btn-disabled');
                        $(goodButtonId).removeClass('good-btn-enabled');
                    }
                })
                // 失敗時には、その旨をダイアログ表示
                .fail(function() {
                    window.alert('エラーが発生しました。');
                });
                // .fail(function(XMLHttpRequest, textStatus, errorThrown) {
                //     alert('error!');
                //     console.log("XMLHttpRequest : " + XMLHttpRequest.status);
                //     console.log("textStatus     : " + textStatus);
                //     console.log("errorThrown    : " + errorThrown.message);
                // })
            });
        });

        function checkDelete() {
            if(window.confirm('削除してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    @endauth
</body>
</html>
