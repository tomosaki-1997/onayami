<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <title>パスワード変更メール</title>
</head>
<body>
    @include('includes.header')

    <div class="container">
        <div class="login">
            <h1>登録しているメールアドレスを入力してください。</h1>
            <form action="">
                <input type="text"><br>
                <button class="login-button" type="submit">送信</button>
            </form>

            
        </div>
    </div>
    @include('includes.footer')
</body>
</html>