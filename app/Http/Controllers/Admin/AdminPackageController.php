<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Validation\Rule;
use App\Models\PackageFacility;

class AdminPackageController extends Controller
{
    
    public function index()
    {
      $packages = Package::orderBy('item_order', 'asc')->get();
      return view('admin.package.index', compact('packages'));
    }

    public function create()
    {
       return view('admin.package.create');
    }

    public function store(Request $request)
    {
      //  dd($request->facility);
      
      foreach($request->facility as $value) {
        $arr_facility[] = $value;
      }
      foreach($request->status as $value) {
        $arr_status[] = $value;
      }
      
      foreach($request->order as $value) {
        $arr_order[] = $value;
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
      return view('admin.package.edit', compact('package'));
    }
    public function update(Request $request, $id)
    {
        $package = Package::where('id', $id)->first();
      
         // Assign fields
        $package->name = $request->name;
        $package->price = $request->price;
        $package->maximum_tickets = $request->maximum_tickets;
        $package->item_order = $request->item_order;

       $package->save();
    
       return redirect()->route('admin_package_index')->with('success','Package Updated successfully!');
    
    }


    public function delete($id) 
    {
         $package = Package::where('id', $id)->first();

         $package->delete();

         return redirect()->route('admin_package_index')
                     ->with('success', 'Package is Deleted Successfully');
    }
    









}
