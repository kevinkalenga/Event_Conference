<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\SponsorCategory;

class AdminSponsorController extends Controller
{
    public function index()
    {
      $sponsors = Sponsor::with('sponsor_category')->get();
      return view('admin.sponsor.index', compact('sponsors'));
    }

    
    public function create()
    {
      $sponsor_categories = SponsorCategory::orderBy('id', 'asc')->get();
       return view('admin.sponsor.create', compact('sponsor_categories'));
    }
    
    
    
  public function store(Request $request)
  {
    $request->validate([
        'name' => ['required'],
        'slug' => ['required', 'alpha_dash', 'unique:sponsors,slug'],
        'tagline' => ['required'],
        'description' => ['required'],
        'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        'featured_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
    ]);

    $sponsor = new Sponsor();

    // Logo
    if ($request->hasFile('logo')) {
        $logoName = 'sponsor_logo_' . time() . '_' . uniqid() . '.' . $request->logo->extension();
        $request->logo->move(public_path('uploads'), $logoName);
        $sponsor->logo = $logoName;
    } else {
        $sponsor->logo = 'default.png';
    }

    // Featured photo
    if ($request->hasFile('featured_photo')) {
        $photoName = 'featured_photo_' . time() . '_' . uniqid() . '.' . $request->featured_photo->extension();
        $request->featured_photo->move(public_path('uploads'), $photoName);
        $sponsor->featured_photo = $photoName;
    } else {
        $sponsor->featured_photo = 'default.png';
    }

    $sponsor->name = $request->name;
    $sponsor->slug = $request->slug;
    $sponsor->tagline = $request->tagline;
    $sponsor->description = $request->description;
    $sponsor->sponsor_category_id = $request->sponsor_category_id;
    $sponsor->address = $request->address;
    $sponsor->email = $request->email;
    $sponsor->phone = $request->phone;
    $sponsor->website = $request->website;
    $sponsor->facebook = $request->facebook;
    $sponsor->twitter = $request->twitter;
    $sponsor->linkedin = $request->linkedin;
    $sponsor->instagram = $request->instagram;
    $sponsor->map = $request->map;

    $sponsor->save();

    return redirect()
        ->route('admin_sponsor_index')
        ->with('success', 'Sponsor Created successfully!');
  }

}
