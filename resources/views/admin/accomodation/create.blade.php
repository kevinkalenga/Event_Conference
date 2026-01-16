
@extends('admin.layout.master')
@section('main_content')
<div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')





        <div class="main-content">
              <section class="section">
                <div class="section-header d-flex justify-content-between">
                    <h1>Create Accomodation</h1>
                    <div>
                      <a href="{{route('admin_accomodation_index')}}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                
                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_accomodation_store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        
                                           
                                         
                                            <div class="mb-4">
                                                <label class="form-label">Photo *</label>
                                                <div>
                                                    <input type="file" name="photo">
                                                </div>
                                            </div>
                                            
                                             <div class="col-md-12">
                                                <div class="mb-4">
                                                   <label class="form-label">Name *</label>
                                                   <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                                </div>
                                             </div>
                                                 
                                             <div class="col-md-12">
                                                <div class="mb-4">
                                                   <label class="form-label">Description *</label>
                                                    <textarea name="description" cols="30" rows="10" class="form-control h_100">
                                                        {{old('description')}}
                                                    </textarea>
                                                </div>
                                             </div>
                                           
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-4">
                                                       <label class="form-label">Address </label>
                                                       <input type="text" class="form-control" name="address" value="{{old('address')}}">
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="mb-4">
                                                       <label class="form-label">Email </label>
                                                       <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                    <div class="mb-4">
                                                       <label class="form-label">Phone </label>
                                                       <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                                    </div>
                                                 </div>
                                               
                                                 <div class="col-md-6">
                                                    <div class="mb-4">
                                                       <label class="form-label">Website </label>
                                                       <input type="text" class="form-control" name="website" value="{{old('website')}}">
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
