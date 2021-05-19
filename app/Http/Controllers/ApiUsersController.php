<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ApiUsersRequest;

class ApiUsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        return response()->json($users);
    }

    public function store(ApiUsersRequest $request)
    {
        $user = new User($request->all());
        $user->save();
        return response($user);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();
        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json($user);
    }
}
