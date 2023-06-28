<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/app.css">
    <title>Create Folder</title>
</head>
<body>
    @include('header')
    <h1 class="title">フォルダ作成</h1>

    <div class="container">  
        <form class="form" action="{{ route('folders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">フォルダタイトル:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <button type="submit">送信</button>
            </div>
        </form>
    </div>
</body>
</html>
