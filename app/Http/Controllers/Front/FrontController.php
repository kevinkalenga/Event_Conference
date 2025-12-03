<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use Hash;
use Auth;
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

         $verification_link = route('registration_verify', [ 'email' => $request->email,  'token' => $token]);
         $subject = "Registration Verification";
         $message = "To complete the registration, please click on the link below:<br>";
         $message .= "<a href='".$verification_link."'>Click Here</a>";

         \Mail::to($request->email)->send(new Websitemail($subject,$message));

         return redirect()->route('login')->with('success','Your registration is completed. Please check your email for verification. If you do not find the email in your inbox, please check your spam folder.');
    
    }

    public function registration_verify($email, $token)
    {
        $user = User::where('email',$email)->where('token', $token)->first();
        if(!$user) {
            return redirect()->route('login')->with('error', 'Invalid link');
        }
        $user->token = '';
        $user->status = 1;
        $user->save();

        return redirect()->route('login')->with('success', 'Your email is verified. You can login now.');
    }
    
    
    public function login()
    {
        return view('front.login');
    }
    
    public function login_submit(Request $request)
    {
       $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
       ]);

       $user = User::where('email', $request->email)->first();

       if (!$user) {
           return redirect()->route('login')->with('error', 'Email or password is incorrect!');
       }

       // Vérifier le mot de passe hashé
       if (!Hash::check($request->password, $user->password)) {
           return redirect()->route('login')->with('error', 'Email or password is incorrect!');
       }

    // Vérifier que l'utilisateur est activé
       if ((int)$user->status !== 1) {
           return redirect()->route('login')->with('error', 'Please verify your email before logging in.');
       }

       // Tout est ok -> connexion
       Auth::login($user);

       return redirect()->route('attendee_dashboard')->with('success', 'You are logged in successfully!');
    }


    public function logout()
    {
       Auth::guard('web')->logout();
       return redirect()->route('login')->with('success','Logout is successful!');
    }
    public function dashboard()
    {
       
       return view('attendee.dashboard');
    }
    public function profile()
    {
       
       return view('attendee.profile');
    }

    public function forget_password()
    {
        return view('front.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
            $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user) {
            return redirect()->back()->with('error','Email is not found');
        }
         
        // Generate a token
        $token = hash('sha256',time());
        $user->token = $token;
        $user->save();

        $reset_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = "Password Reset";
        $message = "To reset password, please click on the link below:<br>";
        $message .= "<a href='".$reset_link."'>Click Here</a>";

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success','We have sent a password reset link to your email. Please check your email. If you do not find the email in your inbox, please check your spam folder.');
    } 
}
