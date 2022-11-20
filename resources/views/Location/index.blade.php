@extends('layouts.app')

@section('content')

    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-info" role="alert">
            {{ \Illuminate\Support\Facades\Session::get('success') }}
        </div>
    @endif

    <a href="{{route('location.create')}}" class="btn btn-success">{{__("New Location")}}</a>


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
                <td><a href="{{route('user.show', $location->user->id)}}">{{ $location->user->name }}</a></td>
                <td><a href="{{route('locations', ["ip" => $location->ip])}}">{{ $location->ip }}</a></td>
                <td>{{ $location->coord_x }}</td>
                <td>{{ $location->coord_y }}</td>
                <td>
                    <a href="{{route('location.edit', $location->id)}}" class="m-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-pencil" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </a>
                    <form id="delete-form" method="POST" action="{{route('location.delete', $location->id)}}"
                          style="display: inline-block">
                        @csrf
                        @method("DELETE")

                        <a class="m-1" onclick="document.getElementById('delete-form').submit()" style="cursor: pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
