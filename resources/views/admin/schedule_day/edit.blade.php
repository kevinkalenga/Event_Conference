
@extends('admin.layout.master')
@section('main_content')
<div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')





        <div class="main-content">
              <section class="section">
                <div class="section-header d-flex justify-content-between">
                    <h1>Edit Schedule Day</h1>
                    <div>
                      <a href="{{route('admin_schedule_day_index')}}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                
                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_schedule_day_update', $schedule_day->id)}}" method="post">
                                        @csrf
                                        
                                           
                                         
                                           
                                                 <div class="col-md-12">
                                                     <div class="mb-4">
                                                       <label class="form-label">Day *</label>
                                                       <input type="text" class="form-control" name="day" value="{{$schedule_day->day}}">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-12">
                                                     <div class="mb-4">
                                                       <label class="form-label">Date *</label>
                                                       <input type="text" class="form-control" name="date1" value="{{$schedule_day->date1}}">
                                                     </div>
                                                 </div>
                                                 <div class="col-md-12">
                                                     <div class="mb-4">
                                                        <label class="form-label">Order *</label>
                                                        <input type="text" class="form-control" name="order1" value="{{$schedule_day->order1}}">
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
