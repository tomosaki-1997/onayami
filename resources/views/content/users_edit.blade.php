<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <title>ユーザー用編集</title>
</head>

<body>
    @include('includes.header')
    <div class="container">
        <div class="create">
            <form method="POST" action="/user_edit/{{ $user->id }}">
                @csrf
                <label for="name">名前</label>
                <input type="text" name="name" value="{{ $user->name }}">

                <label for="email">メールアドレス</label>
                <input type="text" name="email" value="{{ $user->email }}">

                <label for="prof">プロフィール</label>
                <input type="text" name="prof" value="{{ $user->prof }}">

                <label for="role">ユーザー権限</label>
                <select name="role" id="role">
                    <option value="0" @if($user->role == 0) selected @endif>管理者</option>
                    <option value="1" @if($user->role == 1) selected @endif>一般</option>
                </select>

                <input type="submit" value="確定する" onclick="confirm('この内容で変更しますか？');">
            </form>
        </div>
    </div>
    @include('includes.footer')

</body>

</html>
