<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use Hash;
use App\Models\User;

class FrontController extends Controller
{
    public function home()
    {
        return view('front.home');
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function registration()
    {
        return view('front.registration');
    }
    
    public function registration_submit(Request $request) 
    {

         $request->validate([
           'name' => ['required'],
           'email' => ['required', 'email', 'unique:users'],
           'password' => ['required'],
           'confirm_password' => ['required','same:password'],
         ]);

         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
         $token = hash('sha256',time());
         $user->token = $token;
         $user->status = 0;
         $user->save();

         $verification_link = url('registration_verify/'.$token.'/'.$request->email);
         $subject = "Registration Verification";
         $message = "To complete the registration, please click on the link below:<br>";
         $message .= "<a href='".$verification_link."'>Click Here</a>";

         \Mail::to($request->email)->send(new Websitemail($subject,$message));

         return redirect()->back()->with('success','Your registration is completed. Please check your email for verification. If you do not find the email in your inbox, please check your spam folder.');
    
    }

    public function registration_verify($token,$email)
    {
        $user = User::where('token',$token)->where('email',$email)->first();
        if(!$user) {
            return redirect()->route('login');
        }
        $user->token = '';
        $user->status = 1;
        $user->update();

        return redirect()->route('login')->with('success', 'Your email is verified. You can login now.');
    }
    
    
    public function login()
    {
        return view('front.login');
    }
}
