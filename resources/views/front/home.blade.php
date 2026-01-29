@extends('front.layout.master')

@section('main_content')

           <div class="container-fluid home-banner" style="background-image:url({{asset('uploads/'.$home_banner->background)}})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="static-banner-detail">
                            <h4>{{$home_banner->subheading}}</h4>
                            <h2>{{$home_banner->heading}}</h2>
                            
                            @if($home_banner->text != '')
                              <p>
                                {!!$home_banner->text!!}
                              </p>
                            @endif
                            
                            @php  
                            

                               // Date actuelle
                                $d1 = new DateTime();
                               // Construction correcte de la date/heure de l'événement
                               $eventDateTime = $home_banner->event_date . ' ' . $home_banner->event_time;

                                // Création de l'objet DateTime
                                $d2 = DateTime::createFromFormat('Y-m-d H:i:s', $eventDateTime);
                                // Vérification au cas où la date serait mal formatée

                                if($d2) {
                                    $interval = $d1->diff($d2);

                                    $days = $interval->days;
                                    $hours = $interval->h;
                                    $minutes = $interval->i;
                                } else {
                                    $days = $hours = $minutes = 0;
                                }
                                
                            @endphp
                              
                            
                            
                            <div class="counter-area">
                                <div class="countDown clearfix">
                                    <div class="row count-down-bg">
                                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                            <div class="single-count day">
                                                <h1 class="days">0</h1>
                                                <p class="days_ref">days</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                            <div class="single-count hour">
                                                <h1 class="hours">0</h1>
                                                <p class="hours_ref">hours</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                            <div class="single-count min">
                                                <h1 class="minutes">0</h1>
                                                <p class="minutes_ref">minutes</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                            <div class="single-count second">
                                                <h1 class="seconds">0</h1>
                                                <p class="seconds_ref">seconds</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="" class="banner_btn video_btn">BUY TICKETS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
   @if($home_welcome->status == 'Show')
        <section id="about-section" class="pt_70 pb_70 white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2><span class="color_green">{{$home_welcome->heading}}</span></h2>
                            </div>
                        </div>
                        <div class="about-details">
                            <p>{!! nl2br($home_welcome->description) !!}</p>
                            @if($home_welcome->button_text != '')
                               <div class="global_btn mt_20">
                                   <a class="btn_one" href="{{$home_welcome->button_link}}">{{$home_welcome->button_text}}</a>
                               </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-xs-12">
                        <div class="about-details-img">
                            <img src="{{asset('uploads/'.$home_welcome->photo)}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    
    
    @if($home_speaker->status == 'Show')
        <div id="speakers" class="pt_70 pb_70 gray team">
            <div class="container">
                <div class="row">
                    <div class="col-sm-1 col-lg-2"></div>
                    <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                        <h2 class="title-1 mb_10">
                            <span class="color_green">{{ $home_speaker->heading }}</span>
                        </h2>
                        <p class="heading-space">
                            {!! ($home_speaker->description) !!}
                        </p>
                    </div>
                    <div class="col-sm-1 col-lg-2"></div>
                </div>
                <div class="row pt_40">
                  @foreach($speakers as $speaker)
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="team-img mb_20">
                            <a href="{{route('speaker', $speaker->slug)}}"><img src="{{asset('uploads/'.$speaker->photo)}}"></a>
                        </div>
                        <div class="team-info text-center">
                            <h6><a href="{{route('speaker', $speaker->slug)}}">{{$speaker->name}}</a></h6>
                            <p>{{$speaker->designation}}</p>
                        </div>
                    </div>
                  @endforeach
                 
                </div>
            </div>
        </div>
    @endif
    
     @if($home_counter->status == 'Show')
        <div id="counter-section" class="pt_70 pb_70" style="background-image: url({{asset('uploads/'.$home_counter->background)}});">
            <div class="container">
                <div class="row number-counters text-center">
                    <div class="col-lg-3 col-sm-6 col-xs-12"> 
                        <div class="counters-item">
                            
                            <i class="{{$home_counter->item1_icon}}"></i>
                            <strong data-to="{{$home_counter->item1_number}}">0</strong>
                            <p>{{$home_counter->item1_title}}</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6 col-xs-12"> 
                        <div class="counters-item">
                        <i class="{{$home_counter->item2_icon}}"></i>
                            <strong data-to="{{$home_counter->item2_number}}">0</strong>
                            <p>{{$home_counter->item2_title}}</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="counters-item">
                            <i class="{{$home_counter->item3_icon}}"></i>
                            <strong data-to="{{$home_counter->item3_number}}">0</strong>
                            <p>{{$home_counter->item3_title}}</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="counters-item">
                            <i class="{{$home_counter->item4_icon}}"></i>
                            <strong data-to="{{$home_counter->item4_number}}">0</strong>
                            <p>{{$home_counter->item4_title}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif    
    
    @if($home_pricing->status == 'Show')    
        <div id="price-section" class="pt_70 pb_70 gray prices">
            <div class="container">
    
                <div class="row">
                    <div class="col-sm-1 col-lg-2"></div>
                    <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                        <h2 class="title-1 mb_10"><span class="color_green">{{ $home_pricing->heading }}</span></h2>
                        <p class="heading-space">
                              {!! ($home_pricing->description) !!}
                        </p>
                    </div>
                    <div class="col-sm-1 col-lg-2"></div>
                </div>
    
    
                <div class="row pt_40"> 
    
                 @foreach($packages as $package)  
                    <div class="col-md-4 col-sm-12">
                        <div class="info">
                            <h5 class="event-ti-style">{{$package->name}}</h5>
                            <h3 class="event-ti-style">${{$package->price}}</h3>
                            <ul>
                                @foreach($package->facilities as $facility)
                                 @php
                                   
                                   if($facility->status == 'Yes') {
                                     $icon = 'fa-check';
                                    } else {
                                        $icon = 'fa-times';
                                    }
                                  @endphp 
                                  <li><i class="fa {{ $icon }}"></i> {{ $facility->name }}</li>
                                @endforeach
                                
                              
                            </ul>
                            <div class="global_btn mt_20">
                                <a class="btn_two" href="{{route('buy_ticket', $package->id)}}">Buy Ticket</a>
                            </div>
                        </div>
                    </div>
                 @endforeach
    
              
                </div>
            </div>
        </div>
    @endif
         
        <div id="blog-section" class="pt_70 pb_70 white blog-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-1 col-lg-2"></div>
                    <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                        <h2 class="title-1 mb_15">
                            <span class="color_green">Latest News</span>
                        </h2>
                        <p class="heading-space">
                            All the latest news and updates about our event and conference are available here. Stay informed and don't miss any important information!
                        </p>
                    </div>
                    <div class="col-sm-1 col-lg-2"></div>
                </div>
                <div class="row pt_40">
                  @foreach($posts as $post)
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="blog-box text-center">
                            <div class="blog-post-images">
                                <a href="{{route('post', $post->slug)}}">
                                    <img src="{{asset('uploads/'.$post->photo)}}" alt="image">
                                </a>
                            </div>
                            <div class="blogs-post">
                                <h4><a href="{{route('post', $post->slug)}}">{{$post->title }}</a></h4>
                                <p>
                                   {!! $post->short_description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    
    
        <div id="sponsor-section" class="pt_70 pb_70 gray">
            <div class="container">
                <div class="row">
                    <div class="col-sm-1 col-lg-2"></div>
                    <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                        <h2 class="title-1 mb_15">
                            <span class="color_green">Our Sponsers</span>
                        </h2>
                        <p class="heading-space">
                            If you want to become a sponsor, please contact us. We offer different sponsorship packages that will help you promote your brand and reach a wider audience.
                        </p>
                    </div>
                    <div class="col-sm-1 col-lg-2"></div>
                </div>
                <div class="row pt_40">
                    <div class="col-md-12">
                        <div class="owl-carousel">
                          @foreach($sponsors as $sponsor)
                            <div class="sponsors-logo">
                               <a href="{{route('sponsor', $sponsor->slug)}}"><img src="{{asset('uploads/'.$sponsor->logo)}}" class="img-responsive" alt=""></a>
                            </div>
                          @endforeach  
                        </div>
                    </div>
                </div>
            </div>
        </div>

     
<!-- SCRIPT à placer après le compteur, avant </body> -->

@php
$eventDateTimeISO = null;
if(!empty($home_banner->event_date) && !empty($home_banner->event_time)) {
    // Carbon parse en format ISO 8601
    $eventDateTimeISO = \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $home_banner->event_date . ' ' . $home_banner->event_time)
                        ->toIso8601String();
}
@endphp

@if($eventDateTimeISO)
<script>
    const eventDate = new Date("{{ $eventDateTimeISO }}");

    function updateCountdown() {
        const now = new Date();
        let diff = eventDate - now;
        if(diff < 0) diff = 0;

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const minutes = Math.floor((diff / (1000 * 60)) % 60);
        const seconds = Math.floor((diff / 1000) % 60);

        const selectors = {
            days: document.querySelector(".days"),
            hours: document.querySelector(".hours"),
            minutes: document.querySelector(".minutes"),
            seconds: document.querySelector(".seconds")
        };

        Object.entries({days, hours, minutes, seconds}).forEach(([key, value]) => {
            if(selectors[key].textContent != value) {
                selectors[key].textContent = value;
                selectors[key].classList.add("flip");
                setTimeout(() => selectors[key].classList.remove("flip"), 300);
            }
        });
    }

    setInterval(updateCountdown, 1000);
    updateCountdown();
</script>
@endif


@endsection