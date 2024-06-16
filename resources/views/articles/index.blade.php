@if(session('success'))
    <div>
        {{ session()->get('success') }}
    </div>
@endif
<div class="panel">
    {{--<p>Привет, {{ auth()->user()->name }}</p>--}}
    Articles list
    <a href="{{ route('articles.create') }}">Создать статью</a>
    <ul>
        @isset($articles)
            @foreach($articles as $article)
                <li><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a> ||
                <a href="{{ route('articles.edit', $article->id) }}"><button>Edit</button></a> ||
                <form method="post" action="{{ route('articles.destroy', $article->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                </li>
            @endforeach
        @endisset
    </ul>
    <br>
    <a href="{{ route('auth.logout') }}"><button>Выйти</button></a>
</div>
