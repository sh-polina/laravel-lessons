@extends('layouts.app')
@if($errors->any())
    @foreach($errors->all() as $error)
        <div style="color: red"> {{ $error }}</div>
    @endforeach
@endif

@section('content')
    <form action="{{route('articles.store')}}" method="post">
        <div class="mb-3">
            @csrf
            <label class="form-label"> Название статьи: </label>
            <input name="title" type="text" class="form-control">

        </div>
        <div class="mb-3">
            <label class="form-label"> Статья: </label>
            <textarea name="article_body" class="form-control"></textarea>

        </div>
        <div class="mb-3">
            <select name="user" class="form-select">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        @foreach($categories as $category)
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="category[]" value="{{ $category->id }}"/>
                <label for="category" class="form-check-label">{{ $category->name }}</label>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Create</button>

    </form>
@endsection
