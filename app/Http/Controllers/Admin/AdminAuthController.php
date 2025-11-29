<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Support\Str;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    
    public function login_submit(Request $request)
    {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $check = $request->all();
            $data = [
                'email' => $check['email'],
                'password' => $check['password']
            ];

            if(Auth::guard('admin')->attempt($data)) {
                return redirect()->route('admin_dashboard')->with('success', 'Login is successful!');
            } else {
                return redirect()->route('admin_login')->with('error','The information you entered is incorrect! Please try again!');
            }
    }
    
    public function logout()
    {
       Auth::guard('admin')->logout();
       return redirect()->route('admin_login')->with('success','Logout is successful!');
    }
    
    
    public function profile()
    {
        return view('admin.profile');
    }
    public function forget_password()
    {
        return view('admin.forget-password');
    }
    
    

    public function forget_password_submit(Request $request)
    {
         // Validation de l'email
         $request->validate([
             'email' => ['required', 'email'],
         ]);

         // Recherche admin
         $admin = Admin::where('email', $request->email)->first();

         if (!$admin) {
             return back()->with('error', 'Email is not found');
         }

         // Génération token sécurisé
         $token = Str::random(64);
         $admin->update(['token' => $token]);

         // Génération du lien
         $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);

         // Préparation message
         $subject = "Password Reset";
         $message = "To reset your password, click the link below:<br>";
         $message .= "<a href='".$reset_link."'>Reset Password</a>";

         // Envoi email
         \Mail::to($request->email)->send(new Websitemail($subject, $message));

         return back()->with('success',
             'We have sent a password reset link to your email. If not found, check your spam folder.'
         );
    }
    

    public function reset_password($token,$email)
    {
        $admin = Admin::where('email',$email)->where('token',$token)->first();
        if(!$admin) {
            return redirect()->route('admin_login')->with('error','Token or email is not correct');
        }
        return view('admin.reset-password', compact('token','email'));
    }

    public function reset_password_submit(Request $request, $token, $email)
    {
      $request->validate([
        'password' => ['required'],
        'confirm_password' => ['required','same:password'],
      ]);

      $admin = Admin::where('email',$request->email)->where('token',$request->token)->first();
      $admin->password = Hash::make($request->password);
      $admin->token = "";
      $admin->update();

      return redirect()->route('admin_login')->with('success','Password reset is successful. You can login now.');
    }

    
}
