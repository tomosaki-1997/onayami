<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <title>新規投稿</title>
</head>

<body>
    @include('includes.header')

    <div class="detail">
        <div class="container-white">
            <form method="POST" action="/create_edit_comp/{{ $content->id}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $content->id}}">
                <div class="detail">
                    <h1>
                        <div class="title">
                            <div id="summernote">
                                {{ $inputs['title'] }}
                                <input name="title" value="{{ $inputs['title'] }}" type="hidden">
                            </div>
                        </div>
                    </h1>
                    <div class="detail-content">
                        <div class="detail">
                            {!! ($inputs['content']) !!}
                            <input name="content" value="{{ $inputs['content'] }}" type="hidden">
                        </div>
                    </div>
                </div>
                <div class="create-send">
                    <h2>こちらの内容で投稿しますか？</h2>
                    <div class="create-send-button">
                        <div class="create-send-button-back">
                            <button type="submit" name="action" value="back">戻る</button>
                        </div>
                        <div class="create-send-button-post">
                            <button type="submit" name="action" value="submit">投稿</button>
                        </div>
            </form>
        </div>
    </div>
    @include('includes.footer')
</body>

</html>