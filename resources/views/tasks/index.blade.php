<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>Task List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
</head>
<body>
@include('header')
    <h1 class="title">Task List</h1>

    <a href="{{ route('folders.create') }}" class="action-link">フォルダ作成</a>
    <a href="{{ route('tasks.create') }}" class="action-link">タスク作成</a>

 <!-- 省略 -->

<!-- 省略 -->

@foreach ($folders->where('del_flg', 0) as $folder)
    <div class='folder_title'>
        <div class="folder-header" data-folder="{{ $folder->id }}">
            <h2>{{ $folder->name }}</h2>
            <form action="{{ route('folders.destroy', $folder->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="folder-delete-button">削除</button>
            </form>
        </div>
        <table class="task-table">
            <thead>
                <tr>
                    <th>タスク名</th>
                    <th>期限日</th>
                    <th>ステータス</th>
                    <th></th>
                    
                    
                </tr>
            </thead>
            <tbody>
            @foreach ($folder->tasks->where('del_flg', 0) as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->deadline }}</td>
                    <td class="task-status {{ $task->status }}">{{ $task->status }}</td>
                    <td><a href="{{ route('tasks.edit', $task->id) }}">編集</a>
                    
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endforeach

<!-- 省略 -->

<script>
    function handleFolderClick(event) {
        const folderHeader = event.currentTarget;
        const taskList = folderHeader.nextElementSibling;
        if (taskList.style.display === 'none') {
            taskList.style.display = 'block';
        } else {
            taskList.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const folderHeaders = document.querySelectorAll('.folder-header');
        folderHeaders.forEach(function(folderHeader) {
            folderHeader.addEventListener('click', handleFolderClick);
            const taskList = folderHeader.nextElementSibling;
            taskList.style.display = 'none';
        });
    });
</script>


</body>
</html>
