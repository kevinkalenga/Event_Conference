  <script src="{{asset('dist-front/js/jquery-3.3.1.min.js')}}"></script> 
        <script src="{{asset('dist-front/js/popper.min.js')}}"></script> 
        <script src="{{asset('dist-front/js/bootstrap.min.js')}}"></script> 
        <script src="{{asset('dist-front/js/jquery.easing.min.js')}}"></script>
        <script src="{{asset('dist-front/js/modernizr-2.8.3.min.js')}}"></script> 
        <script src="{{asset('dist-front/js/jquery.appear.js')}}"></script> 
        <script src="{{asset('dist-front/js/jquery-countTo.js')}}"></script> 
        <script src="{{asset('dist-front/js/jquery.magnific-popup.min.js')}}"></script> 
        <script src="{{asset('dist-front/js/owl.carousel.min.js')}}"></script> 
        <script src="{{asset('dist-front/js/jquery.countdown.min.js')}}"></script> 
        <script src="{{asset('dist-front/js/jquery.scrollTo.js')}}"></script> 
        <script src="{{asset('dist-front/js/typed.js')}}"></script> 
        <script src="{{asset('dist/js/iziToast.min.js')}}"></script> 
        <script src="{{asset('dist-front/js/custom.js')}}"></script>
      
      <!-- @php
        $eventDate = date("m/d/Y", strtotime($home_banner->event_date));
        $eventTime = $home_banner->event_time;
      @endphp
      
      <script>
            $(".countDown").downCount({
                // date: '08/25/2024 03:20:00', //month/date/year   HH:MM:SS
                // offset: +0 //+GMT
                  date: '{{ $eventDate }} {{ $eventTime }}',
                  offset: -2
            });
      </script> -->