@extends('layouts/guest')

@section('content')
    <h3>{{ $title }}</h3>
    <div>
        <h3>a{{ $article->title }}</h3>
        <p>{{ $article->description }}</p>
        <i>{{ $article->tag }}</i>
    </div>
@endsection