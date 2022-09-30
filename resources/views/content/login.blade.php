<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>ログイン</title>
</head>
<body>
    @include('includes.header')

    <div class="container">
        <div class="login">
            <form method="POST" action="{{route('login')}}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                
                @if (session('ligin_error'))
                    <div class="alert alert-danger">
                        {{ session(ligin_error) }}
                    </div>
                @endif
                <h1>メールアドレス</h1>
                <input type="email" id="inputEmail" name="email"><br>
                <h1>パスワード</h1>
                <input type="password" id="inputPassword" name="password" ><br>
                <button class="login-button" type="submit">ログイン</button>
            </form>
            <div class ="login-other">
                <a href="/signup">新規登録はこちら</a><br><br>
                <a href="/reset_mail">パスワードを忘れた方はこちら</a>
            </div>
            
        </div>
    </div>
    @include('includes.footer')
</body>
</html>