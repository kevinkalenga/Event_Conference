<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use Hash;
use Auth;
use App\Models\User;
use App\Models\HomeBanner;
use App\Models\HomeWelcome;
use App\Models\HomeCounter;
use App\Models\Speaker;
use App\Models\ScheduleDay;

class FrontController extends Controller
{
    public function home()
    {
        $home_banner = HomeBanner::where('id', 1)->first();
        $home_welcome = HomeWelcome::where('id', 1)->first();
        $home_counter = HomeCounter::where('id', 1)->first();
        $speakers = Speaker::get()->take(4);
        return view('front.home', compact('home_banner', 'home_welcome', 'home_counter', 'speakers'));
    }
    
    public function schedule()
    {
        // relationship
        $schedule_days = ScheduleDay::with('schedules')->orderBy('order1', 'asc')->get();
        return view('front.schedule', compact('schedule_days'));
    }
    
    
    
    public function speaker($slug)
    {
      $speaker = Speaker::where('slug', $slug)->first();
      if(!$speaker) {
        return redirect()->route('speakers');
      }
      return view('front.speaker', compact('speaker'));
    }
    
    
    
    public function speakers()
    {
        $speakers = Speaker::get();
        return view('front.speakers', compact('speakers'));
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

    public function profile_submit(Request $request)
    {
        $user = User::where('id', Auth::guard('web')->user()->id)->first();
    
        $request->validate([
          'name' => "required",
          'email' => 'required|email|unique:users,email,' . Auth::id(),
          'phone' => "required|string|max:20",
          'country' => "required",
          'address' => "required",
          'state' => "required",
          'city' => "required",
          'zip' => "required|string|max:10",
        ]);

        if($request->photo) {
            $request->validate([
                'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            ]);

            if($user->photo != '' && file_exists(public_path('uploads/' . $user->photo))) {
               unlink(public_path('uploads/' . $user->photo));
            }


           $finale_name = 'user_'.time().'.'.$request->photo->extension();
           $request->photo->move(public_path('uploads'), $finale_name);
           $user->photo = $finale_name;
        } 

        if($request->password != '') {
           $request->validate([
               'password' => 'required',
               'retype_password' => 'required|same:password'
           ]);
           $user->password = bcrypt($request->password);
        }

         // Mise à jour des autres champs
         $user->name = $request->name;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->country = $request->country;
         $user->address = $request->address;
         $user->state = $request->state;
         $user->city = $request->city;
         $user->zip = $request->zip;

         $user->save();

         return redirect()->back()->with('success', 'Profile updated successfully!');
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


    public function reset_password($token,$email)
    {
        $user = User::where('email',$email)->where('token',$token)->first();
        if(!$user) {
            return redirect()->route('login')->with('error','Token or email is not correct');
        }
        return view('front.reset-password', compact('token','email'));
    }

    public function reset_password_submit(Request $request, $token, $email)
    {
        $request->validate([
            'password' => ['required'],
            'confirm_password' => ['required','same:password'],
        ]);

        $user = User::where('email',$request->email)->where('token',$request->token)->first();
        $user->password = Hash::make($request->password);
        $user->token = "";
        $user->update();

        return redirect()->route('login')->with('success','Password reset is successful. You can login now.');
    }



}
