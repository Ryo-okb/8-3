<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/app.css">
    <title>Edit Task</title>
</head>
<body>
    @include('header')
    <h1 class="title">タスク編集画面</h1>
    <div class="container">
        <form class="form" action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">タスクタイトル</label>
                <input type="text" id="title" name="title" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label for="status">タスク状態</label>
                <select id="status" name="status" required>
                    <option value="未着手" {{ $task->status === '未着手' ? 'selected' : '' }}>未着手</option>
                    <option value="着手中" {{ $task->status === '着手中' ? 'selected' : '' }}>着手中</option>
                    <option value="完了" {{ $task->status === '完了' ? 'selected' : '' }}>完了</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deadline">タスク期限日</label>
                <input type="date" id="deadline" name="deadline" value="{{ $task->deadline }}" required>
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
