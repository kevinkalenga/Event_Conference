<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\SponsorCategory;
use Illuminate\Validation\Rule;

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


   public function edit($id)
   {
      $sponsor = Sponsor::where('id', $id)->first();
      $sponsor_categories = SponsorCategory::orderBy('id','asc')->get();
      return view('admin.sponsor.edit', compact('sponsor', 'sponsor_categories'));
   }

    public function update(Request $request, $id)
    {
        $sponsor = Sponsor::where('id', $id)->first();
      
       $request->validate([
        
        'name' => ['required'],
        'slug' => ['required', 'alpha_dash', 'regex:/^[a-zA-Z-]+$/', Rule::unique('sponsors')->ignore($id)],
        'tagline' => ['required'],
        'description' => ['required'],
        'email' => ['required', 'email', Rule::unique('sponsors')->ignore($id)],
        'phone' => ['required', Rule::unique('sponsors')->ignore($id)],
      ]);

       if ($request->hasFile('logo')) {
          $request->validate([
              'logo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($sponsor->logo &&
              !in_array($sponsor->logo, $defaultPhotos) &&
              file_exists(public_path('uploads/' . $sponsor->logo))) {

              unlink(public_path('uploads/' . $sponsor->logo));
          }

           // Nouvelle photo
           $final_name_logo = 'sponsor_' . time() . '.' . $request->logo->extension();
           $request->logo->move(public_path('uploads'), $final_name_logo);
           $sponsor->logo = $final_name_logo;
        }
       if ($request->hasFile('featured_photo')) {
          $request->validate([
              'featured_photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultFeatured_Photos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($sponsor->featured_photo &&
              !in_array($sponsor->featured_photo, $defaultFeatured_Photos) &&
              file_exists(public_path('uploads/' . $sponsor->featured_photo))) {

              unlink(public_path('uploads/' . $sponsor->featured_photo));
          }

           // Nouvelle photo
           $final_name_featured_photo = 'sponsor_featured_photo_' . time() . '.' . $request->featured_photo->extension();
           $request->featured_photo->move(public_path('uploads'), $final_name_featured_photo);
           $sponsor->featured_photo = $final_name_featured_photo;
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
    
       return redirect()->route('admin_sponsor_index')->with('success','Sponsor Updated successfully!');
    
    }
    
    
    
    public function delete($id) 
    {
         $sponsor = Sponsor::where('id', $id)->first();

         if ($sponsor->logo && file_exists(public_path('uploads/'.$sponsor->logo))) {
             unlink(public_path('uploads/'.$sponsor->logo));
         }

         if ($sponsor->featured_photo && file_exists(public_path('uploads/'.$sponsor->featured_photo))) {
             unlink(public_path('uploads/'.$sponsor->featured_photo));
         }

         $sponsor->delete();

         return redirect()->route('admin_sponsor_index')
                     ->with('success', 'Sponsor is Deleted Successfully');
    }

}
