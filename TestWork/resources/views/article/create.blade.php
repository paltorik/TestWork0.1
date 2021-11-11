@extends('layouts.app')

@section('content')


    <div class="uk-container uk-container-large uk-margin-large-top">
        <form class="uk-form-stacked uk-margin-large-bottom" name="create_article" method="POST" enctype="multipart/form-data" action="{{route('article.store')}}">
            @csrf
            @method('POST')


            <div class="uk-margin">
                <label class="uk-form-label" for="title">Заголовок</label>
                <div class="uk-form-controls">
                    <input name="title" class="uk-input @error('title') is-invalid @enderror" id="form_name" type="text" value="{{  old('title') }}" required>
                </div>
                @error('title')<span class="uk-text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="content">Содержание</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Textarea" required>{{  old('content') }}</textarea>
                </div>
                @error('content')<span class="uk-text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <a class="uk-button uk-button-primary" href="{{route('article.index')}}">Отмена</a>
            <button class="uk-button uk-button-default" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
