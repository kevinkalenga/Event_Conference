<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Validation\Rule;
use App\Models\PackageFacility;
use App\Models\Ticket;

class AdminPackageController extends Controller
{
    
    public function index()
    {
      // relation(facilities)
        $packages = Package::with(['facilities' => function($query) {
            $query->orderBy('item_order','asc');
        }])
        ->orderBy('item_order','asc')->get();
        return view('admin.package.index', compact('packages'));
    }

    public function create()
    {
       return view('admin.package.create');
    }

    public function store(Request $request)
    {
      //  dd($request->facility);
      if($request->facility) 
      {
        $all_data_check = 0;
        foreach($request->facility as $value) {
          $arr_facility[] = $value;
          if($value == '') {
            $all_data_check = 1;
          }
        }
        foreach($request->status as $value) {
          $arr_status[] = $value;
        }
      
        foreach($request->order as $value) {
          $arr_order[] = $value;
          if($value == '') {
            $all_data_check = 1;
          }
        } 


         // Check if there is any duplicate value in this array: $arr_facility
         $duplicate_values = array_diff_assoc($arr_facility, array_unique($arr_facility));
         if(count($duplicate_values) > 0) {
             return redirect()->back()->with('error','Please remove duplicate facilities');
         }
         if($all_data_check == 1) {
             return redirect()->back()->with('error','Please fill up all the facilities data');
         }
      }

     
      // echo '<pre>';
      // print_r($arr_facility);
      // print_r($arr_status);
      // print_r($arr_order);

      //exit;
      
      
      
      
      $request->validate([
        'name' => ['required'],
        'price' => ['required', 'numeric'],
        'maximum_tickets' => ['required', 'numeric'],
        'item_order' => ['required', 'numeric'],
        
      ]);
      // Create speaker first
      $package = new Package();


      // Assign fields
      $package->name = $request->name;
      $package->price = $request->price;
      $package->maximum_tickets = $request->maximum_tickets;
      $package->item_order = $request->item_order;
      $package->save();

      for($i=0;$i<count($arr_facility);$i++) {
        $package_facility = new PackageFacility();
        $package_facility->package_id = $package->id;
        $package_facility->name = $arr_facility[$i];
        $package_facility->status = $arr_status[$i];
        $package_facility->item_order = $arr_order[$i];
        $package_facility->save();
      }

      return redirect()->route('admin_package_index')->with('success','Package Created successfully!');
    }



    public function edit($id)
    {
      $package = Package::where('id', $id)->first();
       $package_facilities = PackageFacility::orderBy('item_order','asc')->where('package_id',$id)->get();
        return view('admin.package.edit', compact('package', 'package_facilities'));
    }
    public function update(Request $request, $id)
    {
      if($request->facility) 
      {
        $all_data_check = 0;
        foreach($request->facility as $value) {
          $arr_facility[] = $value;
          if($value == '') {
            $all_data_check = 1;
          }
        }
        foreach($request->status as $value) {
          $arr_status[] = $value;
        }
      
        foreach($request->order as $value) {
          $arr_order[] = $value;
          if($value == '') {
            $all_data_check = 1;
          }
        }

         // Check if there is any duplicate value in this array: $arr_facility
         $duplicate_values = array_diff_assoc($arr_facility, array_unique($arr_facility));
         if(count($duplicate_values) > 0) {
             return redirect()->back()->with('error','Please remove duplicate facilities');
         }

         // Check if there is any duplicate value in the database
          $dup_check = 0;
          foreach($arr_facility as $value) {
              $temp_count = PackageFacility::where('package_id',$id)->where('name',$value)->first();
              if($temp_count) {
                  $dup_check = 1;
              }
          }

          if($dup_check == 1) {
            return redirect()->back()->with('error','Please remove duplicate facilities (DB)');
          }
          if($all_data_check == 1) {
            return redirect()->back()->with('error','Please fill up all the facilities data');
          }
      }
    
        
      $package = Package::where('id', $id)->first();
      
        // Assign fields
      $package->name = $request->name;
      $package->price = $request->price;
      $package->maximum_tickets = $request->maximum_tickets;
      $package->item_order = $request->item_order;

      $package->save();
    
      for($i=0;$i<count($arr_facility);$i++) {
        $package_facility = new PackageFacility();
        $package_facility->package_id = $package->id;
        $package_facility->name = $arr_facility[$i];
        $package_facility->status = $arr_status[$i];
        $package_facility->item_order = $arr_order[$i];
        $package_facility->save();
      }
       
       
       
       return redirect()->route('admin_package_index')->with('success','Package Updated successfully!');
    
    }


    public function delete($id) 
    {
        
        $package = Package::where('id', $id)->first();

        $package->delete();

        PackageFacility::where('package_id',$id)->delete();

         return redirect()->route('admin_package_index')
                     ->with('success', 'Package is Deleted Successfully');
    }
    

    public function facility_delete($id)
    {
        $package_facility = PackageFacility::where('id',$id)->first();
        $package_facility->delete();

        return redirect()->back()->with('success','Facility deleted successfully!');
    }

    public function facility_edit($id)
    {
        $package_facility = PackageFacility::where('id',$id)->first();
        return view('admin.package.edit_facility', compact('package_facility'));
    }

    public function facility_update(Request $request,$id)
    {
        $package_facility = PackageFacility::where('id',$id)->first();
        $request->validate([
            'name' => ['required'],
            'status' => ['required'],
            'item_order' => ['required','numeric'],
        ]);
        $package_facility->name = $request->name;
        $package_facility->status = $request->status;
        $package_facility->item_order = $request->item_order;
        $package_facility->save();

        return redirect()->route('admin_package_index')->with('success','Facility updated successfully!');
    }







}
