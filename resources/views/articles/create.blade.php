@if($errors->any())
    @foreach($errors->all() as $error)
        <div style="color: red"> {{ $error }}</div>
    @endforeach
@endif

<div>
    <form action="{{route('articles.store')}}" method="post">
        @csrf
        <input name="title" type="text">
        <textarea name="article_body"></textarea>
        <select name="user">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        @foreach($categories as $category)
            <input type="checkbox" name="category[]" value="{{ $category->id }}"/>
            <label for="category">{{ $category->name }}</label>
        @endforeach
        <button type="submit">Create</button>
    </form>
</div>
