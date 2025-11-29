<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="icon" type="image/png" href="{{asset('dist-front/images/favicon.png')}}">

        <title>SingleEvent - Event & Conference Management Website</title>

        <link href="{{asset('dist-front/css/animate.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('dist-front/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('dist-front/css/font-awesome.min.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('dist-front/css/magnific-popup.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('dist-front/css/owl.carousel.min.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('dist-front/css/global.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('dist-front/css/style.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('dist-front/css/responsive.css')}}" type="text/css" rel="stylesheet">
        <link href="{{asset('dist-front/css/spacing.css')}}" type="text/css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,500,700,900" rel="stylesheet">
        
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">

        <div class="container main-menu" id="navbar">
            <div class="row">
                <div class="col-lg-2 col-sm-12"> 
                    <a href="index.html" id="logo" class="grid_2"> <img src="{{asset('dist-front/images/logo.png')}}"> </a> 
                </div>
                <div class="col-lg-10 col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                            <ul id="navContent" class="navbar-nav mr-auto navigation">
                                <li>
                                    <a class="smooth-scroll nav-link" href="index.html">Home</a>
                                </li>
                                <li>
                                    <a class="smooth-scroll nav-link" href="speakers.html">Speakers</a>
                                </li>
                                <li>
                                    <a class="smooth-scroll nav-link" href="schedule.html">Schedule</a>
                                </li>
                                <li>
                                    <a class="smooth-scroll nav-link" href="pricing.html">Pricing</a>
                                </li>
                                <li>
                                    <a class="smooth-scroll nav-link" href="blog.html">Blog</a>
                                </li>
                                <li class="nav-item dropdown"> <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pages </a>
                                    <div class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown"> 
                                        <a class="dropdown-item" href="sponsors.html">Sponsors</a>
                                        <a class="dropdown-item" href="organizers.html">Organizers</a>
                                        <a class="dropdown-item" href="accommodations.html">Accommodations</a>
                                        <a class="dropdown-item" href="photo-gallery.html">Photo Gallery</a>
                                        <a class="dropdown-item" href="video-gallery.html">Video Gallery</a>
                                        <a class="dropdown-item" href="faq.html">FAQ</a>
                                        <a class="dropdown-item" href="testimonials.html">Testimonials</a> 
                                    </div>
                                </li>
                                <li>
                                    <a class="smooth-scroll nav-link" href="contact.html">Contact</a>
                                </li>
                                <li class="member-login-button">
                                    <div class="inner">
                                        <a class="smooth-scroll nav-link" href="login.html">
                                            <i class="fa fa-sign-in"></i> Login
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>


        <div class="container-fluid home-banner" style="background-image:url({{asset('dist-front/images/banner-home.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="static-banner-detail">
                            <h4>September 20-24, 2024, California</h4>
                            <h2>Event and Conference Website</h2>
                            <p>
                                Join us at our next networking event and conference! Connect with industry professionals, engage in insightful discussions, and attend hands-on workshops. Learn from experts, collaborate on innovative ideas, and build lasting relationships.
                            </p>
                            <div class="counter-area">
                                <div class="countDown clearfix">
                                    <div class="row count-down-bg">
                                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                            <div class="single-count day">
                                                <h1 class="days">46</h1>
                                                <p class="days_ref">days</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                            <div class="single-count hour">
                                                <h1 class="hours">09</h1>
                                                <p class="hours_ref">hours</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                            <div class="single-count min">
                                                <h1 class="minutes">55</h1>
                                                <p class="minutes_ref">minutes</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                            <div class="single-count second">
                                                <h1 class="seconds">02</h1>
                                                <p class="seconds_ref">seconds</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="buy.html" class="banner_btn video_btn">BUY TICKETS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
        <section id="about-section" class="pt_70 pb_70 white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2><span class="color_green">Welcome To Our Website</span></h2>
                            </div>
                        </div>
                        <div class="about-details">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stan when an unknown printer took a galley of type and scramble. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stan when an unknown printer took a galley of type and scramble. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="global_btn mt_20">
                                <a class="btn_one" href="#">READ MORE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-xs-12">
                        <div class="about-details-img">
                            <img src="{{asset('dist-front/images/about.jpg')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    
    
        <div id="speakers" class="pt_70 pb_70 gray team">
            <div class="container">
                <div class="row">
                    <div class="col-sm-1 col-lg-2"></div>
                    <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                        <h2 class="title-1 mb_10">
                            <span class="color_green">Speakers</span>
                        </h2>
                        <p class="heading-space">
                            You will find below the list of our valuable speakers. They are all experts in their field and will share their knowledge with you.
                        </p>
                    </div>
                    <div class="col-sm-1 col-lg-2"></div>
                </div>
                <div class="row pt_40">
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="team-img mb_20">
                            <a href="speaker.html"><img src="{{asset('dist-front/images/speaker-1.jpg')}}"></a>
                        </div>
                        <div class="team-info text-center">
                            <h6><a href="speaker.html">Danny Allen</a></h6>
                            <p>Founder, AA Company</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="team-img mb_20">
                            <a href="speaker.html"><img src="{{asset('dist-front/images/speaker-2.jpg')}}"></a>
                        </div>
                        <div class="team-info text-center">
                            <h6><a href="speaker.html">John Sword</a></h6>
                            <p>Founder, BB Company</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="team-img mb_20">
                            <a href="speaker.html"><img src="{{asset('dist-front/images/speaker-3.jpg')}}"></a>
                        </div>
                        <div class="team-info text-center">
                            <h6><a href="speaker.html">Steven Gragg</a></h6>
                            <p>Founder, CC Company</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="team-img mb_20">
                            <a href="speaker.html"><img src="{{asset('dist-front/images/speaker-4.jpg')}}"></a>
                        </div>
                        <div class="team-info text-center">
                            <h6><a href="speaker.html">Jordan Parker</a></h6>
                            <p>Founder, DD Company</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
        <div id="counter-section" class="pt_70 pb_70" style="background-image: url({{asset('dist-front/images/counter-bg.jpg')}});">
            <div class="container">
                <div class="row number-counters text-center">
                    <div class="col-lg-3 col-sm-6 col-xs-12"> 
                        <div class="counters-item">
                            <i class="fa fa-calendar"></i>
                            <strong data-to="3">0</strong>
                            <p>Days Event</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6 col-xs-12"> 
                        <div class="counters-item">
                        <i class="fa fa-user"></i>
                            <strong data-to="8">0</strong>
                            <p>Speakers</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="counters-item">
                            <i class="fa fa-users"></i>
                            <strong data-to="60">0</strong>
                            <p>Members Registered</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="counters-item">
                            <i class="fa fa-th-list"></i>
                            <strong data-to="12">0</strong>
                            <p>Sponsors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    
        
        <div id="price-section" class="pt_70 pb_70 gray prices">
            <div class="container">
    
                <div class="row">
                    <div class="col-sm-1 col-lg-2"></div>
                    <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                        <h2 class="title-1 mb_10"><span class="color_green">Pricing</span></h2>
                        <p class="heading-space">
                            You will find below the different pricing options for our event. Choose the one that suits you best and register now! You will have access to all sessions, unlimited coffee and food, and the opportunity to meet with your favorite speakers.
                        </p>
                    </div>
                    <div class="col-sm-1 col-lg-2"></div>
                </div>
    
    
                <div class="row pt_40"> 
    
                    <div class="col-md-4 col-sm-12">
                        <div class="info">
                            <h5 class="event-ti-style">Standard</h5>
                            <h3 class="event-ti-style">$49</h3>
                            <ul>
                                <li><i class="fa fa-check"></i> Access to all sessions</li>
                                <li><i class="fa fa-check"></i> Unlimited Drinkgs & Coffee</li>
                                <li><i class="fa fa-times"></i> Lunch Facility</li>
                                <li><i class="fa fa-times"></i> Meet with Speakers</li>
                            </ul>
                            <div class="global_btn mt_20">
                                <a class="btn_two" href="buy.html">Buy Ticket</a>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4 col-sm-12">
                        <div class="info">
                            <h5 class="event-ti-style">Business</h5>
                            <h3 class="event-ti-style">$99</h3>
                            <ul>
                                <li><i class="fa fa-check"></i> Access to all sessions</li>
                                <li><i class="fa fa-check"></i> Unlimited Drinkgs & Coffee</li>
                                <li><i class="fa fa-check"></i> Lunch Facility</li>
                                <li><i class="fa fa-times"></i> Meet with Speakers</li>
                            </ul>
                            <div class="global_btn mt_20">
                                <a class="btn_two" href="buy.html">Buy Ticket</a>
                            </div>
                        </div>
                    </div>
    
                <div class="col-md-4 col-sm-12">
                    <div class="info">
                        <h5 class="event-ti-style">Premium</h5>
                        <h3 class="event-ti-style">$139</h3>
                        <ul>
                            <li><i class="fa fa-check"></i> Access to all sessions</li>
                            <li><i class="fa fa-check"></i> Unlimited Drinkgs & Coffee</li>
                            <li><i class="fa fa-check"></i> Lunch Facility</li>
                            <li><i class="fa fa-check"></i> Meet with Speakers</li>
                        </ul>
                        <div class="global_btn mt_20">
                            <a class="btn_two" href="buy.html">Buy Ticket</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    
         
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
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="blog-box text-center">
                            <div class="blog-post-images">
                                <a href="post.html">
                                    <img src="{{asset('dist-front/images/post-1.jpg')}}" alt="image">
                                </a>
                            </div>
                            <div class="blogs-post">
                                <h4><a href="post.html">Essential Tips for a Successful Virtual Conference</a></h4>
                                <p>
                                    Organizing a virtual conference can be challenging. Focus on engaging content, interactive sessions, & reliable technology to ensure a successful event.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="blog-box text-center">
                            <div class="blog-post-images">
                                <a href="post.html"><img src="{{asset('dist-front/images/post-2.jpg')}}" alt="image"></a>
                            </div>
                            <div class="blogs-post">
                                <h4><a href="post.html">Maximizing Your Networking Opportunities at Events</a></h4>
                                <p>
                                    Networking at events requires strategic planning. Attend relevant sessions, participate in discussions, and utilize apps to connect with professionals.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="blog-box text-center">
                            <div class="blog-post-images">
                                <a href="post.html"><img src="{{asset('dist-front/images/post-3.jpg')}}" alt="image"></a>
                            </div>
                            <div class="blogs-post">
                                <h4><a href="post.html">How to Choose the Perfect Venue for Your Conference</a></h4>
                                <p>
                                    Selecting the ideal venue involves considering location, capacity, and amenities. Ensure it aligns with your goals, and fits within your budget.
                                </p>
                            </div>
                        </div>
                    </div>
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
                            <div class="sponsors-logo">
                                <img src="{{asset('dist-front/images/partner-1.png')}}" class="img-responsive" alt="sponsor logo">
                            </div>
                            <div class="sponsors-logo">
                                <img src="{{asset('dist-front/images/partner-2.png')}}" class="img-responsive" alt="sponsor logo">
                            </div>
                            <div class="sponsors-logo">
                                <img src="{{asset('dist-front/images/partner-3.png')}}" class="img-responsive" alt="sponsor logo">
                            </div>
                            <div class="sponsors-logo">
                                <img src="{{asset('dist-front/images/partner-4.png')}}" class="img-responsive" alt="sponsor logo">
                            </div>
                            <div class="sponsors-logo">
                                <img src="{{asset('dist-front/images/partner-5.png')}}" class="img-responsive" alt="sponsor logo">
                            </div>
                            <div class="sponsors-logo">
                                <img src="{{asset('dist-front/images/partner-6.png')}}" class="img-responsive" alt="sponsor logo">
                            </div>
                            <div class="sponsors-logo">
                                <img src="{{asset('dist-front/images/partner-7.png')}}" class="img-responsive" alt="sponsor logo">
                            </div>
                            <div class="sponsors-logo">
                                <img src="{{asset('dist-front/images/partner-8.png')}}" class="img-responsive" alt="sponsor logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="main-footer"> 
            <div class="widgets-section">
                <div class="container">
                    <div class="clearfix"> 
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">

                                <div class="footer-column col-lg-2 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h2>Links</h2>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li><a href="index.html">Home</a></li>
                                                <li><a href="sponsors.html">Sponsors</a></li>
                                                <li><a href="speakers.html">Speakers</a></li>
                                                <li><a href="organizers.html">Organizers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="footer-column col-lg-2 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h2>Pages</h2>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li><a href="terms.html">Terms of Use</a></li>
                                                <li><a href="privacy.html">Privacy Policy</a></li>
                                                <li><a href="schedule.html">Schedule</a></li>
                                                <li><a href="contact.html">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="footer-column col-lg-4 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h2>Contact</h2>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li>Address: 34, Park Street, NYC, USA</li>
                                                <li>Email: contact@example.com</li>
                                                <li>Phone: 123-322-1248</li>
                                            </ul>
                                            <ul class="social-icon mt_15">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                        
                                <div class="footer-column col-lg-4 col-sm-6 col-xs-12">
                                    <div class="footer-widget subscribe-widget">
                                        <h2>Newsletter</h2>
                                        <div class="widget-content">
                                            <div class="newsletter-form">
                                                <form method="post" action="">
                                                    <div class="form-group">
                                                        <input type="email" name="email" value="" placeholder="Enter Email Address" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="global_btn"><a class="btn_two" href="#">SUBSCRIBE</a> </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="auto-container container">
                <div class="text">Copyright 2024, SingleEvent. All Rights Reserved.</div>
                </div>
            </div>
        </footer>

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
        <script src="{{asset('dist-front/js/custom.js')}}"></script>
        <script>
            $(".countDown").downCount({
                date: '08/25/2024 12:00:00', //month/date/year   HH:MM:SS
                offset: +6 //+GMT
            });
        </script>
    </body>
</html>