@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-secondary mb-5">Go Back</a>
    <h1>{{ $post->title }}</h1>
    <div>
        {!! $post->body !!}
    </div>
    <hr>
    {{-- https://www.php.net/manual/en/datetime.format.php --}}
    <small>Written on {{ $post->created_at->format('n-j-Y') }}</small>
    <hr>
    <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
    {{-- Delete Button --}}
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
    {{-- Spoof Delete request --}}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
    {!! Form::close() !!}
@endsection
