<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminHomeBannerController;
use App\Http\Controllers\Admin\AdminHomeWelcomeController;
use App\Http\Controllers\Admin\AdminHomeCounterController;
use App\Http\Controllers\Admin\AdminSpeakerController;
use App\Http\Controllers\Admin\AdminScheduleDayController;
use App\Http\Controllers\Admin\AdminScheduleController;
use App\Http\Controllers\Admin\AdminSpeakerScheduleController;
use App\Http\Controllers\Admin\AdminSponsorCategoryController;
use App\Http\Controllers\Admin\AdminSponsorController;
use App\Http\Controllers\Admin\AdminOrganiserController;
use App\Http\Controllers\Admin\AdminAccomodationController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPackageController;

use App\Http\Controllers\Front\FrontController;

// Home
 Route::get('/', [FrontController::class, 'home'])->name('home');
 Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
 Route::get('/speakers', [FrontController::class, 'speakers'])->name('speakers');
 Route::get('/speaker/{slug}', [FrontController::class, 'speaker'])->name('speaker');
 Route::get('/schedule', [FrontController::class, 'schedule'])->name('schedule');
 Route::get('/sponsors', [FrontController::class, 'sponsors'])->name('sponsors');
 Route::get('/sponsor/{slug}', [FrontController::class, 'sponsor'])->name('sponsor');
 Route::get('/organisers', [FrontController::class, 'organisers'])->name('organisers');
 Route::get('/organiser/{slug}', [FrontController::class, 'organiser'])->name('organiser');
 Route::get('/accomodations', [FrontController::class, 'accomodations'])->name('accomodations');
 Route::get('/photo-gallery', [FrontController::class, 'photo_gallery'])->name('photo_gallery');
 Route::get('/video-gallery', [FrontController::class, 'video_gallery'])->name('video_gallery');
 Route::get('/faq', [FrontController::class, 'faq'])->name('faq');
 Route::get('/testimonial', [FrontController::class, 'testimonial'])->name('testimonial');
 Route::get('/post/{slug}', [FrontController::class, 'post'])->name('post');
 Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
 Route::get('/pricing',[FrontController::class,'pricing'])->name('pricing');
 Route::get('/login', [FrontController::class, 'login'])->name('login');
 Route::post('/login', [FrontController::class, 'login_submit'])->name('login_submit');
 Route::get('/registration', [FrontController::class, 'registration'])->name('registration');
 Route::post('/registration', [FrontController::class, 'registration_submit'])->name('registration_submit');
 Route::get('/registration-verify/{email}/{token}', [FrontController::class, 'registration_verify'])->name('registration_verify');
 Route::get('/logout', [FrontController::class, 'logout'])->name('logout');
 Route::get('/forget-password', [FrontController::class, 'forget_password'])->name('forget_password');
 Route::post('/forget-password', [FrontController::class, 'forget_password_submit'])->name('forget_password_submit');
 Route::get('/reset-password/{token}/{email}', [FrontController::class, 'reset_password'])->name('reset_password');
 Route::post('/reset-password/{token}/{email}', [FrontController::class, 'reset_password_submit'])->name('reset_password_submit');


 // User or Attendee 

Route::middleware('auth')->prefix('attendee')->group(function(){
    // secrete pages then you can not have the access with out login
  Route::get('/profile', [FrontController::class, 'profile'])->name('attendee_profile');
  Route::post('/profile', [FrontController::class, 'profile_submit'])->name('attendee_profile_submit');
  Route::get('/dashboard', [FrontController::class, 'dashboard'])->name('attendee_dashboard');
  Route::get('/buy/ticket/{id}',[FrontController::class,'buy_ticket'])->name('buy_ticket');
  Route::post('/payment',[FrontController::class,'payment'])->name('payment');
  Route::get('/paypal/success', [FrontController::class, 'paypal_success'])->name('paypal_success');
  Route::get('/paypal/cancel', [FrontController::class, 'paypal_cancel'])->name('paypal_cancel');
  Route::get('/stripe/success', [FrontController::class, 'stripe_success'])->name('stripe_success');
  Route::get('/stripe/cancel', [FrontController::class, 'stripe_cancel'])->name('stripe_cancel');


});



 
 // Admin 

Route::middleware('admin')->prefix('admin')->group(function(){
    // secrete pages then you can not have the access with out login
  Route::get('/profile', [AdminAuthController::class, 'profile'])->name('admin_profile');
  Route::post('/profile', [AdminAuthController::class, 'profile_submit'])->name('admin_profile_submit');
  Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin_dashboard');
  Route::get('/home-banner', [AdminHomeBannerController::class, 'index'])->name('admin_home_banner');
  Route::post('/home-banner', [AdminHomeBannerController::class, 'update'])->name('admin_home_banner_update');
  Route::get('/home-welcome', [AdminHomeWelcomeController::class, 'index'])->name('admin_home_welcome');
  Route::post('/home-welcome', [AdminHomeWelcomeController::class, 'update'])->name('admin_home_welcome_update');
  Route::get('/home-counter', [AdminHomeCounterController::class, 'index'])->name('admin_home_counter');
  Route::post('/home-counter', [AdminHomeCounterController::class, 'update'])->name('admin_home_counter_update');
  // Speaker
  Route::get('/speaker/index', [AdminSpeakerController::class, 'index'])->name('admin_speaker_index');
  Route::get('/speaker/create', [AdminSpeakerController::class, 'create'])->name('admin_speaker_create');
  Route::get('/speaker/edit/{id}', [AdminSpeakerController::class, 'edit'])->name('admin_speaker_edit');
  Route::post('/speaker/update/{id}', [AdminSpeakerController::class, 'update'])->name('admin_speaker_update');
  Route::get('/speaker/delete/{id}', [AdminSpeakerController::class, 'delete'])->name('admin_speaker_delete');
  Route::post('/speaker/store', [AdminSpeakerController::class, 'store'])->name('admin_speaker_store');
  // Schedule Day
  Route::get('/schedule-day/index', [AdminScheduleDayController::class, 'index'])->name('admin_schedule_day_index');
  Route::get('/schedule-day/create', [AdminScheduleDayController::class, 'create'])->name('admin_schedule_day_create');
  Route::get('/schedule-day/edit/{id}', [AdminScheduleDayController::class, 'edit'])->name('admin_schedule_day_edit');
  Route::post('/schedule-day/update/{id}', [AdminScheduleDayController::class, 'update'])->name('admin_schedule_day_update');
  Route::get('/schedule-day/delete/{id}', [AdminScheduleDayController::class, 'delete'])->name('admin_schedule_day_delete');
  Route::post('/schedule-day/store', [AdminScheduleDayController::class, 'store'])->name('admin_schedule_day_store');
  // Schedule
  Route::get('/schedule/index', [AdminScheduleController::class, 'index'])->name('admin_schedule_index');
  Route::get('/schedule/create', [AdminScheduleController::class, 'create'])->name('admin_schedule_create');
  Route::get('/schedule/edit/{id}', [AdminScheduleController::class, 'edit'])->name('admin_schedule_edit');
  Route::post('/schedule/update/{id}', [AdminScheduleController::class, 'update'])->name('admin_schedule_update');
  Route::get('/schedule/delete/{id}', [AdminScheduleController::class, 'delete'])->name('admin_schedule_delete');
  Route::post('/schedule/store', [AdminScheduleController::class, 'store'])->name('admin_schedule_store');

  // speaker schedule 
   Route::get('/speaker-schedule/index', [AdminSpeakerScheduleController::class, 'index'])->name('admin_speaker_schedule_index');
   Route::post('/speaker-schedule/store', [AdminSpeakerScheduleController::class, 'store'])->name('admin_speaker_schedule_store');
   Route::get('/speaker-schedule/delete/{id}', [AdminSpeakerScheduleController::class, 'delete'])->name('admin_speaker_schedule_delete');
  
  // Sponsor Category
  Route::get('/sponsor-category/index', [AdminSponsorCategoryController::class, 'index'])->name('admin_sponsor_category_index');
  Route::get('/sponsor-category/create', [AdminSponsorCategoryController::class, 'create'])->name('admin_sponsor_category_create');
  Route::get('/sponsor-category/edit/{id}', [AdminSponsorCategoryController::class, 'edit'])->name('admin_sponsor_category_edit');
  Route::post('/sponsor-category/update/{id}', [AdminSponsorCategoryController::class, 'update'])->name('admin_sponsor_category_update');
  Route::get('/sponsor-category/delete/{id}', [AdminSponsorCategoryController::class, 'delete'])->name('admin_sponsor_category_delete');
  Route::post('/sponsor-category/store', [AdminSponsorCategoryController::class, 'store'])->name('admin_sponsor_category_store');
  // Sponsor
  Route::get('/sponsor/index', [AdminSponsorController::class, 'index'])->name('admin_sponsor_index');
  Route::get('/sponsor/create', [AdminSponsorController::class, 'create'])->name('admin_sponsor_create');
  Route::get('/sponsor/edit/{id}', [AdminSponsorController::class, 'edit'])->name('admin_sponsor_edit');
  Route::post('/sponsor/update/{id}', [AdminSponsorController::class, 'update'])->name('admin_sponsor_update');
  Route::get('/sponsor/delete/{id}', [AdminSponsorController::class, 'delete'])->name('admin_sponsor_delete');
  Route::post('/sponsor/store', [AdminSponsorController::class, 'store'])->name('admin_sponsor_store');
  // Organiser
  Route::get('/organiser/index', [AdminOrganiserController::class, 'index'])->name('admin_organiser_index');
  Route::get('/organiser/create', [AdminOrganiserController::class, 'create'])->name('admin_organiser_create');
  Route::get('/organiser/edit/{id}', [AdminOrganiserController::class, 'edit'])->name('admin_organiser_edit');
  Route::post('/organiser/update/{id}', [AdminOrganiserController::class, 'update'])->name('admin_organiser_update');
  Route::get('/organiser/delete/{id}', [AdminOrganiserController::class, 'delete'])->name('admin_organiser_delete');
  Route::post('/organiser/store', [AdminOrganiserController::class, 'store'])->name('admin_organiser_store');
  // Accomodation
  Route::get('/accomodation/index', [AdminAccomodationController::class, 'index'])->name('admin_accomodation_index');
  Route::get('/accomodation/create', [AdminAccomodationController::class, 'create'])->name('admin_accomodation_create');
  Route::get('/accomodation/edit/{id}', [AdminAccomodationController::class, 'edit'])->name('admin_accomodation_edit');
  Route::post('/accomodation/update/{id}', [AdminAccomodationController::class, 'update'])->name('admin_accomodation_update');
  Route::get('/accomodation/delete/{id}', [AdminAccomodationController::class, 'delete'])->name('admin_accomodation_delete');
  Route::post('/accomodation/store', [AdminAccomodationController::class, 'store'])->name('admin_accomodation_store');
  // Photo Gallery
  Route::get('/photo/index', [AdminPhotoController::class, 'index'])->name('admin_photo_index');
  Route::get('/photo/create', [AdminPhotoController::class, 'create'])->name('admin_photo_create');
  Route::get('/photo/edit/{id}', [AdminPhotoController::class, 'edit'])->name('admin_photo_edit');
  Route::post('/photo/update/{id}', [AdminPhotoController::class, 'update'])->name('admin_photo_update');
  Route::get('/photo/delete/{id}', [AdminPhotoController::class, 'delete'])->name('admin_photo_delete');
  Route::post('/photo/store', [AdminPhotoController::class, 'store'])->name('admin_photo_store');
  // Video Gallery
  Route::get('/video/index', [AdminVideoController::class, 'index'])->name('admin_video_index');
  Route::get('/video/create', [AdminVideoController::class, 'create'])->name('admin_video_create');
  Route::get('/video/edit/{id}', [AdminVideoController::class, 'edit'])->name('admin_video_edit');
  Route::post('/video/update/{id}', [AdminVideoController::class, 'update'])->name('admin_video_update');
  Route::get('/video/delete/{id}', [AdminVideoController::class, 'delete'])->name('admin_video_delete');
  Route::post('/video/store', [AdminVideoController::class, 'store'])->name('admin_video_store');
  // Faq
  Route::get('/faq/index', [AdminFaqController::class, 'index'])->name('admin_faq_index');
  Route::get('/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
  Route::get('/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
  Route::post('/faq/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
  Route::get('/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');
  Route::post('/faq/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
  // Testimonial
  Route::get('/testimonial/index', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_index');
  Route::get('/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
  Route::get('/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
  Route::post('/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
  Route::get('/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');
  Route::post('/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
  // Post
  Route::get('/post/index', [AdminPostController::class, 'index'])->name('admin_post_index');
  Route::get('/post/create', [AdminPostController::class, 'create'])->name('admin_post_create');
  Route::get('/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
  Route::post('/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
  Route::get('/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');
  Route::post('/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
  // Package
  Route::get('/package/index', [AdminPackageController::class, 'index'])->name('admin_package_index');
  Route::get('/package/create', [AdminPackageController::class, 'create'])->name('admin_package_create');
  Route::get('/package/edit/{id}', [AdminPackageController::class, 'edit'])->name('admin_package_edit');
  Route::post('/package/update/{id}', [AdminPackageController::class, 'update'])->name('admin_package_update');
  Route::get('/package/delete/{id}', [AdminPackageController::class, 'delete'])->name('admin_package_delete');
  Route::post('/package/store', [AdminPackageController::class, 'store'])->name('admin_package_store');
  Route::get('/package/facility/delete/{id}',[AdminPackageController::class,'facility_delete'])->name('admin_package_facility_delete');
  Route::get('/package/facility/edit/{id}',[AdminPackageController::class,'facility_edit'])->name('admin_package_facility_edit');
  Route::post('/package/facility/update/{id}',[AdminPackageController::class,'facility_update'])->name('admin_package_facility_update');

});




Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::post('/login', [AdminAuthController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');
    Route::get('/forget-password', [AdminAuthController::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password', [AdminAuthController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

    
});
