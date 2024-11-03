@extends('layouts/guest')

@section('content')
    <div>
        <h3>LOGIN PAGE</h3>
        <i>{{ session()->get('error') }}</i>
        <form action={{ route('login_action') }} method="POST">
            @csrf
            <input name="username" type="text">
            <input name="password" type="password">
            <button type="submit">LOGIN</button>
        </form>
    </div>
@endsection