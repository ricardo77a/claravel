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
        $user->password = bcrypt($request->password);
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
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::Find($id);
        if (is_null($user)) {
            return response(['error' => 'No se encontró al usuario'], 401);
        }
        $user->delete();
        return response()->json($user);
    }
}
