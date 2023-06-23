<?php

namespace App\Http\Controllers;


use App\Http\Resources\userDetailResource;
use App\Http\Resources\userResource;
use App\Models\user;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $user = user::where('email',$request->email)->first();

        if(! $user || Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' =>['The Provided credential are incorrect.'],
            ]);
        }

        return $user->createToken('Laravel')->plainTextToken;

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return "anda telah logout";
    }

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
