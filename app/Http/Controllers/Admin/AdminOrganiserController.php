<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organiser;
use Illuminate\Validation\Rule;
class AdminOrganiserController extends Controller
{
    public function index()
    {
      $organisers = Organiser::get();
      return view('admin.organiser.index', compact('organisers'));
    }

    public function create()
    {
       return view('admin.organiser.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        'name' => ['required'],
        'slug' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z-]+$/', 'unique:organisers'],
        'designation' => ['required'],
        
      ]);

      // Create speaker first
      $organiser = new Organiser();

    // Handle photo if uploaded
      if ($request->hasFile('photo')) {

        $final_name = 'organiser_'.time().'.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $organiser->photo = $final_name;

      } else {
        // Default or nullable photo
        $organiser->photo = 'default.png'; // change if needed
      }

      // Assign fields
      $organiser->name = $request->name;
      $organiser->slug = $request->slug;
      $organiser->designation = $request->designation;
      $organiser->email = $request->email;
      $organiser->phone = $request->phone;
      $organiser->biography = $request->biography;
      $organiser->address = $request->address;
      $organiser->facebook = $request->facebook;
      $organiser->twitter = $request->twitter;
      $organiser->linkedin = $request->linkedin;
      $organiser->instagram = $request->instagram;

      $organiser->save();

      return redirect()->route('admin_organiser_index')->with('success','Organiser Created successfully!');
    }



    public function edit($id)
    {
      $organiser = Organiser::where('id', $id)->first();
      return view('admin.organiser.edit', compact('organiser'));
    }
    public function update(Request $request, $id)
    {
        $organiser = Organiser::where('id', $id)->first();
      
       $request->validate([
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        'name' => ['required'],
        'slug' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z-]+$/', Rule::unique('organisers')->ignore($id)],
        'designation' => ['required'],
      
      ]);

       if ($request->hasFile('photo')) {
          $request->validate([
              'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($organiser->photo &&
              !in_array($organiser->photo, $defaultPhotos) &&
              file_exists(public_path('uploads/' . $organiser->photo))) {

              unlink(public_path('uploads/' . $organiser->photo));
          }

           // Nouvelle photo
           $final_name = 'organiser_' . time() . '.' . $request->photo->extension();
           $request->photo->move(public_path('uploads'), $final_name);
           $organiser->photo = $final_name;
       }

       $organiser->name = $request->name;
       $organiser->slug = $request->slug;
       $organiser->designation = $request->designation;
       $organiser->email = $request->email;
       $organiser->phone = $request->phone;
       $organiser->biography = $request->biography;
       $organiser->address = $request->address;
       $organiser->facebook = $request->facebook;
       $organiser->twitter = $request->twitter;
       $organiser->linkedin = $request->linkedin;
       $organiser->instagram = $request->instagram;

       $organiser->save();
    
       return redirect()->route('admin_organiser_index')->with('success','Organiser Updated successfully!');
    
    }


    public function delete($id) 
    {
         $organiser = Organiser::where('id', $id)->first();

         if ($organiser->photo && file_exists(public_path('uploads/'.$organiser->photo))) {
             unlink(public_path('uploads/'.$organiser->photo));
         }

         $organiser->delete();

         return redirect()->route('admin_organiser_index')
                     ->with('success', 'Organiser is Deleted Successfully');
    }
    

    
}
