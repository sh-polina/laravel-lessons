@if(session('success'))
<div>
    {{ session()->get('success') }}
</div>
@endif
<div>
    <h1>{{$article->title}}</h1>
    <p>{{$article->article_body}}</p>
    <p>Автор: {{ $article->user->name }}</p>
    <p>Категории:</p>
    <ul>
    @foreach($article->categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
    </ul>
</div>
