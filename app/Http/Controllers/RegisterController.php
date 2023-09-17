<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserLogin;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(){

        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
        ]);

        $user = User::create($attributes);
        auth()->login($user);
        $user_id = auth()->user()->id;
            $data['user_id'] = $user_id;
            $data['last_login'] = date('Y-m-d H:i:s');
            $data['device_type'] = 'web';
            UserLogin::updateOrInsert(
                ['user_id' => $user_id],
                $data
            );
        return redirect('/dashboard');
    } 
}
