{{-- Flash a message if a message exists --}}
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

{{-- Flash a message if session successful --}}
@if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
@endif

{{-- Flash a message if session unsuccessful --}}
@if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
@endif