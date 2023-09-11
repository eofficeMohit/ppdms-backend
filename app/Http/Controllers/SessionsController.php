<?php

namespace App\Http\Controllers;

Use Str;
Use Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
try{

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        $credentials = $request->only('email', 'password');
        // dd(\Auth::attempt($credentials));

        if (\Auth::attempt($credentials)) {

            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            session()->regenerate();
            $user_id = auth()->user()->id;
            $data['user_id'] = $user_id;
            $data['last_login'] = date('Y-m-d H:i:s');
            $data['device_type'] = 'web';
            UserLogin::updateOrInsert(
                ['user_id' => $user_id],
                $data
            );
            return redirect()->intended('/dashboard')
                        ->withSuccess('Signed in to Dashboard.');
        }else{
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }
}catch(\Exception $e){
	return $e->getMessage();
}
        // return redirect("login")->withSuccess('Login details are not valid');
    }

    public function show(){
        request()->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            request()->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);

    }

    public function update(){

        request()->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            request()->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => ($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function destroy()
    {
        $user_id = auth()->user()->id;
        auth()->logout();
        $data['last_logout'] = date('Y-m-d H:i:s');
        UserLogin::updateOrInsert(
            ['user_id' => $user_id],
            $data
        );
        return redirect('/sign-in');
    }

}
