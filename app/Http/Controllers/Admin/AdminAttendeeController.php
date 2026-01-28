<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class AdminAttendeeController extends Controller
{
    public function index()
    {
        $attendees = User::get();
        return view('admin.attendees.index', compact('attendees'));
    }

    public function create()
    {
       return view('admin.attendees.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        'name' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required'],
        'confirm_password' => ['required', 'same:password'],
      
        
      ]);

      // Create speaker first
      $attendee = new User();

    // Handle photo if uploaded
      if ($request->hasFile('photo')) {

        $final_name = 'attendee_'.time().'.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $attendee->photo = $final_name;

      } else {
        // Default or nullable photo
        $attendee->photo = 'default.png'; // change if needed
      }

      // Assign fields
      $attendee->name = $request->name;
      $attendee->email = $request->email;
      $attendee->password = bcrypt($request->password);
      $attendee->phone = $request->phone;
      $attendee->address = $request->address;
      $attendee->country = $request->country;
      $attendee->state = $request->state;
      $attendee->city = $request->city;
      $attendee->zip = $request->zip;
      $attendee->token = '';
      $attendee->status = 1;
      $attendee->save();

      return redirect()->route('admin_attendee_index')->with('success','Attendee Created successfully!');
    }



    public function edit($id)
    {
      $attendee = User::where('id', $id)->first();
      return view('admin.attendees.edit', compact('attendee'));
    }
    public function update(Request $request, $id)
    {
        $attendee = User::where('id', $id)->first();
      
       $request->validate([
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        'name' => ['required'],
        'email' => ['required', 'email', Rule::unique('users')->ignore($attendee->id)],
        
      
      ]);

       if ($request->hasFile('photo')) {
          $request->validate([
              'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($attendee->photo &&
              !in_array($attendee->photo, $defaultPhotos) &&
              file_exists(public_path('uploads/' . $attendee->photo))) {

              unlink(public_path('uploads/' . $attendee->photo));
          }

           // Nouvelle photo
           $final_name = 'attendee_' . time() . '.' . $request->photo->extension();
           $request->photo->move(public_path('uploads'), $final_name);
           $attendee->photo = $final_name;
       }

         if($request->password) {
                $request->validate([
                    'password'=>'required',
                    'confirm_password'=>'required|same:password',
                ]);
                
             $attendee->password = bcrypt($request->password);;
          }

        $attendee->name = $request->name;
        $attendee->email = $request->email;
        $attendee->photo = $final_name;
        $attendee->phone = $request->phone;
        $attendee->address = $request->address;
        $attendee->country = $request->country;
        $attendee->state = $request->state;
        $attendee->city = $request->city;
        $attendee->zip = $request->zip;
        $attendee->token = '';
        $attendee->status = 1;
        $attendee->save();
    
       return redirect()->route('admin_attendee_index')->with('success','Attendee Updated successfully!');
    
    }


    public function delete($id) 
    {
         $attendee = User::where('id', $id)->first();

         if ($attendee->photo && file_exists(public_path('uploads/'.$attendee->photo))) {
             unlink(public_path('uploads/'.$attendee->photo));
         }

         $attendee->delete();

         return redirect()->route('admin_attendee_index')
                     ->with('success', 'Attendee is Deleted Successfully');
    }
    













}
