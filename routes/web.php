<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\offerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\SmellController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\FrontEnd\CartController as FrontEndCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('/admin')->middleware('auth')->group(function () {

    Route::get('/{start_date}/{end_date}', [CmsController::class, 'dash']);

    // {{ User }}
    Route::get('/show_user', [UserController::class, 'show_user']);
    Route::get('/update_user/{id}', [UserController::class, 'update_user']);
    Route::post('/update_user_confirm/{id}', [UserController::class, 'update_user_confirm']);
    Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);
    Route::get('/search_user', [UserController::class, 'search_user']);


    // {{ Social }}
    Route::get('/show_social',[SocialController::class,'show_social']);
    Route::post('/update_social_confirm/{id}',[SocialController::class,'update_social_confirm']);
    Route::get('/update_social/{id}',[SocialController::class,'update_social']);

    // {{ Subscriber }}
    Route::get('/show_subscriber',[SubscriberController::class,'show_subscriber']);
    Route::post('/update_subscriber/{id}',[SubscriberController::class,'update_subscriber']);
    Route::get('/delete_subscriber/{id}',[SubscriberController::class,'delete_subscriber']);
    Route::post('/send_email', [SubscriberController::class, 'message'])->name('send.email');

    // {{ Promo }}
    Route::get('/show_promo' , [PromoController::class , 'show_promo']);
    Route::post('/add_promo' , [PromoController::class , 'add_promo']);
    Route::post('/update_promo/{id}' , [PromoController::class , 'update_promo']);
    Route::get('/delete_promo' , [PromoController::class , 'delete_promo']);

    // {{ Term }}
    Route::get('/show_term' , [TermController::class , 'show_term']);
    Route::post('/add_term' , [TermController::class , 'add_term']);
    Route::post('/update_term/{id}' , [TermController::class , 'update_term']);
    Route::get('/delete_term/{id}' , [TermController::class , 'delete_term']);

    // {{ Privacy }}
    Route::get('/show_privacy' , [PrivacyController::class , 'show_privacy']);
    Route::post('/add_privacy' , [PrivacyController::class , 'add_privacy']);
    Route::post('/update_privacy/{id}' , [PrivacyController::class , 'update_privacy']);
    Route::get('/delete_privacy/{id}' , [PrivacyController::class , 'delete_privacy']);

    // {{ Testimonial }}
    Route::get('/show_testimonial' , [TestimonialController::class , 'show_testimonial']);
    Route::post('/add_testimonial' , [TestimonialController::class , 'add_testimonial']);
    Route::post('/update_testimonial/{id}' , [TestimonialController::class , 'update_testimonial']);
    Route::get('/delete_testimonial/{id}' , [TestimonialController::class , 'delete_testimonial']);

    // {{ Collection }}
    Route::get('/show_collection' , [CollectionController::class , 'show_collection']);
    Route::post('/add_collection' , [CollectionController::class , 'add_collection']);
    Route::post('/update_collection/{id}' , [CollectionController::class , 'update_collection']);
    Route::get('/delete_collection/{id}' , [CollectionController::class , 'delete_collection']);
    Route::get('/delete_collection_with_associate/{id}' , [CollectionController::class , 'delete_collection_with_associate']);

    // {{ Landing }}
    Route::get('/show_landing' , [LandingController::class , 'show_landing']);
    Route::post('/add_landing' , [LandingController::class , 'add_landing']);
    Route::post('/update_landing/{id}' , [LandingController::class , 'update_landing']);
    Route::get('/delete_landing/{id}' , [LandingController::class , 'delete_landing']);

    // {{ Tag }}
    Route::get('/show_tag' , [TagController::class , 'show_tag']);
    Route::post('/add_tag' , [TagController::class , 'add_tag']);
    Route::post('/update_tag/{id}' , [TagController::class , 'update_tag']);
    Route::get('/delete_tag/{id}' , [TagController::class , 'delete_tag']);

    // {{ Category }}
    Route::get('/show_category' , [CategoriesController::class , 'show_category']);
    Route::post('/add_category' , [CategoriesController::class , 'add_category']);
    Route::post('/update_category/{id}' , [CategoriesController::class , 'update_category']);
    Route::get('/delete_category/{id}' , [CategoriesController::class , 'delete_category']);
    Route::get('/delete_category_with_products/{id}' , [CategoriesController::class , 'delete_category_with_products']);

    // {{ Product }}
    Route::get('/show_product' , [ProductController::class , 'show_product']);
    Route::post('/add_product' , [ProductController::class , 'add_product']);
    Route::get('/update_product/{id}' , [ProductController::class , 'update_product']);
    Route::get('/view_product/{id}' , [ProductController::class , 'view_product']);
    Route::post('/update_product_confirm/{id}' , [ProductController::class , 'update_product_confirm']);
    Route::get('/delete_product/{id}' , [ProductController::class , 'delete_product']);
    Route::get('/search_product' , [ProductController::class , 'search_product']);


    // {{ Product Image }}
    Route::post('/add_product_image' , [ProductImageController::class , 'add_product_image']);
    Route::post('/update_product_image/{id}' , [ProductImageController::class , 'update_product_image']);
    Route::get('/delete_product_image/{id}' , [ProductImageController::class , 'delete_product_image']);

    // {{ Size }}
    Route::post('/add_size' , [SizeController::class , 'add_size']);
    Route::post('/update_size/{id}' , [SizeController::class , 'update_size']);
    Route::get('/delete_size/{id}' , [SizeController::class , 'delete_size']);

    // {{ Smell }}
    Route::post('/add_smell' , [SmellController::class , 'add_smell']);
    Route::post('/update_smell/{id}' , [SmellController::class , 'update_smell']);
    Route::get('/delete_smell/{id}' , [SmellController::class , 'delete_smell']);

    // {{ About }}
    Route::get('/show_about' , [AboutController::class , 'show_about']);
    Route::get('/update_about/{id}' , [AboutController::class , 'update_about']);
    Route::post('/update_about_confirm/{id}' , [AboutController::class , 'update_about_confirm']);
    Route::post('/add_about_img' , [AboutController::class , 'add_about_img']);
    Route::post('/add_about_point' , [AboutController::class , 'add_about_point']);


    // {{ Cart }}
    Route::get('/show_cart' , [CartController::class , 'show_cart']);
    Route::post('/add_cart' , [cartController::class , 'add_cart']);
    Route::post('/update_cart/{id}' , [cartController::class , 'update_cart']);
    Route::get('/delete_cart/{id}' , [cartController::class , 'delete_cart']);

    // {{ Order }}
    Route::get('/show_order' , [OrderController::class , 'show_order']);
    Route::post('/add_order' , [OrderController::class , 'add_order']);
    Route::get('/{start_date}/{end_date}/update_order/{id}' , [OrderController::class , 'update_order']);
    Route::post('/{start_date}/{end_date}/update_order_confirm/{id}' , [OrderController::class , 'update_order_confirm']);
    Route::get('/delete_order/{id}' , [OrderController::class , 'delete_order']);
    Route::get('/view_order/{id}' , [OrderController::class , 'view_order']);
    Route::get('/search_order' , [OrderController::class , 'search_order']);
    Route::post('/update-status/{id}',[OrderController::class,'update_status'])->name('update-status');


    // {{ Offer }}
    Route::get('/show_offer', [OfferController::class,'show_offer']);
    Route::get('/add_offer', [OfferController::class, 'add_offer']);
    Route::post('/add_offer_confirm', [OfferController::class, 'add_offer_confirm']);
    Route::get('/update_offer/{id}', [OfferController::class, 'update_offer']);
    Route::post('/update_offer_confirm/{id}', [OfferController::class, 'update_offer_confirm']);
    Route::get('/delete_offer/{id}', [OfferController::class, 'delete_offer']);
    Route::get('/view_offer/{id}', [OfferController::class,'view_offer']);
    Route::get('/search_product_offer' , [offerController::class , 'search_product_offer']);
    Route::get('/search_offer' , [offerController::class , 'search_offer']);
    Route::post('/add-single-offer', [offerController::class, 'addSelectedProduct']);
    Route::get('/reload_table_data', [offerController::class, 'reloadTableData'])->name('admin.reload_table_data');

    // {{ General }}
    Route::get('/show_general' , [GeneralController::class , 'show_general']);
    Route::get('/update_general/{id}' , [GeneralController::class , 'update_general']);
    Route::post('/update_general_confirm/{id}' , [GeneralController::class , 'update_general_confirm']);

    // {{ Transaction }}
    Route::get('/show_transaction' , [TransactionController::class , 'show_transaction']);


    // {{ Date }}

    Route::get('/filter_date', [CmsController::class, 'filterDate'])->name('filter_date')->middleware('web');

});

Route::redirect('/', '/login');

// Route::post('/api/add_order', [OrderController::class, 'api_add_order']);
Route::post('/api/add_cart', [FrontEndCartController::class, 'add_cart']);
Route::get('/api/show_cart', [FrontEndCartController::class, 'show_cart']);


//Register Route
Route::post('/register_user',[RegisterController::class,'register'])->name('register');


Route::get('/get_filter_date', [CmsController::class, 'get_filter_date'])->middleware('web');
Route::post('/clear-session', [CmsController::class, 'clearDateSession'])->name('clear_session')->middleware('web');
