<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontViewController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CommitteeController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\LoseMemberController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EventPaymentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Member\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//___________________________________// START \\______________________________________________//
Route::get('/', [FrontViewController::class, 'welcome'])->name('/');

/**______________________________________________________________________________________________
 * View Pages => ALL
 * ______________________________________________________________________________________________
 */
Route::get('comming/soon', [FrontViewController::class, 'welcome'])->name('comming_soon');
//______________ ABOUT US

//______________ COMMITTEE

//______________ MEMBERS

//______________ EVENTS

//______________ CONTACT US
Route::get('pages/contact', [FrontViewController::class, 'contact'])->name('page.contact');




/**______________________________________________________________________________________________
 * Login Check => Dashboard
 * ______________________________________________________________________________________________
 */
Route::middleware([ 'auth:sanctum','verified','member', config('jetstream.auth_session')])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
});

/* Apply Membership */
Route::get('/member-register/index', [MemberController::class,'create'])->name('member_register.index');
Route::get('/member-register/create', [MemberController::class,'create'])->name('member_register.create');
Route::post('/member-register/store', [MemberController::class,'store'])->name('member_register.store');

/* Membership check */
Route::group(['middleware' => ['verified']], function () {
    Route::get('/register-payment/create', [PaymentController::class, 'register_create'])->name('register-payment.create');
    Route::post('/register-payment/store', [PaymentController::class, 'register_store'])->name('register-payment.store');
});

/* Member Register Information */
Route::group(['middleware' => ['auth']], function(){
    Route::get('/member/not/approved', [MemberController::class,'not_approved'])->name('member.not_approved');
    Route::patch('/member/{id}/approved', [MemberController::class,'approved'])->name('member.approved');
    Route::get('/member/details/{id}', [MemberController::class,'fv_member_details'])->name('page.member_details');
});































Route::get('/about', function (){return view('frontend.pages.about');})->name('page.about');
Route::get('/contact/show', function (){return view('frontend.pages.contact');})->name('contact');
Route::get('/member/lose', function (){return view('frontend.pages.member_lose');})->name('page.member_lose');
Route::get('/gallery/video', function (){return view('frontend.pages.gallery_video');})->name('page.gallery_video');




/*
|--------------------------------------------------------------------------
| Profile Setting
|--------------------------------------------------------------------------
*/
Route::get('member_prifile/details/{id}', [ProfileController::class, 'profile_show'])->name('profile_show');
Route::put('member_prifile/other_info/{id}/update', [ProfileController::class, 'infoOtherUpdate'])->name('info_other.update');
Route::post('member_prifile/change-password/{id}', [ProfileController::class, 'changePassword'])->name('change.password');
Route::get('info_member/edit/{id}', [ProfileController::class, 'member_edit'])->name('info_member.edit');
Route::post('info_member/update/{id}', [ProfileController::class, 'member_update'])->name('info_member.update');
Route::delete('info_member/family_info/destroy/{id}', [ProfileController::class, 'info_family_destroy'])->name('info_family.destroy');



