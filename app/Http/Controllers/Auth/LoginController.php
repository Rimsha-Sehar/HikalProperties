<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $archive = User::where('email', $input['email'])->first();
        $recaptcha_status = get_settings('recaptcha_status');

        if ($archive) {

            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
                if (auth()->user()->hasRole('lead')) {
                    session(['login' => 'lead']);
                    // return redirect()->route('customerAppointmentList',1)->with('message', 'Welcome back, '.auth()->user()->name);
                    return redirect('/')->with('success', 'Login Sussfully');
                }
            } else {
                return redirect('/login')->with('error', 'Please provide correct credentials');
            }
        } else {
            return redirect('/login')->with('error', 'Please provide correct credentials');
        }
    }
}
