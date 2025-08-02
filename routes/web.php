<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Add any additional routes for ClientController if needed
Route::get('/', [App\Http\Controllers\ClientController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\ClientController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\ClientController::class, 'contactpage'])->name('contactpage');
Route::get('/faq', [App\Http\Controllers\ClientController::class, 'faqpage'])->name('faqpage');
Route::get('/login', [App\Http\Controllers\ClientController::class, 'viewloginpage'])->name('viewloginpage');
Route::get('/register', [App\Http\Controllers\ClientController::class, 'viewregisterpage'])->name('viewregisterpage');
Route::get('/cart', [App\Http\Controllers\ClientController::class, 'viewcartpage'])->name('viewcarpage');
Route::get('/checkout', [App\Http\Controllers\ClientController::class, 'viewcheckoutpage'])->name('viewcheckoutpage');
Route::get('/dashboard', [App\Http\Controllers\ClientController::class, 'viewdashboardpage'])->name('viewdashboardpage');
Route::get('/profile', [App\Http\Controllers\ClientController::class, 'viewprofilepage'])->name('viewprofilepage');
Route::get('/billingsdetails', [App\Http\Controllers\ClientController::class, 'viewbillingsdetailspage'])->name('viewbillingsdetailspage');
Route::get('/customerorders', [App\Http\Controllers\ClientController::class, 'viewcustomerorderspage'])->name('viewcustomerorderspage');
Route::get('/productbycategory', [App\Http\Controllers\ClientController::class, 'viewproductbycategorypage'])->name('viewproductbycategorypage');
Route::get('/productdetails', [App\Http\Controllers\ClientController::class, 'viewproductdetailspage'])->name('viewproductdetailspage');
Route::get('/searchproduct', [App\Http\Controllers\ClientController::class, 'viewsearchproductpage'])->name('viewsearchproductpage');
Route::get('/loginpassword', [App\Http\Controllers\ClientController::class, 'viewloginpasswordpage'])->name('viewloginpasswordpage');

//admin controller routes
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'viewadmindashboard']);
Route::get('/admin/settings', [App\Http\Controllers\AdminController::class, 'viewadminsettings']);
Route::get('/admin/size', [App\Http\Controllers\AdminController::class, 'viewadminsize']);
Route::get('/admin/addsize', [App\Http\Controllers\AdminController::class, 'viewadminsize']);
Route::get('/admin/editsize', [App\Http\Controllers\AdminController::class, 'addadminsize']);

Route::get('/admin/color', [App\Http\Controllers\AdminController::class, 'viewcolor']);
Route::get('/admin/addcolor', [App\Http\Controllers\AdminController::class, 'addadminsize']);
Route::get('/admin/editcolor', [App\Http\Controllers\AdminController::class, 'editsize']);
Route::get('/admin/country', [App\Http\Controllers\AdminController::class, 'viewcountry']);
Route::get('/admin/addcountry', [App\Http\Controllers\AdminController::class, 'viewaddcountry']);
Route::get('/admin/editcountry', [App\Http\Controllers\AdminController::class, 'vieweditcountry']);

Route::get('/admin/shippingcoast', [App\Http\Controllers\AdminController::class, 'viewshippingcoast']);
Route::get('/admin/editshippingcoast', [App\Http\Controllers\AdminController::class, 'vieweditshippingcoast']);

Route::get('/admin/toplevelcategory', [App\Http\Controllers\CategoryController::class, 'viewtoplevelcategory']);
Route::get('/admin/addtoplevelcategory', [App\Http\Controllers\CategoryController::class,'viewaddtoplevelcategory']);
Route::get('/admin/edittoplevelcategory', [App\Http\Controllers\CategoryController::class, 'viewedittoplevelcategory']);


Route::get('/admin/middlelevelcategory', [App\Http\Controllers\CategoryController::class, 'viewmiddlelevelcategory']);
Route::get('/admin/addmiddlelevelcategory', [App\Http\Controllers\CategoryController::class,'viewaddmiddlelevelcategory']);
Route::get('/admin/editmiddlelevelcategory', [App\Http\Controllers\CategoryController::class, 'vieweditmiddlelevelcategory']);

Route::get('/admin/endlevelcategory', [App\Http\Controllers\CategoryController::class, 'viewendlevelcategory']);
Route::get('/admin/addendlevelcategory', [App\Http\Controllers\CategoryController::class, 'viewaddendlevelcategory']);
Route::get('/admin/editendlevelcategory', [App\Http\Controllers\CategoryController::class, 'vieweditendlevelcategory']);

