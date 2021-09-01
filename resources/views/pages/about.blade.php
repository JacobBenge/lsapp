@extends('layouts.app')

@section('content')
{{-- equivalent to {{$title}}  --}}
    <h1><?php echo $title;?></h1>
    <p>This is the About page</p>
@endsection