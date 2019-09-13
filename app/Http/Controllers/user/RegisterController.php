<?php

namespace App\Http\Controllers\user;


use App\Mail\VerifyMailRegister;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            return view('user.info');
        } else {
            return view("user.register");
        }

    }

    public function verify_email(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        $user= User::where('email', $email)->where('remember_token',$token)->first();
        if($user){
            $users= User::find($user->id);
            $users->remember_token=Str::random(60);
            $users->status=1;
            $users->save();
        }else{
//            echo "<script>alert('Validation expired!')</script>";
            return redirect('verify_email');
//            echo '<meta http-equiv="refresh" content="0;url=../">';

        }
    }

    public function post_Register(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
            're_password' => 'required|min:8|same:password'
        ];
        $messages = [
            'name.required' => 'You must enter your name',
            'name.min' => 'Name must contain at least 3 characters',
            'email.required' => 'You must enter your email',
            'email.email' => 'Email is not valid',
            'password.required' => 'You must enter your password',
            'password.min' => 'Password must contain at least 8 characters',
            're_password.required' => 'You must enter confirm your password',
            're_password.min' => 'Password must contain at least 8 characters',
            're_password.same' => 'The password is not the same!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = bcrypt($request->input('password'));
            $token = Str::random(60);

            $users = User::where('email', $email)->get();

            if (count($users) == 0) {
                $user = new User;
                $user->name = $name;
                $user->email = $email;
                $user->password = $password;
                $user->status = 2;
                $user->remember_token = $token;
                $user->save();
                Mail::to($email)->send(new VerifyMailRegister($email, $token));
                echo "<script>alert('Email has been sent " . $email . ". Please check your inbox and confirm.')</script>";
                echo '<meta http-equiv="refresh" content="0;url=./">';
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email already exists']);
                return redirect()->back()->withInput()->withErrors($errors);
            }

        }

    }
}
