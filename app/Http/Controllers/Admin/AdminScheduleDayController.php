<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScheduleDay;

class AdminScheduleDayController extends Controller
{
    public function index()
    {
      $schedule_days = ScheduleDay::get();
      return view('admin.schedule_day.index', compact('schedule_days'));
    }

    public function create()
    {
       return view('admin.schedule_day.create');
    }
    
    
    
  public function store(Request $request)
  {
    $request->validate([
        
        
        'day' => ['required'],
        'date1' => ['required'],
        'order1' => ['required'],
        // to change the variable name in the error message
    ], [], [
      'day' => 'Day',
      'date1' => 'Date',
      'order1' => 'Order',
    ]);

    // Create schedule
    $schedule_day = new ScheduleDay();

   

    // Assign fields
    $schedule_day->day = $request->day;
    $schedule_day->date1 = $request->date1;
    $schedule_day->order1 = $request->order1;
    


    $schedule_day->save();

    return redirect()->route('admin_schedule_day_index')->with('success','Schedule Day Created successfully!');
  }

    
    
    public function edit($id)
    {
      $speaker = Speaker::where('id', $id)->first();
      return view('admin.speaker.edit', compact('speaker'));
    }
    public function update(Request $request, $id)
    {
        $speaker = Speaker::where('id', $id)->first();
      
       $request->validate([
        
        'name' => ['required'],
        'slug' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z-]+$/', Rule::unique('speakers')->ignore($id)],
        'designation' => ['required'],
        'email' => ['required', 'email', Rule::unique('speakers')->ignore($id)],
        'phone' => ['required', Rule::unique('speakers')->ignore($id)],
      ]);

       if ($request->hasFile('photo')) {
          $request->validate([
              'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($speaker->photo &&
              !in_array($speaker->photo, $defaultPhotos) &&
              file_exists(public_path('uploads/' . $speaker->photo))) {

              unlink(public_path('uploads/' . $speaker->photo));
          }

           // Nouvelle photo
           $final_name = 'speaker_' . time() . '.' . $request->photo->extension();
           $request->photo->move(public_path('uploads'), $final_name);
           $speaker->photo = $final_name;
       }

       $speaker->name = $request->name;
       $speaker->slug = $request->slug;
       $speaker->designation = $request->designation;
       $speaker->email = $request->email;
       $speaker->phone = $request->phone;
       $speaker->biography = $request->biography;
       $speaker->address = $request->address;
       $speaker->website = $request->website;
       $speaker->facebook = $request->facebook;
       $speaker->twitter = $request->twitter;
       $speaker->linkedin = $request->linkedin;
       $speaker->instagram = $request->instagram;

       $speaker->save();
    
       return redirect()->route('admin_speaker_index')->with('success','Speaker Updated successfully!');
    
    }
    
    
    
   public function delete($id) 
    {
         $speaker = Speaker::where('id', $id)->first();

         if ($speaker->photo && file_exists(public_path('uploads/'.$speaker->photo))) {
             unlink(public_path('uploads/'.$speaker->photo));
         }

         $speaker->delete();

         return redirect()->route('admin_speaker_index')
                     ->with('success', 'Speaker is Deleted Successfully');
    }

}
