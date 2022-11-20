@extends('layouts.app')

@section('content')

    <form action="{{route('user.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                value="{{ old('name') }}"
            >
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   id="exampleInputEmail1"
                   aria-describedby="emailHelp"
                   name="email"
                   value="{{ old('email') }}"
            >
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div id="emailHelp" class="form-text">We'll never share this email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="exampleInputPassword1"
                name="password"
                value="{{ old('password') }}"
            >
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
