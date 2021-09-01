@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    {{-- Check for posts --}}
    @if(count($posts) > 0)
        {{-- Loop through posts --}}
        @foreach($posts as $post)
            <div class="card p-3 my-3">
                {{-- add title with hyperlink to show view --}}
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                {{-- https://www.php.net/manual/en/datetime.format.php --}}
                <small>Written on {{$post->created_at->format('n-j-Y')}}</small>
            </div>
        @endforeach
        {{-- Add pagination, requires paginate() in controller --}}
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection