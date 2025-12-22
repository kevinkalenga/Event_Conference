
@extends('admin.layout.master')
@section('main_content')
<div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')





        <div class="main-content">
              <section class="section">
                <div class="section-header d-flex justify-content-between">
                    <h1>Edit Sponsor Category</h1>
                    <div>
                      <a href="{{route('admin_sponsor_category_index')}}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                
                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_sponsor_category_update', $sponsor_category->id)}}" method="post">
                                        @csrf
                                        
                                           
                                         
                                           
                                                 <div class="col-md-12">
                                                     <div class="mb-4">
                                                       <label class="form-label">Name *</label>
                                                       <input type="text" class="form-control" name="name" value="{{$sponsor_category->name}}">
                                                     </div>
                                                 </div>
                                               
                                                   <div class="col-md-12">
                                                     <div class="mb-4">
                                                       <label class="form-label">Description </label>
                                                         <textarea name="description" cols="30" rows="10" class="form-control h_100">
                                                            {!! $sponsor_category->description !!}
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
