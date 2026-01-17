<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Validation\Rule;

class AdminVideoController extends Controller
{
    public function index()
    {
      $videos = Video::get();
      return view('admin.video_gallery.index', compact('videos'));
    }

    public function create()
    {
       return view('admin.video_gallery.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'video' => ['required'],
       
       
        
      ]);

      // Create speaker first
      $video = new Video();


      // Assign fields
      $video->caption = $request->caption;
      $video->video = $request->video;
  

      $video->save();

      return redirect()->route('admin_video_index')->with('success','Video Created successfully!');
    }



    public function edit($id)
    {
      $video = Video::where('id', $id)->first();
      return view('admin.video_gallery.edit', compact('video'));
    }
    public function update(Request $request, $id)
    {
        $videoEdit = Video::where('id', $id)->first();
      

       

       // Assign fields
      $videoEdit->caption = $request->caption;
      $videoEdit->video = $request->video;

       $videoEdit->save();
    
       return redirect()->route('admin_video_index')->with('success','Video Updated successfully!');
    
    }


    public function delete($id) 
    {
         $videoDelete = Video::where('id', $id)->first();

         if ($videoDelete->video && file_exists(public_path('uploads/'.$videoDelete->video))) {
             unlink(public_path('uploads/'.$videoDelete->video));
         }

         $videoDelete->delete();

         return redirect()->route('admin_video_index')
                     ->with('success', 'Video is Deleted Successfully');
    }
    










}
