@extends('layouts/guest')

@section('content')
    <h3>{{ $title }}</h3>
    <div>
        @foreach ($artikel as $artikels)
            <div>
                <h3><a href="/article/{{ $artikels->id }}">{{ $artikels->title }}</a></h3>
            </div>
            <hr>
        @endforeach
    </div>
@endsection