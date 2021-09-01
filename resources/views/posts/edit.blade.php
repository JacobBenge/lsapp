@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {{-- Generates a form with method POST that submits to the action update on PostsController --}}
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST']) !!}
    {{-- Spoof a PUT request --}}
    {{ Form::hidden('_method', 'PUT') }}
    {{-- Title --}}
    <div class="form-group">
        {{-- Label for the input --}}
        {{ Form::label('title', 'Title') }}
        {{-- name of title with existing value. Class of form-control and placeholder title --}}
        {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    {{-- Body --}}
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{-- textarea with article-ckeditor id --}}
        {{ Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
    </div>
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    <a href="/posts/{{$post->id}}" class="btn btn-secondary">Cancel</a>
    {!! Form::close() !!}
@endsection
