@extends('layouts.app')
@section('content')
    <h1>{{$title}}</h1>
    {{-- check if there are items in the array --}}
    @if(count($services) > 0)
        <ul class="list-group">
            {{-- loop through each service --}}
            @foreach($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        </ul>
    @endif
@endsection
