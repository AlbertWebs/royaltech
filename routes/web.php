<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\DemoController;

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

Route::get('/home', function () {
    return view('welcome');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/the-company', [App\Http\Controllers\HomeController::class, 'company'])->name('company');
Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contact_us'])->name('contact-us');
Route::get('/center-of-excellence/{slung}', [App\Http\Controllers\HomeController::class, 'center_of_excellence'])->name('center-of-excellence');
Route::get('/laptops-for-hire', [App\Http\Controllers\HomeController::class, 'laptops_for_hire'])->name('laptops-for-hire');
Route::get('/copyright', [App\Http\Controllers\HomeController::class, 'copyright'])->name('copyright');
Route::get('/terms-and-conditions', [App\Http\Controllers\HomeController::class, 'terms_and_conditions'])->name('terms-and-conditions');
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy_policy'])->name('privacy-policy');

Route::get('/blogs/{slung}', [App\Http\Controllers\HomeController::class, 'blogs'])->name('blogs');

Route::get('/show', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::get('/show', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::post('/laptops-for-hire', [App\Http\Controllers\HomeController::class, 'hire'])->name('hire');
Route::get('/macbook-for-hire', [App\Http\Controllers\HomeController::class, 'macbooks_for_hire'])->name('macbook');
Route::get('/tablets-for-hire', [App\Http\Controllers\HomeController::class, 'tablets_for_hire'])->name('tablets');
Route::get('/projectors-for-hire', [App\Http\Controllers\HomeController::class, 'projectors_for_hire'])->name('projectors-for-hire');
Route::post('/send-message', [App\Http\Controllers\HomeController::class, 'message'])->name('message');
Route::get('/url', [App\Http\Controllers\HomeController::class, 'has_url'])->name('has_url');
Route::get('/recommended', [App\Http\Controllers\HomeController::class, 'hire'])->name('hire-secondary');



// Ecommerce
Route::group(['prefix'=>'e-commerce'], function(){
    Route::get('/', [App\Http\Controllers\ShopController::class, 'index'])->name('home');
    Route::get('/quick-view/{slung}', [App\Http\Controllers\ShopController::class, 'quick_view'])->name('quick-view');
    Route::get('/product/{slung}', [App\Http\Controllers\ShopController::class, 'product'])->name('product');
    Route::get('/product/brand/{slung}', [App\Http\Controllers\ShopController::class, 'brand'])->name('product_brand');
    Route::get('/product/tags/{slung}', [App\Http\Controllers\ShopController::class, 'tags'])->name('product_tags');

    Route::get('/search-results',[App\Http\Controllers\ShopController::class, 'searchsite'])->name('search-results');

    Route::group(['prefix'=>'shopping-cart'], function(){
        Route::get('/', [App\Http\Controllers\ShopController::class, 'cart'])->name('cart.list');
        Route::get('/checkout', [App\Http\Controllers\ShopController::class, 'checkout'])->name('checkout');
        Route::get('/remove/{id}', [App\Http\Controllers\ShopController::class, 'removeCart'])->name('removeCart');
        Route::get('/add-to-cart/{slung}', [App\Http\Controllers\ShopController::class, 'add_to_cart'])->name('add-to-cart');
        Route::get('/add-to-wishlist/{slung}', [App\Http\Controllers\ShopController::class, 'add_to_wishlist'])->name('add-to-wishlist');
        Route::post('/checkout/update-data', [App\Http\Controllers\ShopController::class, 'update'])->name('checkout-update'); //Updates Data
        Route::get('/checkout/make-payment', [App\Http\Controllers\ShopController::class, 'make_payments'])->name('payment'); //Updates Data
        Route::post('/checkout/make-payments', [App\Http\Controllers\ShopController::class, 'make_payment'])->name('checkouts');


    });
});

Route::get('/home', [App\Http\Controllers\ShopController::class, 'checkout'])->name('home');

Route::group(['prefix'=>'dashboard'], function(){
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/order-history', [App\Http\Controllers\DashboardController::class, 'history'])->name('history');
    Route::get('/order-history/{order}', [App\Http\Controllers\DashboardController::class, 'history_expand'])->name('history-with-order-number');
    Route::get('/transaction-history', [App\Http\Controllers\DashboardController::class, 'transaction'])->name('transaction');
    Route::post('/update-info', [App\Http\Controllers\DashboardController::class, 'update'])->name('update');
});



// Authentication Routes
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('admin/', [AdminsController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('admin/home', [AdminsController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// SiteSettings
Route::get('admin/credentials', [AdminsController::class, 'systemsCredentials'])->middleware('is_admin');
Route::get('admin/SiteSettings', [AdminsController::class, 'SiteSettings'])->middleware('is_admin');
Route::get('admin/SocialMediaSettings', [AdminsController::class, 'SocialMediaSettings'])->middleware('is_admin');
Route::get('admin/logo-and-favicon', [AdminsController::class, 'logo_and_favicon'])->middleware('is_admin');
Route::post('admin/logo-and-favicon-update', [AdminsController::class, 'logo_and_favicon_update'])->middleware('is_admin');

// mailerSettings
Route::get('admin/mailerSettings', [AdminsController::class, 'mailerSettings'])->middleware('is_admin');

// Terms and Conditions
Route::get('admin/terms', [AdminsController::class, 'terms'])->middleware('is_admin');
Route::get('admin/addTerms', [AdminsController::class, 'addTerms'])->middleware('is_admin');
Route::get('admin/editTerm/{id}', [AdminsController::class, 'editTerm'])->middleware('is_admin');
Route::post('admin/add_term', [AdminsController::class, 'add_term'])->middleware('is_admin');
Route::post('admin/edit_term/{id}', [AdminsController::class, 'edit_term'])->middleware('is_admin');
Route::get('admin/delete_term/{id}', [AdminsController::class, 'delete_term'])->middleware('is_admin');

// Privacy Policy
Route::get('admin/privacy', [AdminsController::class, 'privacy'])->middleware('is_admin');
Route::get('admin/addPrivacy', [AdminsController::class, 'addPrivacy'])->middleware('is_admin');
Route::get('admin/editPrivacy/{id}', [AdminsController::class, 'editPrivacy'])->middleware('is_admin');
Route::post('admin/add_privacy', [AdminsController::class, 'add_privacy'])->middleware('is_admin');
Route::post('admin/edit_privacy/{id}', [AdminsController::class, 'edit_privacy'])->middleware('is_admin');
Route::get('admin/delete_privacy/{id}', [AdminsController::class, 'delete_privacy'])->middleware('is_admin');

// Frequently Asked Questions
Route::get('admin/faq', [AdminsController::class, 'faq'])->middleware('is_admin');
Route::get('admin/addFaq', [AdminsController::class, 'addFaq'])->middleware('is_admin');
Route::get('admin/editFaq/{id}', [AdminsController::class, 'editFaq'])->middleware('is_admin');
Route::post('admin/add_Faq', [AdminsController::class, 'add_Faq'])->middleware('is_admin');
Route::post('admin/edit_Faq/{id}', [AdminsController::class, 'edit_Faq'])->middleware('is_admin');
Route::get('admin/delete_Faq/{id}', [AdminsController::class, 'delete_Faq'])->middleware('is_admin');

// Risks Declaration
Route::get('admin/editRisk', [AdminsController::class, 'editRisk'])->middleware('is_admin');
Route::post('admin/edit_Risk', [AdminsController::class, 'edit_Risk'])->middleware('is_admin');

// How It Works
Route::get('admin/how', [AdminsController::class, 'how'])->middleware('is_admin');
Route::get('admin/addHow', [AdminsController::class, 'addHow'])->middleware('is_admin');
Route::get('admin/editHow/{id}', [AdminsController::class, 'editHow'])->middleware('is_admin');
Route::post('admin/add_How', [AdminsController::class, 'add_How'])->middleware('is_admin');
Route::post('admin/edit_How/{id}', [AdminsController::class, 'edit_How'])->middleware('is_admin');
Route::get('admin/delete_How/{id}', [AdminsController::class, 'delete_How'])->middleware('is_admin');

// Courses
Route::get('admin/courses', [AdminsController::class, 'courses'])->middleware('is_admin');
Route::get('admin/addCourse', [AdminsController::class, 'addCourse'])->middleware('is_admin');
Route::get('admin/editCourse/{id}', [AdminsController::class, 'editCourse'])->middleware('is_admin');
Route::post('admin/add_Course', [AdminsController::class, 'add_Course'])->middleware('is_admin');
Route::post('admin/edit_Course/{id}', [AdminsController::class, 'edit_Course'])->middleware('is_admin');
Route::get('admin/delete_Course/{id}', [AdminsController::class, 'delete_Course'])->middleware('is_admin');

// Topics
Route::get('admin/topics', [AdminsController::class, 'topics'])->middleware('is_admin');
Route::get('admin/addTopic', [AdminsController::class, 'addTopic'])->middleware('is_admin');
Route::get('admin/editTopic/{id}', [AdminsController::class, 'editTopic'])->middleware('is_admin');
Route::post('admin/add_Topic', [AdminsController::class, 'add_Topic'])->middleware('is_admin');
Route::post('admin/edit_Topic/{id}', [AdminsController::class, 'edit_Topic'])->middleware('is_admin');
Route::get('admin/delete_Topic/{id}', [AdminsController::class, 'delete_Topic'])->middleware('is_admin');

// Copyright Statement
Route::get('admin/editCopyright', [AdminsController::class, 'copyright'])->middleware('is_admin');
Route::post('admin/edit_Copyright', [AdminsController::class, 'edit_copyright'])->middleware('is_admin');

// About Us
Route::get('admin/editAbout', [AdminsController::class, 'about'])->middleware('is_admin');
Route::post('admin/edit_About', [AdminsController::class, 'edit_about'])->middleware('is_admin');

// Sliders
Route::get('admin/sliders', [AdminsController::class, 'slider'])->middleware('is_admin');
Route::get('admin/addSlider', [AdminsController::class, 'addSlider'])->middleware('is_admin');
Route::post('admin/add_Slider', [AdminsController::class, 'add_Slider'])->middleware('is_admin');
Route::get('admin/editSlider/{id}', [AdminsController::class, 'editSlider'])->middleware('is_admin');
Route::post('admin/edit_Slider/{id}', [AdminsController::class, 'edit_Slider'])->middleware('is_admin');
Route::get('admin/deleteSlider/{id}', [AdminsController::class, 'deleteSlider'])->middleware('is_admin');

// Banners
Route::get('admin/banners', [AdminsController::class, 'banners'])->middleware('is_admin');
Route::get('admin/editBanner/{id}', [AdminsController::class, 'editBanner'])->middleware('is_admin');
Route::post('admin/edit_Banner/{id}', [AdminsController::class, 'edit_Banner'])->middleware('is_admin');

// Messages
Route::get('admin/allMessages', [AdminsController::class, 'allMessages'])->middleware('is_admin');
Route::get('admin/unread', [AdminsController::class, 'unread'])->middleware('is_admin');
Route::post('admin/reply/{id}', [AdminsController::class, 'reply'])->middleware('is_admin');
Route::get('admin/read/{id}', [AdminsController::class, 'read'])->middleware('is_admin');
Route::get('admin/deleteMessage/{id}', [AdminsController::class, 'deleteMessage'])->middleware('is_admin');

// Categories
Route::get('admin/categories', [AdminsController::class, 'categories'])->middleware('is_admin');
Route::get('admin/addCategory', [AdminsController::class, 'addCategory'])->middleware('is_admin');
Route::post('admin/add_Category', [AdminsController::class, 'add_Category'])->middleware('is_admin');
Route::get('admin/editCategories/{id}', [AdminsController::class, 'editCategories'])->middleware('is_admin');
Route::post('admin/edit_Category/{id}', [AdminsController::class, 'edit_Category'])->middleware('is_admin');
Route::get('admin/deleteCategory/{id}', [AdminsController::class, 'deleteCategory'])->middleware('is_admin');

// Brands Brands
Route::get('admin/brands', [AdminsController::class, 'brands'])->middleware('is_admin');
Route::get('admin/addBrand', [AdminsController::class, 'addBrand'])->middleware('is_admin');
Route::post('admin/add_Brand', [AdminsController::class, 'add_Brand'])->middleware('is_admin');
Route::get('admin/editBrands/{id}', [AdminsController::class, 'editBrands'])->middleware('is_admin');
Route::post('admin/edit_Brand/{id}', [AdminsController::class, 'edit_Brand'])->middleware('is_admin');
Route::get('admin/deleteBrand/{id}', [AdminsController::class, 'deleteBrand'])->middleware('is_admin');

// Products
Route::get('admin/products', [AdminsController::class, 'products'])->middleware('is_admin');
Route::get('admin/addProduct', [AdminsController::class, 'addProduct'])->middleware('is_admin');
Route::post('admin/add_Product', [AdminsController::class, 'add_Product'])->middleware('is_admin');
Route::get('admin/editProducts/{id}', [AdminsController::class, 'editProducts'])->middleware('is_admin');
Route::post('admin/edit_Product/{id}', [AdminsController::class, 'edit_Product'])->middleware('is_admin');
Route::get('admin/deleteProduct/{id}', [AdminsController::class, 'deleteProduct'])->middleware('is_admin');

// services
Route::get('admin/services', [AdminsController::class, 'services'])->middleware('is_admin');
Route::get('admin/addservice', [AdminsController::class, 'addservice'])->middleware('is_admin');
Route::post('admin/add_service', [AdminsController::class, 'add_service'])->middleware('is_admin');
Route::get('admin/editService/{id}', [AdminsController::class, 'editservices'])->middleware('is_admin');
Route::post('admin/edit_Service/{id}', [AdminsController::class, 'edit_service'])->middleware('is_admin');
Route::get('admin/deleteservice/{id}', [AdminsController::class, 'deleteservice'])->middleware('is_admin');



Route::post('admin/add_Variation', [AdminsController::class, 'add_Variation'])->middleware('is_admin');
Route::post('admin/edit_Variation/{id}', [AdminsController::class, 'edit_Variation'])->middleware('is_admin');
Route::get('admin/addVariation/color', [AdminsController::class, 'variations_color'])->middleware('is_admin');
Route::get('admin/addVariation/size', [AdminsController::class, 'variations_size'])->middleware('is_admin');
Route::get('admin/variations/color', [AdminsController::class, 'var_color'])->middleware('is_admin');
Route::get('admin/variations/size', [AdminsController::class, 'var_size'])->middleware('is_admin');
Route::get('admin/editVariation/{id}', [AdminsController::class, 'editVariation'])->middleware('is_admin');

// Categories
Route::get('admin/categories', [AdminsController::class, 'categories'])->middleware('is_admin');
Route::get('admin/addCategory', [AdminsController::class, 'addCategory'])->middleware('is_admin');
Route::post('admin/add_Category', [AdminsController::class, 'add_Category'])->middleware('is_admin');
Route::get('admin/editCategories/{id}', [AdminsController::class, 'editCategories'])->middleware('is_admin');
Route::post('admin/edit_Category/{id}', [AdminsController::class, 'edit_Category'])->middleware('is_admin');
Route::get('admin/deleteCategory/{id}', [AdminsController::class, 'deleteCategory'])->middleware('is_admin');

// Testimonials
Route::get('admin/testimonials', [AdminsController::class, 'testimonials'])->middleware('is_admin');
Route::get('admin/addTestimonial', [AdminsController::class, 'addTestimonial'])->middleware('is_admin');
Route::post('admin/add_Testimonial', [AdminsController::class, 'add_Testimonial'])->middleware('is_admin');
Route::get('admin/editTestimonial/{id}', [AdminsController::class, 'editTestimonial'])->middleware('is_admin');
Route::post('admin/edit_Testimonial/{id}', [AdminsController::class, 'edit_Testimonial'])->middleware('is_admin');

// Signal
Route::get('admin/signals', [AdminsController::class, 'signals'])->middleware('is_admin');
Route::get('admin/addSignal', [AdminsController::class, 'addSignal'])->middleware('is_admin');
Route::post('admin/add_Signal', [AdminsController::class, 'add_Signal'])->middleware('is_admin');
Route::get('admin/editSignal/{id}', [AdminsController::class, 'editSignal'])->middleware('is_admin');
Route::post('admin/edit_Signal/{id}', [AdminsController::class, 'edit_Signal'])->middleware('is_admin');

// Blog
Route::get('admin/blog', [AdminsController::class, 'blog'])->middleware('is_admin');
Route::get('admin/addBlog', [AdminsController::class, 'addBlog'])->middleware('is_admin');
Route::post('admin/add_Blog', [AdminsController::class, 'add_Blog'])->middleware('is_admin');
Route::get('admin/editBlog/{id}', [AdminsController::class, 'editBlog'])->middleware('is_admin');
Route::post('admin/edit_Blog/{id}', [AdminsController::class, 'edit_Blog'])->middleware('is_admin');
Route::get('admin/delete_Blog/{id}', [AdminsController::class, 'delete_Blog'])->middleware('is_admin');


// Payments
Route::get('admin/b2b', [AdminsController::class, 'b2b'])->middleware('is_admin');
Route::get('admin/b2c', [AdminsController::class, 'b2c'])->middleware('is_admin');
Route::get('admin/lnmo_api_response', [AdminsController::class, 'lnmo_api_response'])->middleware('is_admin');
Route::get('admin/mobile_payments', [AdminsController::class, 'mobile_payments'])->middleware('is_admin');
Route::get('admin/reverse_transaction', [AdminsController::class, 'reverse_transaction'])->middleware('is_admin');
Route::get('admin/transaction_status', [AdminsController::class, 'transaction_status'])->middleware('is_admin');
Route::get('admin/accountbalance', [AdminsController::class, 'accountbalance'])->middleware('is_admin');
Route::get('admin/approve-transaction/{id}', [AdminsController::class, 'approve_transaction'])->middleware('is_admin');
Route::get('admin/approve-transaction-stk/{id}', [AdminsController::class, 'approve_transaction_stk'])->middleware('is_admin');

// Enroll Users
Route::get('admin/enroll-users', [AdminsController::class, 'enroll_users'])->middleware('is_admin');
Route::get('admin/enroll-users-post/{id}', [AdminsController::class, 'enroll_users_post'])->middleware('is_admin');
Route::post('admin/enroll-user-now', [AdminsController::class, 'enroll_user_now'])->middleware('is_admin');

//Manage Users
Route::get('admin/users', [AdminsController::class, 'users'])->middleware('is_admin');
Route::get('admin/admins', [AdminsController::class, 'admins'])->middleware('is_admin');
Route::get('admin/addUser', [AdminsController::class, 'addUser'])->middleware('is_admin');
Route::get('admin/editUser/{id}', [AdminsController::class, 'editUser'])->middleware('is_admin');
Route::post('admin/add_User', [AdminsController::class, 'add_User'])->middleware('is_admin');
Route::post('admin/edit_User/{id}', [AdminsController::class, 'edit_User'])->middleware('is_admin');
Route::get('admin/delete_user/{id}', [AdminsController::class, 'delete_user'])->middleware('is_admin');
Route::get('admin/switchRole/{id}', [AdminsController::class, 'switchRole'])->middleware('is_admin');
Route::get('admin/switchStatus/{id}', [AdminsController::class, 'switchStatus'])->middleware('is_admin');

Route::get('admin/updateSlung', [AdminsController::class, 'updateSlung'])->middleware('is_admin');

Route::get('admin/addProductToFacebookPixel', [AdminsController::class, 'addProductToFacebookPixel'])->middleware('is_admin');
Route::get('admin/emptyProductToFacebookPixel', [AdminsController::class, 'emptyProductToFacebookPixel'])->middleware('is_admin');


Route::get('admin/activitylogs', [AdminsController::class, 'activitylogs'])->middleware('is_admin');


// AJAX REQUESTS
Route::post('admin/addCategoryAjaxRequest', [AdminsController::class, 'addCategoryAjaxRequest'])->middleware('is_admin');
Route::post('admin/deleteBlogAjax', [AdminsController::class, 'deleteBlogAjax'])->middleware('is_admin');
Route::put('admin/updateSiteSettingsAjax', [AdminsController::class, 'updateSiteSettingsAjax'])->middleware('is_admin');
Route::put('admin/updateMailerAjax', [AdminsController::class, 'updateMailerAjax'])->middleware('is_admin');
Route::put('admin/updateSiteSocialMediaAjax', [AdminsController::class, 'updateSiteSocialMediaAjax'])->middleware('is_admin');
Route::put('admin/updateSiteCredentials', [AdminsController::class, 'updateSiteCredentials'])->middleware('is_admin');
Route::post('admin/deleteCategoryAjax', [AdminsController::class, 'deleteCategoryAjax'])->middleware('is_admin');
Route::post('admin/deleteTestimonialAjax', [AdminsController::class, 'deleteTestimonialAjax'])->middleware('is_admin');
Route::post('admin/deleteSliderAjax', [AdminsController::class, 'deleteSliderAjax'])->middleware('is_admin');
Route::post('admin/deleteC2BAjax', [AdminsController::class, 'deleteC2BAjax'])->middleware('is_admin');
Route::post('admin/deleteB2BAjax', [AdminsController::class, 'deleteB2BAjax'])->middleware('is_admin');
Route::post('admin/deleteB2CAjax', [AdminsController::class, 'deleteB2CAjax'])->middleware('is_admin');
Route::post('admin/deleteBalAjax', [AdminsController::class, 'deleteBalAjax'])->middleware('is_admin');
Route::post('admin/deleteSTKAjax', [AdminsController::class, 'deleteSTKAjax'])->middleware('is_admin');
Route::post('admin/deleteReverseAjax', [AdminsController::class, 'deleteReverseAjax'])->middleware('is_admin');
Route::post('admin/deleteTransactionAjax', [AdminsController::class, 'deleteTransactionAjax'])->middleware('is_admin');
Route::post('admin/deleteUserAjax', [AdminsController::class, 'deleteUserAjax'])->middleware('is_admin');
Route::post('admin/deleteFaqAjax', [AdminsController::class, 'deleteFaqAjax'])->middleware('is_admin');
Route::post('admin/deletePrivacyAjax', [AdminsController::class, 'deletePrivacyAjax'])->middleware('is_admin');
Route::post('admin/deleteTermsAjax', [AdminsController::class, 'deleteTermsAjax'])->middleware('is_admin');
Route::post('admin/deleteHowAjax', [AdminsController::class, 'deleteHowAjax'])->middleware('is_admin');
Route::post('admin/deleteCoursesAjax', [AdminsController::class, 'deleteCoursesAjax'])->middleware('is_admin');
Route::post('admin/deleteTopicsAjax', [AdminsController::class, 'deleteTopicsAjax'])->middleware('is_admin');
Route::post('admin/deleteSignalsAjax', [AdminsController::class, 'deleteSignalsAjax'])->middleware('is_admin');
Route::post('admin/deleteProductAjax', [AdminsController::class, 'deleteProductAjax'])->middleware('is_admin');



// Route::post('/make-payment','PaymentsController@payment');
Route::group(['prefix' => '/webhooks'], function () {
    //PESAPAL
    Route::get('donepayment', [App\Http\Controllers\PaymentsController::class, 'paymentsuccess'])->name('paymentsuccess');
    Route::get('paymentconfirmation', [App\Http\Controllers\PaymentsController::class, 'paymentconfirmation']);
});


Route::get('export', [DemoController::class, 'export'])->name('exporting');
Route::get('importExportView', [DemoController::class, 'importExportView']);
Route::get('import', [DemoController::class, 'import']);