Route::get('/admin/faq', [App\Http\Controllers\AdminController::class, 'viewfaq'])->name('viewfaq');
Route::get('/admin/addfaq', [App\Http\Controllers\AdminController::class, 'viewaddfaq'])->name('viewaddfaq');
Route::get('/admin/editfaq', [App\Http\Controllers\AdminController::class, 'vieweditfaq'])->name('vieweditfaq');
Route::get('/admin/registercustomer', [App\Http\Controllers\AdminController::class, 'viewregistercustomer'])->name('viewregistercustomer');
Route::get('/admin/pagesettings', [App\Http\Controllers\AdminController::class, 'viewpagesettings'])->name('viewpagesettings');
Route::get('/admin/socialmedia', [App\Http\Controllers\AdminController::class, 'viewsocialmedia'])->name('viewsocialmedia');
Route::get('/admin/subscriber', [App\Http\Controllers\AdminController::class, 'viewsubscriber'])->name('viewsubscriber');
Route::get('/admin/adminprofile', [App\Http\Controllers\AdminController::class, 'viewadminprofile'])->name('viewadminprofile');



// Product routes

Route::get('/admin/product', [App\Http\Controllers\ProductController::class, 'viewproduct']);
Route::get('/admin/addproduct', [App\Http\Controllers\ProductController::class, 'viewaddproduct']);
Route::get('/admin/editproduct', [App\Http\Controllers\ProductController::class, 'vieweditproduct']);

Route::get('/admin/orders', [App\Http\Controllers\ProductController::class, 'vieworders'])->name('vieworders');

// Slider routes
Route::get('/admin/sliders', [App\Http\Controllers\SliderController::class, 'viewsliders'])->name('viewsliders');
Route::get('/admin/addslider', [App\Http\Controllers\SliderController::class, 'viewaddslider'])->name('viewaddslider');
Route::get('/admin/editslider', [App\Http\Controllers\SliderController::class, 'vieweditslider'])->name('vieweditslider');
// Additional routes can be added here as needed
Route::get('/admin/services', [App\Http\Controllers\SliderController::class, 'viewservices'])->name('viewservices');
Route::get('/admin/addservice', [App\Http\Controllers\SliderController::class, 'viewaddservice'])->name('viewaddservice');
Route::get('/admin/editservice', [App\Http\Controllers\SliderController::class, 'vieweditservice'])->name('vieweditservice');

//settings routes
Route::post('/admin/savelogo', [App\Http\Controllers\SettingController::class, 'saveLogo']);
Route::put('/admin/updatelogo/{id}', [App\Http\Controllers\SettingController::class, 'updateLogo']);
Route::post('/admin/savefavicon', [App\Http\Controllers\SettingController::class, 'saveFavicon']); 
Route::put('/admin/updatefavicon/{id}', [App\Http\Controllers\SettingController::class,'updateFavicon']);
Route::post('/admin/saveinformation', [App\Http\Controllers\SettingController::class, 'saveInformation']);
Route::put('/admin/updateinformation/{id}', [App\Http\Controllers\SettingController::class, 'updateInformation']);
Route::post('/admin/savemessage', [App\Http\Controllers\SettingController::class, 'saveMessage']);
Route::put('/admin/updatemessage/{id}', [App\Http\Controllers\SettingController::class, 'updateMessage']);
Route::post('/admin/saveproductsetting', [App\Http\Controllers\SettingController::class, 'saveProductSetting']);
Route::put('/admin/updateproductsetting/{id}', [App\Http\Controllers\SettingController::class, 'updateProductSetting']);
Route::post('/admin/saveonoffsection', [App\Http\Controllers\SettingController::class, 'saveOnOffSection']);
Route::put('/admin/updateonoffsection/{id}', [App\Http\Controllers\SettingController::class, 'updateOnOffSection']);
Route::post('/admin/savemetasection', [App\Http\Controllers\SettingController::class, 'saveMetasection']);
Route::put('/admin/updatemetasection/{id}', [App\Http\Controllers\SettingController::class, 'updateMetasection']);
Route::post('/admin/savefeaturedproductsection', [App\Http\Controllers\SettingController::class, 'saveFeaturedProductSection']);
Route::put('/admin/updatefeatproductsection/{id}', [App\Http\Controllers\SettingController::class, 'updateFeaturedProductSection']);
Route::post('/admin/savelatestproductsection', [App\Http\Controllers\SettingController::class, 'saveLatestProductSection']);
Route::put('/admin/updatelatestproductsection/{id}', [App\Http\Controllers\SettingController::class, 'updateLatestProductSection']);
Route::post('/admin/savepopularproductsection', [App\Http\Controllers\SettingController::class, 'savePopularProductSection']);

