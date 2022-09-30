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
    <div class="container-white-setting">
        <div class="account">
            <h1>アカウント設定</h1>
            <div class="profile">
                <h2>プロフィール</h2>
                <form method="post" action="/user_edit"enctype="multipart/form-data">
                @csrf
                <div class="prof-icon">
                    <a href="">
                        <img src="{{asset('storage/'.Auth::user()->image)}}'" alt="">
                        <input id="image" name="image" type="file">
                    </a>
                </div>
                    <p>ユーザー名</p>
                    <input class="setting-acount" name="name" type="text" value="{{ Auth::user()->name}}" >
                    <p>自己紹介</p>
                    <textarea class="setting-acount" name="prof" id="" cols="30" rows="10">{{ Auth::user()->prof}}</textarea>
                    <div class="setting-edit">
                        <button type="submit" class="account-edit">変更する</button>
                    </div>
                </form>
            </div>
            {{-- <div class="delete">
                <h1>退会</h1>
                <h3>退会するとすべてのデータが削除され、復元できません。</h3>
                <a href="">
                    <p>退会する</p>
                </a>
            </div> --}}
        </div>
    </div>
    @include('includes.footer')
</body>
</html>