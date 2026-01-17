
@extends('admin.layout.master')
@section('main_content')
<div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')
        @include('admin.layout.sidebar')





        <div class="main-content">
              <section class="section">
                <div class="section-header d-flex justify-content-between">
                    <h1>Video</h1>
                    <div>
                      <a href="{{route('admin_video_create')}}" class="btn btn-primary">Add New</a>
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
                                                <th>Video Preview</th>
                                                <th>Caption</th>
                                             
                                              
                                                <th>Actions</th>
                                               
                                            </tr>
                                         </thead>
                                         <tbody>
                                            @foreach($videos as $item)
                                             <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    <iframe class="if1" width="560" height="315" src="https://www.youtube.com/embed/{{$item->video}}"
                                                    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                     referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                               </td>
                                                <td>{{$item->caption}}</td>
                                                
                                                
                                                <td>
                                                    <a href="{{route('admin_video_edit', $item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('admin_video_delete', $item->id)}}"
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
