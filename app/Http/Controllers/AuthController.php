<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function register(){
        return view('Auth.register');
    }

    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        $user=new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();  
        return redirect('/login');
    }

    public function login()
    {
        return view('Auth.login');
    }

    public function loginpost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid email or password');
        }
        session(['user_id' => $user->id]);
        return redirect('/');
    }

    public function logout(){
        session()->forget('user_id');
        return redirect('/allproducts');
    }

    public function forgetpassword(){
        return view('Auth.resetpassword');
    }

    public function sendemail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(60);
        User::where('email', $request->email)->update(['remember_token' => $token]);

        $resetLink = route('resetwithemail', ['token' => $token]);

        $success = Mail::raw('To reset your password, click on the following link: ' . $resetLink, function ($message) use ($request) {
            $message->to($request->email)
                   ->subject('Password Reset Link');
        });

        if ($success) {
            return back()->with('status', 'Password reset link sent.');
        } else {
            return back()->withErrors(['email' => 'Failed to send reset link.']);
        }
    }
    public function reset($token){
        return view('Auth.resetpass',compact('token'));
    }
    public function addpassword(Request $request){
        $request->validate([
            'password' => 'required',
            'token' => 'required',
        ]);
        User::where('remember_token', $request->token)->update([
            'password' => Hash::make($request->password),
            'remember_token' => null,
        ]);
        
        // $user = User::where('remember_token', $token)->first();

        // if (!$user) {
        //     return redirect('/login')->with('error', 'Invalid reset token.');
        // }
       
        // $user->password = Hash::make($request->password);
        // $user->remember_token = null; 
        // $user->save();
        return redirect('/login')->with('status', 'Your password has been reset successfully. Please log in with your new password.');
    }
        

    
}
