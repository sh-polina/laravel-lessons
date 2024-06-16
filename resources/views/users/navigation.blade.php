@if(auth()->check())
    <ul>
        <li><a href="{{ route('articles.index') }}">Статьи</a></li>
    </ul>
@else
    <ul>
        <li><a href="{{ route('auth.login') }}">Логин</a></li>
    </ul>
@endif

