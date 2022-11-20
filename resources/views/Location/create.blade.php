@extends('layouts.app')

@section('content')

    <form action="{{route('location.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">IP</label>
            <input
                type="text"
                class="form-control @error('ip') is-invalid @enderror"
                id="ip"
                name="ip"
                value="{{ old('IP') }}"
            >
            @error('ip')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Coord X</label>
            <input type="text"
                   class="form-control @error('coord_x') is-invalid @enderror"
                   id="exampleInputEmail1"
                   aria-describedby="coord_xHelp"
                   name="coord_x"
                   value="{{ old('coord_x') }}"
            >
            @error('coord_x')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div id="emailHelp" class="form-text">We'll never share this email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Coord Y</label>
            <input
                type="text"
                class="form-control @error('coord_y') is-invalid @enderror"
                id="exampleInputPassword1"
                name="coord_y"
                value="{{ old('coord_y') }}"
            >
            @error('coord_y')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
