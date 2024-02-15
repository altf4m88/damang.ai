@extends('templates.index')

@section('title', 'Damang.ai')

@section('content')
    <div class="container mt-5">
        <ul class="user-list align-items-center">
            @foreach ($users as $user)
                <li class="user-list-item">
                    <a href="" class="text-decoration-none text-dark">
                        <img src="{{ asset('images/default.webp') }}" alt="Avatar" class="user-avatar">
                        <p>{{ $user->name }}</p>
                    </a>
                </li>
            @endforeach
            <li class="user-list-item">
                <a href="/users/create" class="btn btn-primary font-weight-bolder">
                    <h1>
                        +
                    </h1>
                </a>
            </li>
        </ul>
    </div>
@endsection