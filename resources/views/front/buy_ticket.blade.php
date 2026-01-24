        
        
          
@extends('front.layout.master')

@section('main_content')         
        
        <div class="common-banner" style="background-image:url({{asset('dist-front/images/banner.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <h2>Buy Ticket for package : {{$package->name}}</h2>
                            <div class="breadcrumb-container">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('pricing')}}">Pricing</a></li>
                                    <li class="breadcrumb-item active">Buy Ticket for package : {{$package->name}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="price-section" class="pt_50 pb_70 gray prices">
            <div class="container">
                <div class="row">
                    <form class="form" method="post" action="{{route('payment')}}">
                        @csrf
                         <input type="hidden" name="package_name" value="{{$package->name}}">
                         <input type="hidden" name="package_id" value="{{$package->id}}">
        
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact">
                            <h3 class="mb_15 fw600">Billing Information</h3>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name='billing_name' class="form-control" value="{{Auth::guard('web')->user()->name}}" placeholder="Name *">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name='billing_email' class="form-control" value="{{Auth::guard('web')->user()->email}}" placeholder="Email *">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name='billing_phone' class="form-control" value="{{Auth::guard('web')->user()->phone}}" placeholder="Phone *">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name='billing_address' class="form-control" value="{{Auth::guard('web')->user()->address}}" placeholder="Address *">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name='billing_country' class="form-control" value="{{Auth::guard('web')->user()->country}}" placeholder="Country *">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name='billing_state' class="form-control" value="{{Auth::guard('web')->user()->state}}" placeholder="State *">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name='billing_city' class="form-control" value="{{Auth::guard('web')->user()->city}}" placeholder="City *">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text"  name='billing_zip' class="form-control" value="{{Auth::guard('web')->user()->zip}}" placeholder="Zip *">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea rows="3" name="billing_note" class="form-control" placeholder="Note (Optional)"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="mb_15 fw600">Ticket Information</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered cart">
                                <tr>
                                    <td class="w_150">Ticket Price</td>
                                    <td>${{$package->price}}</td>
                                </tr>
                                <tr>
                                    <td>Total Tickets</td>
                                    <td>
                                        <input type="hidden" name="unit_price" id="ticketPrice" value="{{$package->price}}">
                                        <input type="number" min="1" max="100" name="quantity" class="form-control" value="1" id="numPersons" oninput="calculateTotal()">
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Price</td>
                                    <td>
                                        <input type="text" name="total_price" class="form-control" id="totalAmount" value="${{$package->price}}" disabled>
                                    </td>
                                </tr>
                            </table>
                        </div>
        
                        <script>
                            function calculateTotal() {
                                const ticketPrice = document.getElementById('ticketPrice').value;
                                const numPersons = document.getElementById('numPersons').value;
                                const totalAmount = ticketPrice * numPersons;
                                document.getElementById('totalAmount').value = `$${totalAmount}`;
                            }
                        </script>
        
                        <h3 class="mt_25 mb_15 fw600">Payment</h3>
                        <select name="payment_method" class="form-control">
                            <option value="PayPal">PayPal</option>
                            <option value="Stripe">Stripe</option>
                            <option value="Cash">Cash</option>
                        </select>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Buy Ticket</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    </form>
                </div>
            </div>
        </div>
@endsection