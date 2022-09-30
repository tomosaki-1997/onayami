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
            <form method="POST" action="/signup/store">
                @csrf
                <h1>アカウント名</h1>
                {{ $inputs['name'] }}
                    <input name="name" value="{{ $inputs['name'] }}" type="hidden">
                <h1>メールアドレス</h1>
                {{ $inputs['email'] }}
                    <input name="email" value="{{ $inputs['email'] }}" type="hidden">
                
                    <input name="password" value="{{ $inputs['password'] }}" type="hidden"><br>
                <button class="login-button" type="submit">新規登録</button>
            </form>

        </div>
    </div>
    @include('includes.footer')
</body>

</html>