       
       
 @extends('front.layout.master')

@section('main_content')  
       
        <div class="common-banner" style="background-image:url({{asset('dist-front/images/banner.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <h2>Accommodations</h2>
                            <div class="breadcrumb-container">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item active">Accommodations</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id="speakers" class="pt_70 pb_70 white team speakers-item">
            <div class="container">
            @foreach($accomodations as $item)
                <div class="row mb_40">
                    <div class="col-lg-4 col-sm-12 col-xs-12">
                        <div class="speaker-detail-img">
                            <img src="{{asset('uploads/'.$item->photo)}}">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 col-xs-12">
                        <div class="speaker-detail">
                            <h2 class="mb_15">{{$item->name}}</h2>
                            <p>
                               {!! $item->description !!}
                            </p>
                            @if($item->address != '' || $item->email != '' || $item->phone != '' || $item->website != '')
                             <div class="table-responsive">
                                <table class="table table-bordered">
                                  @if($item->address != '')
                                    <tr>
                                        <th><b>Address:</b></th>
                                        <td>{{$item->address}}</td>
                                    </tr>
                                  @endif
                                  @if($item->email != '')
                                    <tr>
                                        <th><b>Email:</b></th>
                                        <td>{{$item->email}}</td>
                                    </tr>
                                  @endif
                                  @if($item->phone != '')
                                    <tr>
                                        <th><b>Phone:</b></th>
                                        <td>{{$item->phone}}</td>
                                    </tr>
                                   @endif
                                   @if($item->website != '')
                                    <tr>
                                        <th><b>Website:</b></th>
                                        <td>
                                            <a href="{{$item->website}}" target="_blank">{{$item->website}}</a>
                                        </td>
                                    </tr>
                                   @endif
                                </table>
                             </div>
                            @endif
                        </div>
                    </div>
                </div>

            @endforeach


              


            </div>
        </div>
@endsection