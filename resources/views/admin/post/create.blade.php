
@extends('admin.layout.master')
@section('main_content')
<div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')





        <div class="main-content">
              <section class="section">
                <div class="section-header d-flex justify-content-between">
                    <h1>Create Post</h1>
                    <div>
                      <a href="{{route('admin_post_index')}}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                
                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_post_store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        
                                           
                                         
                                            <div class="mb-4">
                                                <label class="form-label">Photo *</label>
                                                <div>
                                                    <input type="file" name="photo">
                                                </div>
                                            </div>
                                            <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="mb-4">
                                                       <label class="form-label">Title *</label>
                                                       <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                                     </div>
                                                 </div>
                                              
                                                 <div class="col-md-6">
                                                     <div class="mb-4">
                                                        <label class="form-label">Slug *</label>
                                                        <input type="text" class="form-control" name="slug" value="{{old('slug')}}">
                                                     </div>
                                                 </div>
                                            </div>
                                           
                                           
                                            
                                            
                                            
                                            
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Short Description *</label>
                                                    <textarea name="short_description" cols="30" rows="10" class="form-control h_100">
                                                        {{old('short_description')}}
                                                    </textarea>
                                               </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Description *</label>
                                                    <textarea name="description" cols="30" rows="10" class="form-control editor">
                                                        {{old('description')}}
                                                    </textarea>
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
