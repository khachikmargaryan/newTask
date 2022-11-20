<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->withCount('locations')
            ->get();

        return view('User.index',
            [
                'users' => $users
            ]);
    }

    public function create()
    {
        return view('User.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        User::query()
            ->create($data);

        return redirect()->route('users')->with('success', "User Created");
    }

    public function edit(User $user)
    {

        return view('User.edit', [
                'user' => $user
            ]);
    }

    public function show(User $user)
    {

        return view('User.show', [
                'user' => $user->load('locations')
            ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('users')->with('success', "User Updated");
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users')->with('success', "User Deleted");
    }

    public function locations(User $user)
    {
        return view("User.locations",
            [
                "locations" => $user->locations,
                "user"      => $user
            ]);
    }

    public function addLocation(User $user)
    {
        return view("Location.create",
            [
                "locations"      => $user->locations,
                "users"          => User::all()
            ]);
    }


}
