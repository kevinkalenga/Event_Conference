<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScheduleDay;
use App\Models\Schedule;

class AdminScheduleDayController extends Controller
{
    public function index()
    {
      $schedule_days = ScheduleDay::orderBy('order1', 'asc')->get();
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
      $schedule_day = ScheduleDay::where('id', $id)->first();
      return view('admin.schedule_day.edit', compact('schedule_day'));
    }
    public function update(Request $request, $id)
    {
        $schedule_day = ScheduleDay::where('id', $id)->first();
      
       $request->validate([
        
          
        'day' => ['required'],
        'date1' => ['required'],
        'order1' => ['required'],
      ]);

      

       $schedule_day->day = $request->day;
       $schedule_day->date1 = $request->date1;
       $schedule_day->order1 = $request->order1;

       $schedule_day->save();
    
       return redirect()->route('admin_schedule_day_index')->with('success','Schedule Day Updated successfully!');
    
    }
    
    
    
   public function delete($id) 
    {
         $check_schedule_day = Schedule::where('schedule_day_id', $id)->first();

         if($check_schedule_day) {
           return redirect()->route('admin_schedule_day_index')->with('error', 
           'You can not delete this schedule day, because it has one or more schedules!');
         }
      
      
         $schedule = ScheduleDay::where('id', $id)->first();

        

         $schedule->delete();

         return redirect()->route('admin_schedule_day_index')
                     ->with('success', 'Schedule Day is Deleted Successfully');
    }

}
