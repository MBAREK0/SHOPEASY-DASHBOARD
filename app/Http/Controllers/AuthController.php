<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\MyvalidateController;
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

      $check= new MyvalidateController($request);
     $result=$check->myValidate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if($result !== 'secces'){
    return  back()->withErrors($result); 

}

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
        $check= new MyvalidateController($request);

     $result=$check->myValidate([
            'email' => 'required',
            'password' => 'required',
        ]);
    if($result !== 'secces'){
        return  back()->withErrors($result); 
      }
      

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid email or password');
        }
        session(['user_id' => $user->id]);
        session(['user_role' => $user->id_role]);
        return redirect('/');
    }

    public function logout(){
        session()->forget('user_id');
        session()->forget('user_role');
        return redirect('/login');
    }

    public function forgetpassword(){
        return view('Auth.resetpassword');
    }

    public function sendemail(Request $request)
{
     $check= new MyvalidateController($request);
     $result=$check->myValidate([
        'email' => 'required',
    ]);
    if($result !== 'secces'){
    return  back()->withErrors($result); 
        }
       $checkIfExist = User::where('email', $request->email)->count();

       if(!$checkIfExist ){
        return back()->withErrors(['fatal' => 'account '.$request->email.' not found pleas sign up ']); 
       }
    $token = Str::random(60);
    User::where('email', $request->email)->update(['remember_token' => $token]);

    $resetLink = route('resetwithemail', ['token' => $token]);
    // $resetLink = '/resetwithemail/{token}';

    $to = $request->email;
    $subject = 'Password Reset Link';

    // Sending email
    $success = Mail::send('mail.index', ['resetLink' => $resetLink], function ($message) use ($to, $subject) {
         $message->from('elaadraouimbarek2023@gmail.com', 'Adidas');
        $message->to($to)
                ->subject($subject);
   
    });

    if ($success) {
        return back()->with('success', 'check your email for geting the link of reset password');
    } else {
        return back()->withErrors(['fatal' => 'Failed to send reset link.']);
    }
}

    public function reset($token){
        return view('Auth.resetpass',compact('token'));
    }
    public function addpassword(Request $request){

                $check= new MyvalidateController($request);

     $result=$check->myValidate([
            'password' => 'required',
            'token' => 'required',
        ]);
        if($result !== 'secces'){
    return  back()->withErrors($result); 

}
        User::where('remember_token', $request->token)->update([
            'password' => Hash::make($request->password),
            'remember_token' => null,
        ]);
        
        return redirect('/login')->with('status', 'Your password has been reset successfully. Please log in with your new password.');
    }
        

    
}
