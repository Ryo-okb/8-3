<nav>
    <div class="head-title">ToDoリスト</div>

        <p class="user-name">ユーザー名: {{ auth()->user()->name }}</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">ログアウト</button>
        </form>
</nav>
