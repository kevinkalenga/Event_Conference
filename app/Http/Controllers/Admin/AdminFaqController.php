<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Validation\Rule;

class AdminFaqController extends Controller
{
    
    public function index()
    {
      $faqs = Faq::get();
      return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
       return view('admin.faq.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'question' => ['required'],
        'answer' => ['required'],
       
       
        
      ]);

      // Create speaker first
      $faq = new Faq();


      // Assign fields
      $faq->question = $request->question;
      $faq->answer = $request->answer;
  

      $faq->save();

      return redirect()->route('admin_faq_index')->with('success','Faq Created successfully!');
    }



    public function edit($id)
    {
      $faq = Faq::where('id', $id)->first();
      return view('admin.faq.edit', compact('faq'));
    }
    public function update(Request $request, $id)
    {
        $faq = Faq::where('id', $id)->first();
      

       

       // Assign fields
      $faq->question = $request->question;
      $faq->answer = $request->answer;

       $faq->save();
    
       return redirect()->route('admin_faq_index')->with('success','Faq Updated successfully!');
    
    }


    public function delete($id) 
    {
         $faq = Faq::where('id', $id)->first();

         $faq->delete();

         return redirect()->route('admin_faq_index')
                     ->with('success', 'Faq is Deleted Successfully');
    }





}
