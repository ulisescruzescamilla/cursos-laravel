<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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
        try {
            $user = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return $user;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            Log::error($th->getTraceAsString());
            return response()->json('Ups algo salió mal', 500);
        }
    }

    public function update(Request $request, User $user)
    {
        Log::debug(print_r($request->all(), true));
        try {
            $user = $user->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'password' => Hash::make($request->password),
            ]);
            return $user;
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            Log::error($th->getTraceAsString());
            return response()->json('Ups algo salió mal', 500);
        }
    }

    public function destroy(User $user)
    {
        return $user->delete();
    }
}
