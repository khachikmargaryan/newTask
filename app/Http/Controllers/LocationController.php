<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLocationRequest;
use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $ip     = $request->query('ip') ?? null;
        $userId = $request->get('user_id') ?? null;

        $locationsQuery = UserLocation::query()
            ->with('user');


        if ($ip) {
            $locationsQuery->where('ip', $ip);
        }

        if ($userId) {
            $locationsQuery->where('user_id', $userId);
        }

        $locations = $locationsQuery->get();

        return view('Location.index',
            [
                'locations' => $locations
            ]);
    }

    public function create($id = null)
    {
        return view('Location.create',
            [
                "users" => User::all()
            ]);
    }

    public function edit(UserLocation $location)
    {
        return view('Location.edit',
            [
                "location" => $location,
            ]);
    }

    public function store(UserLocationRequest $request)
    {
        $data     = $request->validated();
        $location = new UserLocation();

        $location->id      = Str::uuid()->toString();
        $location->user_id = auth()->id();
        $location->ip      = $data["ip"];
        $location->coord_x = $data["coord_x"];
        $location->coord_y = $data["coord_y"];

        $location->save();

        return redirect()->route('locations')->with('success', "Location Created");
    }


    public function update(UserLocationRequest $request, UserLocation $location)
    {
        $data = $request->validated();

        $location->user_id = auth()->id();
        $location->ip      = $data["ip"];
        $location->coord_x = $data["coord_x"];
        $location->coord_y = $data["coord_y"];

        $location->save();

        return redirect()->route('locations')->with('success', "Location Updated");
    }

    public function delete(UserLocation $location)
    {
        $location->delete();
        return redirect()->route('locations')->with('success', "Location Deleted");
    }
}
