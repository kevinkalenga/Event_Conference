<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Validation\Rule;

class AdminTestimonialController extends Controller
{
    public function index()
    {
      $testimonials = Testimonial::get();
      return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
       return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => ['required'],
        'designation' => ['required'],
        'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        'comment' => ['required'],
        
        
      ]);

      // Create speaker first
      $testimonial = new Testimonial();

    // Handle photo if uploaded
      if ($request->hasFile('photo')) {

        $final_name = 'testimonial_'.time().'.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $testimonial->photo = $final_name;

      } else {
        // Default or nullable photo
        $testimonial->photo = 'default.png'; // change if needed
      }

      // Assign fields
      $testimonial->name = $request->name;
      $testimonial->designation = $request->designation;
      $testimonial->comment = $request->comment;
   

      $testimonial->save();

      return redirect()->route('admin_testimonial_index')->with('success','Testimonial Created successfully!');
    }



    public function edit($id)
    {
      $testimonial = Testimonial::where('id', $id)->first();
      return view('admin.testimonial.edit', compact('testimonial'));
    }
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::where('id', $id)->first();
      
       $request->validate([
        'name' => ['required'],
        'designation' => ['required'],
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        'comment' => ['required'],
        
        
      ]);

       if ($request->hasFile('photo')) {
          $request->validate([
              'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($testimonial->photo &&
              !in_array($testimonial->photo, $defaultPhotos) &&
              file_exists(public_path('uploads/' . $testimonial->photo))) {

              unlink(public_path('uploads/' . $testimonial->photo));
          }

           // Nouvelle photo
           $final_name = 'testimonial_' . time() . '.' . $request->photo->extension();
           $request->photo->move(public_path('uploads'), $final_name);
           $testimonial->photo = $final_name;
       }
       
          // Assign fields
       $testimonial->name = $request->name;
       $testimonial->designation = $request->designation;
       $testimonial->comment = $request->comment;

       $testimonial->save();
    
       return redirect()->route('admin_testimonial_index')->with('success','Testimonial Updated successfully!');
    
    }


    public function delete($id) 
    {
         $testimonial = Testimonial::where('id', $id)->first();

         if ($testimonial->photo && file_exists(public_path('uploads/'.$testimonial->photo))) {
             unlink(public_path('uploads/'.$testimonial->photo));
         }

         $testimonial->delete();

         return redirect()->route('admin_testimonial_index')
                     ->with('success', 'Testimonial is Deleted Successfully');
    }
    

}
