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
use Uuid;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    //  dd($request);
        $credentials = $request->only('email', 'password');
        if(\Auth::attempt($credentials)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            session()->regenerate();
            $user_id = auth()->user()->id;
            $data['user_id'] = $user_id;
            $data['ip_address'] =trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
            $data['device_id'] =  \Uuid::generate()->string;
            $data['device_token'] =  \Uuid::generate()->string;
            $data['last_login'] = date('Y-m-d H:i:s');
            $data['device_type'] = 'web';
            $data['status'] = 1;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            UserLogin::Insert([$data]);
            return redirect()->intended('/dashboard')
                        ->withSuccess('Signed in to Dashboard.');
        }else{
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
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
        $data['status'] = 0;
        $data['updated_at'] = now();
        $data['last_logout'] = date('Y-m-d H:i:s');
        UserLogin::where('user_id',$user_id)->orderBy('id','desc')->first()->update($data);

        // UserLogin::updateOrInsert(
        //     ['user_id' => $user_id],
        //     $data
        // );
        return redirect('/sign-in');
    }

}
