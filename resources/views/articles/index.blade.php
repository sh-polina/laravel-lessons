@if(session('success'))
    <div>
        {{ session()->get('success') }}
    </div>
@endif
<div class="panel">
    Articles list
    <a href="{{ route('articles.create') }}">Создать статью</a>
    <ul>
        @isset($articles)
            @foreach($articles as $article)
                <li><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                    <img width="100" height="100" src="{{ asset('storage/images/' . $article->image_path) }}" alt="">
                    <a href="{{ route('downloadImage', $article->id) }}"><button>Download Image</button></a>
                    ||
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
</div>
