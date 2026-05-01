<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSettingController extends Controller
{
    public function logo()
    {
        $setting = Setting::where('id', 1)->first();
        return view('admin.setting.logo', compact('setting'));
    }
    public function logo_submit(Request $request)
    {
        $setting = Setting::where('id', 1)->first();
         
        $request->validate([
            'logo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
           
        ]);

      

        // Handle photo if uploaded
        if ($request->hasFile('logo')) {

            $final_name = 'logo_'.time().'.' . $request->logo->extension();
            $request->logo->move(public_path('uploads'), $final_name);
           
            // Supprimer l'ancien fichier si existe
            if ($setting->logo && file_exists(public_path('uploads/'.$setting->logo))) {
                unlink(public_path('uploads/'.$setting->logo));
            }
            $setting->logo = $final_name;

        }

        
    

        $setting->save();

        return redirect()->back()->with('success','Logo Created successfully!');

    }
}
