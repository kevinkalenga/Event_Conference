<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\ScheduleDay;

class AdminScheduleController extends Controller
{
    public function index()
    {
      // relationship 
      $schedules = Schedule::with('schedule_day')->orderBy('item_order', 'asc')->get();
      return view('admin.schedule.index', compact('schedules'));
    }

    public function create()
    {
      $schedule_days = ScheduleDay::orderBy('order1', 'asc')->get();
       return view('admin.schedule.create', compact('schedule_days'));
    }
    
    
    
   public function store(Request $request)
   {
        // Create schedule
        $schedule = new Schedule();
    
      $request->validate([
        
        'name' => ['required'],
        'title' => ['required'],
        'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        'description' => ['required'],
        'location' => ['required'],
        'time' => ['required'],
        'item_order' => ['required', 'integer'],
        
      ]);

      if ($request->hasFile('photo')) {
          $request->validate([
              'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($schedule->photo &&
              !in_array($schedule->photo, $defaultPhotos) &&
              file_exists(public_path('uploads/' . $schedule->photo))) {

              unlink(public_path('uploads/' . $schedule->photo));
          }

           // Nouvelle photo
           $final_name = 'schedule_' . time() . '.' . $request->photo->extension();
           $request->photo->move(public_path('uploads'), $final_name);
           $schedule->photo = $final_name;
       } else {
            $schedule->photo = 'default.png';
       }

    

   

      // Assign fields
      $schedule->schedule_day_id = $request->schedule_day_id;
      $schedule->name = $request->name;
      $schedule->title = $request->title;
      $schedule->description = $request->description;
      $schedule->location = $request->location;
      $schedule->time = $request->time;
      $schedule->item_order = $request->item_order;
    


      $schedule->save();

      return redirect()->route('admin_schedule_index')->with('success','Schedule Created successfully!');
    }

    
    public function edit($id)
    {
      $schedule = Schedule::findOrFail($id);
      $schedule_days = ScheduleDay::orderBy('order1', 'asc')->get();

      return view('admin.schedule.edit', compact('schedule', 'schedule_days'));
    }

    
    // public function edit($id)
    // {
    //   $schedule_day = ScheduleDay::where('id', $id)->first();
    //   return view('admin.schedule_day.edit', compact('schedule_day'));
    // }
    
    public function update(Request $request, $id)
    {
        $schedule = Schedule::where('id', $id)->first();
      
       $request->validate([
          'name' => ['required'],
          'title' => ['required'],
          'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          'description' => ['required'],
          'location' => ['required'],
          'time' => ['required'],
          'item_order' => ['required', 'integer'],
      ]);


       if ($request->hasFile('photo')) {
          $request->validate([
              'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($schedule->photo &&
              !in_array($schedule->photo, $defaultPhotos) &&
              file_exists(public_path('uploads/' . $schedule->photo))) {

              unlink(public_path('uploads/' . $schedule->photo));
          }

           // Nouvelle photo
           $final_name = 'schedule_' . time() . '.' . $request->photo->extension();
           $request->photo->move(public_path('uploads'), $final_name);
           $schedule->photo = $final_name;
       }

      

       $schedule->schedule_day_id = $request->schedule_day_id;
       $schedule->name = $request->name;
       $schedule->title = $request->title;
       $schedule->description = $request->description;
       $schedule->location = $request->location;
       $schedule->time = $request->time;
       $schedule->item_order = $request->item_order;

       $schedule->save();
    
       return redirect()->route('admin_schedule_index')->with('success','Schedule Updated successfully!');
    
    }
    
    
    
    public function delete($id) 
    {
         $schedule = Schedule::where('id', $id)->first();

         if ($schedule->photo && file_exists(public_path('uploads/'.$schedule->photo))) {
             unlink(public_path('uploads/'.$schedule->photo));
         }

         $schedule->delete();

         return redirect()->route('admin_schedule_day_index')
                     ->with('success', 'Schedule Day is Deleted Successfully');
    }

}
