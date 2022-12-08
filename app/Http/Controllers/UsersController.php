<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request) {
        // validations
        $usersCollection =  User::whereNotNull('name')->paginate(10);
        return UserResource::collection($usersCollection);
    }

    public function show(User $user) {
        return new UserResource($user);
        // return UserResource::collection($collection);
    }

    public function store(UserStoreRequest $request)
    {
        //
    }
}
