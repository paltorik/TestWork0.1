@extends('layouts.app')

@section('content')


<form name="create_article" method="POST" enctype="multipart/form-data" action="{{route('article.store')}}">
    @csrf
    @method('POST')
    <div>
        <label>
            Заголовок
            <input type="text" name="title" required value="{{old('title')}}">
        </label>
        @error('title')<strong>{{ $message }}</strong>@enderror
    </div>
    <div>
        <label>
            Содержание
            <textarea name="content" required>
                {{old('content')}}
            </textarea>
        </label>
        @error('content')<strong>{{ $message }}</strong>@enderror
    </div>

    <button type="submit">Создать</button>



</form>
@endsection
