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
            <form method="POST" action="/signup_conf">
                @csrf
                <h1>アカウント名</h1>
                <input name="name" value="{{ old('name')}}" type="text">
                    @if ($errors->has('title'))
                    <p class="error-message">{{ $errors->first('name') }}</p>
                    @endif
                <h1>メールアドレス</h1>
                <input name="email" value="{{ old('email')}}" type="text">
                    @if ($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                    @endif
                <h1>パスワード</h1>
                <input name="password" value="{{ old('password')}}" type="password"><br>
                    @if ($errors->has('password'))
                    <p class="error-message">{{ $errors->first('password') }}</p>
                    @endif
                <button class="login-button" type="submit">新規登録</button>
            </form>
            
        </div>
    </div>
    @include('includes.footer')
</body>
</html>