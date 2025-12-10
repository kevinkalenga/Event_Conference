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
      
    }
    public function store()
    {

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
