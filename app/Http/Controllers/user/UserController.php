<?php

namespace App\Http\Controllers\user;

use App\Category;
use App\Mail\VerifyMail;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        $products = Product::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view("user.home")
            ->with('products', $products);
    }

    public function forgot_pass()
    {

        return view("user.forgotpass");
    }

    public function reset_pass($id, $token)
    {
        $checkUser = User::where('id', $id)->where('remember_token', $token)->first();
        if ($checkUser) {
            return view('user.resetPass')->with('user', User::findOrFail($id))->with('token', $token);
        } else {
            return redirect("login");
        }

    }



    public function post_Reset_pass(Request $request)
    {
        $rules = [
            'password' => 'required|min:8',
            're_password' => 'required|min:8|same:password'
        ];
        $messages = [
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
            $password = bcrypt($request->input('password'));
            $token = $request->input('token');
            $id = $request->input('id');
            $token = Str::random(60);
            $users = User::updateOrCreate([
                'id' => $id,
            ], [
                'remember_token' => $token,
                'password' => $password
            ]);

            if ($users) {
                return redirect("login");
            } else {
                $errors = new MessageBag(['errorlogin' => 'Error!']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }

    }

    public function postForgot_pass(Request $request)
    {
        $rules = [
            'email' => 'required|email'
        ];
        $messages = [
            'email.required' => 'You must enter your email',
            'email.email' => 'Email is not valid'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $user = User::where('email', $email)->where('status', '<>', 0)->first();
            if ($user) {
                if ($user->status == 0) {
                    $errors = new MessageBag(['errorlogin' => 'Email is incorrect']);
                    return redirect()->back()->withInput()->withErrors($errors);
                } elseif ($user->status == 2) {
                    $errors = new MessageBag(['errorlogin' => 'The account has been disabled']);
                    return redirect()->back()->withInput()->withErrors($errors);
                } elseif ($user->status == 1) {
                    $token = Str::random(60);
                    $users = User::updateOrCreate([
                        'email' => $email,
                    ], [
                        'remember_token' => $token,
                    ]);
                    if ($users) {
                        $id = $user->id;
                        $toEmail = $email;
//                        dd($toEmail);
                        Mail::to($toEmail)->send(new VerifyMail($token, $id));
//                        echo '<script>alert("Email has been sent ");<script>';
                        echo "<script>alert('Email has been sent " . $toEmail . "')</script>";
                        echo '<meta http-equiv="refresh" content="0;url=./">';
                    }
                }
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email is incorrect']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }

    public function login()
    {
        if (Auth::check()) {
            return view('user.home');
        } else {
            return view('user.login');

        }
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'You must enter your email',
            'email.email' => 'Email is not valid',
            'password.required' => 'You must enter your password',
            'password.min' => 'Password must contain at least 8 characters',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => '1'])) {
                return redirect()->intended('/');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Email or password is incorrect']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }


    public function info()
    {
        if (Auth::check()) {
            return view('user.info');
        } else {
            return view('user.login');

        }
    }

    public function changeInfo(Request $request){
        $rules = [
            'name' => 'required',
            'phone'=>'numeric'
        ];
        $messages = [
            'name.required' => 'You must enter your name',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            User::where('id', Auth::user()->id)
                ->update([
                    'name' => $request->name,
                    'address' =>$request->address,
                    'phone'=>$request->phone
                ]);
            Session::flash('success', 'Update successfully!');
            return redirect()->route('info');
        }
    }

    public function messages()
    {
        if (Auth::check()) {
            return view('user.messages');
        } else {
            return view('user.login');

        }
    }


    public function change_mail()
    {
        if (Auth::check()) {
            return view('user.change_mail');
        } else {
            return view('user.login');

        }
    }

    public function change_password()
    {
        if (Auth::check()) {
            return view('user.change_password');
        } else {
            return view('user.login');

        }
    }
}

