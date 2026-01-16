
@extends('admin.layout.master')
@section('main_content')
<div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')





        <div class="main-content">
              <section class="section">
                <div class="section-header d-flex justify-content-between">
                    <h1>Edit Accomodation</h1>
                    <div>
                      <a href="{{route('admin_accomodation_index')}}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                
                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_accomodation_update', $accomodation->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        
                                           
                                         
                                            <div class="mb-4">
                                                <label class="form-label">Existing Photo</label>
                                                <div>
                                                    <img src="{{asset('uploads/'.$accomodation->photo)}}" alt="" class="w_100">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Change Photo *</label>
                                                <div>
                                                    <input type="file" name="photo">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                   <label class="form-label">Name *</label>
                                                   <input type="text" class="form-control" name="name" value="{{$accomodation->name}}">
                                                </div>
                                            </div>
                                                 
                                             <div class="col-md-12">
                                                <div class="mb-4">
                                                   <label class="form-label">Description *</label>
                                                    <textarea name="description" cols="30" rows="10" class="form-control h_100">
                                                        {{$accomodation->description}}
                                                    </textarea>
                                                </div>
                                             </div>
                                            
                                            
                                            
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-4">
                                                       <label class="form-label">Address </label>
                                                       <input type="text" class="form-control" name="address" value="{{$accomodation->address}}">
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="mb-4">
                                                       <label class="form-label">Email </label>
                                                       <input type="email" class="form-control" name="email" value="{{$accomodation->email}}">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                    <div class="mb-4">
                                                       <label class="form-label">Phone </label>
                                                       <input type="text" class="form-control" name="phone" value="{{$accomodation->phone}}">
                                                    </div>
                                                 </div>
                                               
                                                 <div class="col-md-6">
                                                    <div class="mb-4">
                                                       <label class="form-label">Website </label>
                                                       <input type="text" class="form-control" name="website" value="{{$accomodation->website}}">
                                                    </div>
                                                 </div>
                                           </div>
                                           
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            <div class="mb-4">
                                                    <label class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
