<?php

namespace App\Http\Controllers;

use App\Http\Resources\userDetailResource;
use App\Http\Resources\userResource;
use App\Models\user;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $users = user::all();
        // return response()->json(['data'     => $users]);
        return userResource::collection($users);
    }

    public function detail($id)
    {
        $user = user::findorfail($id);
        return new userDetailResource($user);

    }
}
