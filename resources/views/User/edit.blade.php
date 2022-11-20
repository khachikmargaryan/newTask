@extends('layouts.app')

@section('content')

    <form action="{{route('user.update', $user->id)}}" method="POST">
        @csrf
@method("PUT")
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                value="{{ $user->name }}"
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
                   value="{{ $user->email }}"
            >
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div id="emailHelp" class="form-text">We'll never share this email with anyone else.</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
