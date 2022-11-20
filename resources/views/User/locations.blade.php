@extends('layouts.app')

@section('content')


    <a href="{{route('user.location.create', $user->id)}}" class="btn btn-success">{{__("New Location")}}</a>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">{{__("ID")}}</th>
            <th scope="col">{{__("User")}}</th>
            <th scope="col">{{__("IP")}}</th>
            <th scope="col">{{__("Coord X")}}</th>
            <th scope="col">{{__("Coord Y")}}</th>
            <th scope="col">{{__("Actions")}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($locations as $location)
            <tr>
                <th scope="row">{{$location->id}}</th>
                <td>{{ $location->user->name }}</td>
                <td>{{ $location->ip }}</td>
                <td>{{ $location->coord_x }}</td>
                <td>{{ $location->coord_y }}</td>
                <td>
                    <a href="{{route('user.locations', $user->id)}}">
                        {{$user->locations_count}}
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
