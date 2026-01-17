<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Validation\Rule;

class AdminPhotoController extends Controller
{
    

    public function index()
    {
      $photos = Photo::get();
      return view('admin.photo_gallery.index', compact('photos'));
    }

    public function create()
    {
       return view('admin.photo_gallery.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
       
       
        
      ]);

      // Create speaker first
      $photo = new Photo();

    // Handle photo if uploaded
      if ($request->hasFile('photo')) {

        $final_name = 'photo_'.time().'.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $photo->photo = $final_name;

      } else {
        // Default or nullable photo
        $photo->photo = 'default.png'; // change if needed
      }

      // Assign fields
      $photo->caption = $request->caption;
  

      $photo->save();

      return redirect()->route('admin_photo_index')->with('success','Photo Created successfully!');
    }



    public function edit($id)
    {
      $photo = Photo::where('id', $id)->first();
      return view('admin.photo_gallery.edit', compact('photo'));
    }
    public function update(Request $request, $id)
    {
        $photoEdit = Photo::where('id', $id)->first();
      

       if ($request->hasFile('photo')) {
          $request->validate([
              'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($photoEdit->photo &&
              !in_array($photoEdit->photo, $defaultPhotos) &&
              file_exists(public_path('uploads/' . $photoEdit->photo))) {

              unlink(public_path('uploads/' . $photoEdit->photo));
          }

           // Nouvelle photo
           $final_name = 'photo_' . time() . '.' . $request->photo->extension();
           $request->photo->move(public_path('uploads'), $final_name);
           $photoEdit->photo = $final_name;
       }

       // Assign fields
      $photoEdit->caption = $request->caption;

       $photoEdit->save();
    
       return redirect()->route('admin_photo_index')->with('success','Photo Updated successfully!');
    
    }


    public function delete($id) 
    {
         $photoDelete = Photo::where('id', $id)->first();

         if ($photoDelete->photo && file_exists(public_path('uploads/'.$photoDelete->photo))) {
             unlink(public_path('uploads/'.$photoDelete->photo));
         }

         $photoDelete->delete();

         return redirect()->route('admin_photo_index')
                     ->with('success', 'Photo is Deleted Successfully');
    }
    



}
