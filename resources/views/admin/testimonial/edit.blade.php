
@extends('admin.layout.master')
@section('main_content')
<div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')





        <div class="main-content">
              <section class="section">
                <div class="section-header d-flex justify-content-between">
                    <h1>Edit Testimonial</h1>
                    <div>
                      <a href="{{route('admin_testimonial_index')}}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                
                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_testimonial_update', $testimonial->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        
                                           
                                         
                                            <div class="mb-4">
                                                <label class="form-label">Existing Photo</label>
                                                <div>
                                                    <img src="{{asset('uploads/'.$testimonial->photo)}}" alt="" class="w_100">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Change Photo *</label>
                                                <div>
                                                    <input type="file" name="photo">
                                                </div>
                                            </div>
                                              <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="mb-4">
                                                       <label class="form-label">Name *</label>
                                                       <input type="text" class="form-control" name="name" value="{{$testimonial->name}}">
                                                     </div>
                                                 </div>
                                              
                                                 <div class="col-md-6">
                                                     <div class="mb-4">
                                                        <label class="form-label">Designation *</label>
                                                        <input type="text" class="form-control" name="designation" value="{{$testimonial->designation}}">
                                                     </div>
                                                 </div>
                                            </div>
                                           
                                           
                                            
                                            
                                            
                                            
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Comment *</label>
                                                    <textarea name="comment" cols="30" rows="10" class="form-control h_100">
                                                      {{$testimonial->comment}}
                                                    </textarea>
                                               </div>
                                            </div>
                                            
                                          
                                           
                                            
                                            
                                            
                                            
                                      
                                            
                                            
                                           <div class="mb-4">
                                                    <label class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                          
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection
