
@extends('admin.layout.master')
@section('main_content')
<div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')





        <div class="main-content">
              <section class="section">
                <div class="section-header d-flex justify-content-between">
                    <h1>Create Package</h1>
                    <div>
                      <a href="{{route('admin_package_index')}}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                
                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_package_store')}}" method="post" >
                                        @csrf
                                        
                                           
                                         
                                            <div class="mb-4">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                            </div>
                                             
                                            <div class="mb-4">
                                                <label class="form-label">Price *</label>
                                                <input type="text" class="form-control" name="price" value="{{old('price')}}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Maximum Tickets *</label>
                                                <input type="text" class="form-control" name="maximum_tickets" value="{{old('maximum_tickets')}}">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Item Order *</label>
                                                <input type="text" class="form-control" name="item_order" value="{{old('item_order')}}">
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
