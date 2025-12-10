<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;

class AdminSpeakerController extends Controller
{
    public function index()
    {
      $speakers = Speaker::get();
      return view('admin.speaker.index', compact('speakers'));
    }

    public function create()
    {
       return view('admin.speaker.create');
    }
    
    
    
  public function store(Request $request)
  {
    $request->validate([
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        'name' => ['required'],
        'slug' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z-]+$/', 'unique:speakers'],
        'designation' => ['required'],
        'email' => ['required', 'email', 'unique:speakers'],
        'phone' => ['required', 'unique:speakers'],
    ]);

    // Create speaker first
    $speaker = new Speaker();

    // Handle photo if uploaded
    if ($request->hasFile('photo')) {

        $final_name = 'speaker_' . time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $speaker->photo = $final_name;

    } else {
        // Default or nullable photo
        $speaker->photo = 'default.png'; // change if needed
    }

    // Assign fields
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

    return redirect()->route('admin_speaker_index')->with('success','Speaker Created successfully!');
  }

    
    
    
    
    
    
    public function edit()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
}
