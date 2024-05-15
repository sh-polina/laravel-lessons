@if($errors->any())
    @foreach($errors->all() as $error)
        <div style="color: red"> {{ $error }}</div>
    @endforeach
@endif
<div>
    <form action="{{route('articles.update', $article->id)}}" method="post">
        @csrf
        @method('PUT')
        <input name="title" value="{{$article->title}}">
        <input name="article_body" value="{{$article->article_body}}">
        <button type="submit">Edit</button>
    </form>
</div>
