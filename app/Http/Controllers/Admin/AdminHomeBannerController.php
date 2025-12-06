<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBanner;

class AdminHomeBannerController extends Controller
{
    public function index() 
    {
        $home_banner = HomeBanner::where('id', 1)->first();
        
        return view('admin.home_banner.index', compact('home_banner'));
    }
    public function update(Request $request) 
    {
        
        $request->validate([
                'heading' => ['required'],
                'subheading' => ['required'],
                'event_date' => ['required'],
                'event_time' => ['required'],
            ]);

            $home_banner = HomeBanner::where('id', 1)->first();
            
            if ($request->hasFile('background')) {
                 $request->validate([
                     'background' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
                 ]);

                 // Supprime l'ancienne photo seulement si ce n'est pas une photo par défaut
                 $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];
                 if ($home_banner->background && !in_array($home_banner->background, $defaultPhotos) && file_exists(public_path('uploads/' . $home_banner->background))) {
                     unlink(public_path('uploads/' .$home_banner->background));
                 }

                 // Sauvegarde la nouvelle photo
                 $final_name = 'home_banner_' . time() . '.' . $request->background->extension();
                 $request->background->move(public_path('uploads'), $final_name);
                 $home_banner->background = $final_name;
            }
            
            
            $home_banner->heading = $request->heading;
            $home_banner->subheading = $request->subheading;
            $home_banner->text = $request->text;
            $home_banner->event_date = $request->event_date;
            $home_banner->event_time = $request->event_time;
            $home_banner->save();

          

            return redirect()->back()->with('success','Home Banner is updated!');
    
    
    
    
    
    
    
    
    
    }
}
