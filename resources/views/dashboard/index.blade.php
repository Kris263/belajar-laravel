@extends('layouts/isUSer')

@section('content')
<h3>{{ $title }}</h3>
<form action="{{ route('dashboard_logout') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $users->token }}">
    <button>Logout</button>
</form>
<hr>
<i>{{ session()->get('message')}}</i>
<div>
    <form action="{{ route('article_add_action') }}" method="POST">
        @csrf
        <input type="text" placeholder="judul" name="title">
        <input type="text" placeholder="deskripsi" name="description">
        <input type="text" placeholder="tag" name="tag">
        <button type="submit">Buat Artikel</button>
    </form>
</div>
<table border="1">
    <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>tag</th>
            <th>action</th>
        </tr>
        @foreach ($article as $artikel)
        <tr>            
                <td>{{ $artikel ->id }}</td>
                <td>{{ $artikel ->title }}</td>
                <td>{{ $artikel ->description }}</td>
                <td>{{ $artikel ->tag }}</td>
                <td>
                    <div>
                        <a href="">edit</a>
                        <form action="{{ route('article_delete_action') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $artikel->id}}">
                            <button type="submit">hapus</button>
                        </form>
                    </div>
                </td>
        </tr>
        @endforeach
    </table>
@endsection