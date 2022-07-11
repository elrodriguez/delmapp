<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogin;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function logout()
    {
        return redirect('login')->with(Auth::logout());
    }

    public function loginApi(UserLogin $request)
    {
        if (Auth::attempt(array('username' => $request->username, 'password' => $request->password), $request->rememberme)) {
            $user = User::find(Auth::id())->first();
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $url = @file_get_contents(asset('person/' . $user->person_id . '/' . $user->person_id . '.png'));
                if ($url) {
                    $avatar = url('person/' . $user->person_id . '/' . $user->person_id . '.png');
                } else {
                    $avatar = url('themes/smart-admin/img/demo/avatars/avatar-m.png');
                }
                $response = [
                    'user' => [
                        'name' => auth()->user()->name,
                        'email' => auth()->user()->email,
                        'avatar' => $avatar,
                        'role' => [
                            'name' => ($user->roles()->first()->name == null ? '' : $user->roles()->first()->name),
                            'rid' => ($user->first()->id == null ? '' : $user->roles()->first()->id)
                        ]
                    ],
                    'token' => $token
                ];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" => 'User does not exist'];
            return response($response, 422);
        }
    }
    public function logoutApi(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
