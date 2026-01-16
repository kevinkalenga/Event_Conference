<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeWelcome;

class AdminHomeWelcomeController extends Controller
{
    public function index() 
    {
        $home_welcome = HomeWelcome::where('id', 1)->first();
        
        return view('admin.home_welcome.index', compact('home_welcome'));
    }
    

    public function update(Request $request) 
    {
      $request->validate([
        'heading' => ['required'],
        'description' => ['required'],
      ]);

      $home_welcome = HomeWelcome::where('id', 1)->first();

        if ($request->hasFile('photo')) {
          $request->validate([
              'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($home_welcome->photo &&
              !in_array($home_welcome->photo, $defaultPhotos) &&
              file_exists(public_path('uploads/' . $home_welcome->photo))) {

              unlink(public_path('uploads/' . $home_welcome->photo));
          }

           // Nouvelle photo
           $final_name = 'home_welcome_' . time() . '.' . $request->photo->extension();
           $request->photo->move(public_path('uploads'), $final_name);
           $home_welcome->photo = $final_name;
        }

       $home_welcome->heading = $request->heading;
       $home_welcome->description = $request->description;
       $home_welcome->button_text = $request->button_text;
       $home_welcome->button_link = $request->button_link;
       $home_welcome->status = $request->status;
       $home_welcome->save();

       return redirect()->back()->with('success','Home Welcome is updated!');
    }

}
