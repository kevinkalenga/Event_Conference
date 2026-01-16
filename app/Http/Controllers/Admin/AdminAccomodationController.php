<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accomodation;
use Illuminate\Validation\Rule;

class AdminAccomodationController extends Controller
{
    public function index()
    {
      $accomodations = Accomodation::get();
      return view('admin.accomodation.index', compact('accomodations'));
    }

    public function create()
    {
       return view('admin.accomodation.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => ['required'],
        'description' => ['required'],
        'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        
      ]);

      // Create speaker first
      $accomodation = new Accomodation();

    // Handle photo if uploaded
      if ($request->hasFile('photo')) {

        $final_name = 'accomodation_'.time().'.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $accomodation->photo = $final_name;

      } else {
        // Default or nullable photo
        $accomodation->photo = 'default.png'; // change if needed
      }

      // Assign fields
      $accomodation->name = $request->name;
      $accomodation->description = $request->description;
      $accomodation->address = $request->address;
      $accomodation->email = $request->email;
      $accomodation->phone = $request->phone;
      $accomodation->website = $request->website;

      $accomodation->save();

      return redirect()->route('admin_accomodation_index')->with('success','Accomodation Created successfully!');
    }


}
