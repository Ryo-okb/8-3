<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>
    @include('header')
    <h1 class="title">タスク作成</h1>
    <div class="container">
        <form class="form" action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">タスクタイトル</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="status">タスク状態</label>
                <select id="status" name="status" required>
                    <option value="未着手">未着手</option>
                    <option value="着手中">着手中</option>
                    <option value="完了">完了</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deadline">タスク期限日</label>
                <input type="date" id="deadline" name="deadline" required>
            </div>
            <div class="form-group">
                <label for="folder">フォルダ</label>
                <select id="folder" name="folder_id" required>
                    @foreach ($folders->where('del_flg' , 0) as $folder)
                        <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">送信</button>
        </form>
    </div>

</body>
</html>
