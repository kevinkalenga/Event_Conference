
@extends('admin.layout.master')
@section('main_content')
<div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')





        <div class="main-content">
              <section class="section">
                <div class="section-header d-flex justify-content-between">
                    <h1>Edit Package</h1>
                    <div>
                      <a href="{{route('admin_package_index')}}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                
                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_package_update', $package->id)}}" method="post">
                                        @csrf
                                        
                                           
                                         
                                            <div class="mb-4">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{$package->name}}">
                                            </div>
                                             
                                            <div class="mb-4">
                                                <label class="form-label">Price *</label>
                                                <input type="text" class="form-control" name="price" value="{{$package->price}}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Maximum Tickets *</label>
                                                <input type="text" class="form-control" name="maximum_tickets" value="{{$package->maximum_tickets}}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Item Order *</label>
                                                <input type="text" class="form-control" name="item_order" value="{{$package->item_order}}">
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