Route::put('/information/{user}', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/password/{user}', [ProfileController::class, 'password'])->name('profile.password');
Route::get('/information/edit', [ProfileController::class, 'information_edit'])->name('information.edit');



/*______________________ Gallery __________________*/
Route::group(['middleware' => ['auth']], function(){
    Route::resource('gallery', GalleryController::class);
    Route::delete('/destroy/{id}',[GalleryController::class,'destroy'])->name('gallery.destroy');
    Route::delete('/deleteimage/{id}',[GalleryController::class,'deleteimage'])->name('gallery.deleteimage');
    Route::delete('/deletecover/{id}',[GalleryController::class,'deletecover'])->name('gallery.deletecover');
    
    
    Route::get('/backend_gallery',[GalleryController::class,'bv_gallery_image'])->name('layouts.gallery_image');
    Route::get('/backend_gallery_show/{id}',[GalleryController::class,'bv_gallery_show'])->name('layouts.gallery_show');
});
//---Website View
Route::get('/gallery_image',[GalleryController::class,'fv_gallery_image'])->name('page.gallery_image');
Route::get('/gallery_show/{id}',[GalleryController::class,'fv_gallery_show'])->name('page.gallery_show');

Route::get('/download/{id}', [GalleryController::class, 'downloadFile'])->name('gallery.download');
Route::get('/dowloads', [GalleryController::class, 'dowloads']);



//---Website View
Route::get('/advisor', [MemberController::class,'fv_adviser'])->name('fv.advisor');
Route::get('/ecommittee', [MemberController::class,'fv_executive_committee'])->name('fv.executive_committee');
Route::get('/welfare', [MemberController::class,'fv_welfare'])->name('fv.welfare');
Route::get('/member/list', [MemberController::class,'fv_member_all'])->name('page.member_list');

/*___________ Committee Member __________*/
Route::group(['middleware' => ['auth']], function(){
    Route::get('/bv_advisor', [MemberController::class,'bv_adviser'])->name('bv.advisor');
    Route::get('/bv_ecommittee', [MemberController::class,'bv_executive_committee'])->name('bv.executive_committee');
    Route::get('/bv_welfare', [MemberController::class,'bv_welfare'])->name('bv.welfare');
    Route::get('/bv_member/list', [MemberController::class,'bv_member_all'])->name('bv.member_list');
});
/*___________Member Register Information __________*/
Route::group(['middleware' => ['auth']], function(){
    Route::resource('committee', CommitteeController::class);
});
/*___________ Subscription Information __________*/
Route::group(['middleware' => ['auth']], function(){
    Route::resource('subscription', SubscriptionController::class);
});
Route::get ('/subscription_approve_list', [SubscriptionController::class,'subscription_approve_list'])->name('subscription_approve_list');
Route::patch ('/subscription_approve/{id}', [SubscriptionController::class,'subscription_approve'])->name('subscription_approve.update');
Route::patch ('/subscription_cancel/{id}', [SubscriptionController::class,'subscription_cancel'])->name('subscription_cancel.update');
/*___________ Lose Member __________*/
Route::group(['middleware' => ['auth']], function(){
    Route::resource('lose_member', LoseMemberController::class);
});
/*___________ Event Information __________*/
Route::group(['middleware' => ['auth']], function(){
    Route::resource('event', EventController::class);

    Route::get('/event_payment', [EventPaymentController::class,'index'])->name('event_payment.index');
    Route::get('/event_payment/create/{id}', [EventPaymentController::class,'create'])->name('event_payment.create');
    Route::post('/event_payment/store/{id}', [EventPaymentController::class,'store'])->name('event_payment.store');
    Route::get('/event_payment/edit/{id}', [EventPaymentController::class,'edit'])->name('event_payment.edit');
    Route::put('/event_payment/update/{id}', [EventPaymentController::class,'update'])->name('event_payment.update');
    Route::get('/event_payment/{id}/destroy', [EventPaymentController::class,'destroy'])->name('event_payment.destroy');

    Route::get('/events_register/from/{id}', [EventController::class,'register_create'])->name('events_register');
    Route::post('/events_register/store/{id}', [EventController::class,'event_register'])->name('events_register.store');

    Route::get('/event_registation_list', [EventController::class,'event_registation_list'])->name('event_registation_list');
    Route::get('/event_approve_list', [EventController::class,'event_approve_list'])->name('event_approve_list');
    Route::patch ('/approve_event/update/{id}', [EventController::class,'approve_event_fee'])->name('approve_event_fee.update');
    Route::patch ('/cancel_event_fee/update/{id}', [EventController::class,'cancel_event_fee'])->name('cancel_event_fee.update');
});
//---Website View
Route::get('/events', [EventController::class,'fv_event'])->name('page.events');
Route::get('/events/details/{id}', [EventController::class,'fv_event_show'])->name('page.events_details');


/*___________ Contact __________*/
Route::group(['middleware' => ['auth']], function(){
    Route::resource('contact', ContactController::class);
    Route::get('/contact_chat/{id}', [ContactController::class,'chat'])->name('contact_chat');
    Route::post('/admin_reply/{to_id}', [ContactController::class,'admin_reply'])->name('admin_reply.contact');
});