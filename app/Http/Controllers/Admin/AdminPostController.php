<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
      $posts = Post::get();
      return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
       return view('admin.post.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'title' => ['required'],
        'slug' => ['required', 'alpha_dash', 'unique:sponsors,slug'],
        'short_description' => ['required'],
        'description' => ['required'],
        'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        
      ]);

      // Create speaker first
      $post = new Post();

    // Handle photo if uploaded
      if ($request->hasFile('photo')) {

        $final_name = 'post_'.time().'.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $post->photo = $final_name;

      } else {
        // Default or nullable photo
        $post->photo = 'default.png'; // change if needed
      }

      // Assign fields
      $post->title = $request->title;
      $post->slug = $request->slug;
      $post->short_description = $request->short_description;
      $post->description = $request->description;
   

      $post->save();

      return redirect()->route('admin_post_index')->with('success','Post Created successfully!');
    }



    public function edit($id)
    {
      $post = Post::where('id', $id)->first();
      return view('admin.post.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
      
        $request->validate([
        'title' => ['required'],
        'slug' => ['required', 'alpha_dash', 'unique:sponsors,slug'],
        'short_description' => ['required'],
        'description' => ['required'],
        'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        
      ]);

       if ($request->hasFile('photo')) {
          $request->validate([
              'photo' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
          ]);

          // Photos par défaut à ne pas supprimer
          $defaultPhotos = ['user.jpg', 'admin.jpeg', 'default.png'];

          // Supprimer l'ancienne photo si elle existe et n'est pas par défaut
          if ($post->photo &&
              !in_array($post->photo, $defaultPhotos) &&
              file_exists(public_path('uploads/' . $post->photo))) {

              unlink(public_path('uploads/' . $post->photo));
          }

           // Nouvelle photo
           $final_name = 'testimonial_' . time() . '.' . $request->photo->extension();
           $request->photo->move(public_path('uploads'), $final_name);
           $post->photo = $final_name;
        } else {
           // Default or nullable photo
           $post->photo = 'default.png'; // change if needed
        }
       
         // Assign fields
         $post->title = $request->title;
         $post->slug = $request->slug;
         $post->short_description = $request->short_description;
         $post->description = $request->description;
   

         $post->save();
    
       return redirect()->route('admin_post_index')->with('success','Post Updated successfully!');
    
    }


    public function delete($id) 
    {
         $post = Post::where('id', $id)->first();

         if ($post->photo && file_exists(public_path('uploads/'.$post->photo))) {
             unlink(public_path('uploads/'.$post->photo));
         }

         $post->delete();

         return redirect()->route('admin_post_index')
                     ->with('success', 'Post is Deleted Successfully');
    }










}
