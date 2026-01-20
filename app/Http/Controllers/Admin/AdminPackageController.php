<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Validation\Rule;

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
