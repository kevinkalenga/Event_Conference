
@extends('admin.layout.master')
@section('main_content')
<div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')





        <div class="main-content">
              <section class="section">
                <div class="section-header d-flex justify-content-between">
                    <h1>Attendees</h1>
                    <div>
                      <a href="{{route('admin_attendee_create')}}" class="btn btn-primary">Add New</a>
                    </div>
                </div>
                
                
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                   <div class="table-responsive">
                                      <table id="example1" class="table table-bordered">
                                         <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                              
                                                <th>Actions</th>
                                               
                                            </tr>
                                         </thead>
                                         <tbody>
                                            @foreach($attendees as $attendee)
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @if($attendee->photo != '')
                                                     <img style="width: 100px;" src="{{asset('uploads/'.$attendee->photo)}}" alt="" class="w_100">
                                                    @else
                                                      <img src="{{ asset('uploads/default.png') }}" alt="" class="w_100">
                                                    @endif
                                               </td>
                                                <td>{{$attendee->name}}</td>
                                                <td>{{$attendee->email}}</td>
                                                
                                                <td>
                                                    <a href="{{route('admin_attendee_edit', $attendee->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('admin_attendee_delete', $attendee->id)}}"
                                                     class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash"></i></a>
                                                </td>
                                             </tr>
                                            @endforeach
                                         </tbody>
                                      </table>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection
