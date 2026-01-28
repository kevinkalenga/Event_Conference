@extends('front.layout.master')

@section('main_content')
<div class="common-banner" style="background-image:url({{asset('dist-front/images/banner.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Messages</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Messages</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="user-section pt_70 pb_70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="user-sidebar">
                    <div class="card">
                        @include('front.layout.sidebar')
                    </div>
                </div>
            </div>
               <div class="col-lg-9">
                        <h4 class="message-heading">Write Message</h4>
                        <form action="{{ route('attendee_message_submit') }}" method="post">
                            @csrf
                            <div class="mb-2">
                                <textarea name="message" class="form-control h_100" cols="30" rows="10" placeholder="Write your message here"></textarea>
                            </div>
                            <div class="mb-2 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
        
                        <h4 class="message-heading mt_40">All Messages</h4>
                        <div class="message-item message-item-admin-border">
                            <div class="message-top">
                                <div class="left">
                                    <img src="images/admin.jpg" alt="">
                                </div>
                                <div class="right">
                                    <h4>Morshedul Arefin</h4>
                                    <h5>Admin</h5>
                                    <div class="date-time">2024-08-20 09:33:22 AM</div>
                                </div>
                            </div>
                            <div class="message-bottom">
                                <p>Thank you for contacting. Sure, you can take it with you without any problem.</p>
                            </div>
                        </div>
                        
                        <div class="message-item">
                            <div class="message-top">
                                <div class="left">
                                    <img src="images/attendee.jpg" alt="">
                                </div>
                                <div class="right">
                                    <h4>Smith Brent</h4>
                                    <h5>Client</h5>
                                    <div class="date-time">2024-08-20 08:12:43 AM</div>
                                </div>
                            </div>
                            <div class="message-bottom">
                                <p>I forgot to tell one thing. Can you please allow some toys for my son in this tour? It will be very much helpful if you allow.</p>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection