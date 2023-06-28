<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>ログイン</title>
</head>
<body>
<h1 class="title">ログイン</h1>
    <div class="container">  
        @if(Session::has('error'))
            <div class="error-message">
                {{ Session::get('error') }}
            </div>
        @endif

        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">email:</label>
                <input type="email" name="email" id="email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">パスワード:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <button type="submit">送信</button>
            </div>
        </form>
    </div>
    <div class="signup">
        <a href="{{ route('showSignupForm') }}">新規登録画面へ</a>
    </div>
</body>
</html>

