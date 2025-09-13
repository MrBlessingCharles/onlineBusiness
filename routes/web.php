<?php

use App\Models\product;
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
Route::get('/productbytopcategory/{tcatname}', [App\Http\Controllers\ClientController::class, 'viewproductbytopcategorypage']);
Route::get('/productbymiddlecategory/{tcatname}/{mcatname}', [App\Http\Controllers\ClientController::class, 'viewproductbymiddlecategorypage']);
Route::get('/productbyendlevelcategory/{tcatname}/{mcatname}/{ecatname}', [App\Http\Controllers\ClientController::class, 'viewproductbyendlevelcategorypage']);

Route::get('/productdetails/{id}', [App\Http\Controllers\ClientController::class, 'viewproductdetailspage'])->name('viewproductdetailspage');
Route::get('/searchproduct', [App\Http\Controllers\ClientController::class, 'viewsearchproductpage'])->name('viewsearchproductpage');
Route::get('/loginpassword', [App\Http\Controllers\ClientController::class, 'viewloginpasswordpage'])->name('viewloginpasswordpage');

//admin controller routes
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'viewadmindashboard']);
Route::get('/admin/settings', [App\Http\Controllers\AdminController::class, 'viewadminsettings']);
Route::get('/admin/size', [App\Http\Controllers\AdminController::class, 'viewadminsize']);
Route::get('/admin/addsize', [App\Http\Controllers\AdminController::class, 'addadminsize']);

Route::get('/admin/color', [App\Http\Controllers\AdminController::class, 'viewcolor']);
Route::get('/admin/addcolor', [App\Http\Controllers\AdminController::class, 'addadmincolor']);
Route::get('/admin/editcolor', [App\Http\Controllers\AdminController::class, 'editcolor']);
Route::get('/admin/country', [App\Http\Controllers\AdminController::class, 'viewcountry']);
Route::get('/admin/addcountry', [App\Http\Controllers\AdminController::class, 'viewaddcountry']);
Route::get('/admin/editcountry', [App\Http\Controllers\AdminController::class, 'vieweditcountry']);

Route::get('/admin/shippingcoast', [App\Http\Controllers\AdminController::class, 'viewshippingcoast']);
Route::get('/admin/editshippingcoast', [App\Http\Controllers\AdminController::class, 'vieweditshippingcoast']);

Route::get('/admin/toplevelcategory', [App\Http\Controllers\CategoryController::class, 'viewtoplevelcategory']);
Route::get('/admin/addtoplevelcategory', [App\Http\Controllers\CategoryController::class,'viewaddtoplevelcategory']);

Route::get('/admin/middlelevelcategory', [App\Http\Controllers\CategoryController::class, 'viewmiddlelevelcategory']);
Route::get('/admin/addmiddlelevelcategory', [App\Http\Controllers\CategoryController::class,'viewaddmiddlelevelcategory']);
Route::get('/admin/editmiddlelevelcategory/{id}', [App\Http\Controllers\CategoryController::class, 'vieweditmidllelevelcategory']);


//endlevel category
Route::get('/admin/endlevelcategory', [App\Http\Controllers\CategoryController::class, 'viewendlevelcategory']);
Route::get('/admin/addendlevelcategory', [App\Http\Controllers\CategoryController::class, 'viewaddendlevelcategory']);
Route::get('/admin/editendlevelcategory/{id}', [App\Http\Controllers\CategoryController::class, 'vieweditendlevelcategory']);
Route::put('/admin/updateendlevelcategory/{id}', [App\Http\Controllers\CategoryController::class, 'updateendlevelcategory']);
Route::delete('/admin/deleteendlevelcategory/{id}', [App\Http\Controllers\CategoryController::class, 'deleteendlevelcategory']);


Route::get('/admin/faq', [App\Http\Controllers\AdminController::class, 'viewfaq'])->name('viewfaq');
Route::get('/admin/addfaq', [App\Http\Controllers\AdminController::class, 'viewaddfaq'])->name('viewaddfaq');
Route::post('/admin/savefaq', [App\Http\Controllers\AdminController::class, 'savefaq'])->name('savefaq');
Route::get('/admin/editfaq/{id}', [App\Http\Controllers\AdminController::class, 'vieweditfaq'])->name('vieweditfaq');
Route::put('/admin/updatefaq/{id}', [App\Http\Controllers\AdminController::class, 'updatefaq'])->name('updatefaq');
Route::delete('/admin/deletefaq/{id}', [App\Http\Controllers\AdminController::class, 'deletefaq'])->name('deletefaq');


Route::get('/admin/registercustomer', [App\Http\Controllers\AdminController::class, 'viewregistercustomer'])->name('viewregistercustomer');
Route::get('/admin/pagesettings', [App\Http\Controllers\AdminController::class, 'viewpagesettings'])->name('viewpagesettings');
Route::get('/admin/socialmedia', [App\Http\Controllers\AdminController::class, 'viewsocialmedia'])->name('viewsocialmedia');
Route::get('/admin/subscriber', [App\Http\Controllers\AdminController::class, 'viewsubscriber'])->name('viewsubscriber');
Route::get('/admin/adminprofile', [App\Http\Controllers\AdminController::class, 'viewadminprofile'])->name('viewadminprofile');



// Product routes

Route::get('/admin/product', [App\Http\Controllers\ProductController::class, 'viewproduct']);
Route::get('/admin/addproduct', [App\Http\Controllers\ProductController::class, 'viewaddproduct']);
Route::get('/admin/editproduct/{id}', [App\Http\Controllers\ProductController::class, 'vieweditproduct']);
Route::post('/admin/saveproduct', [App\Http\Controllers\ProductController::class, 'saveproduct']);
Route::put('/admin/updateproduct/{id}', [App\Http\Controllers\ProductController::class, 'updateproduct']);
Route::get('/admin/deleteortherphoto/{id}/{photos}', [App\Http\Controllers\ProductController::class, 'deleteortherphoto']);
Route::delete('/admin/deleteproduct/{id}', [App\Http\Controllers\ProductController::class, 'deleteproduct']);


Route::get('/admin/orders', [App\Http\Controllers\ProductController::class, 'vieworders'])->name('vieworders');

// Slider routes
Route::get('/admin/sliders', [App\Http\Controllers\SliderController::class, 'viewsliders'])->name('viewsliders');
Route::get('/admin/addslider', [App\Http\Controllers\SliderController::class, 'viewaddslider'])->name('viewaddslider');
Route::post('/admin/saveslider', [App\Http\Controllers\SliderController::class, 'saveslider']);
Route::get('/admin/editslider/{id}', [App\Http\Controllers\SliderController::class, 'vieweditslider'])->name('vieweditslider');
Route::put('/admin/updateslider/{id}', [App\Http\Controllers\SliderController::class, 'updateslider']);
Route::delete('/admin/deleteslider/{id}', [App\Http\Controllers\SliderController::class, 'deleteslider']);


// Additional routes can be added here as needed
Route::get('/admin/services', [App\Http\Controllers\SliderController::class, 'viewservices'])->name('viewservices');
Route::get('/admin/addservice', [App\Http\Controllers\SliderController::class, 'viewaddservice'])->name('viewaddservice');
Route::post('/admin/saveservices', [App\Http\Controllers\SliderController::class, 'saveservices']);
Route::get('/admin/editservice/{id}', [App\Http\Controllers\SliderController::class, 'vieweditservice'])->name('vieweditservice');
Route::put('/admin/updateservice/{id}', [App\Http\Controllers\SliderController::class, 'updateservice']);
Route::delete('/admin/deleteservice/{id}', [App\Http\Controllers\SliderController::class, 'deleteservice']);

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
Route::put('/admin/updatepopularproductsection/{id}', [App\Http\Controllers\SettingController::class, 'updatePopularProductSection']);
Route::post('/admin/savenewsletter', [App\Http\Controllers\SettingController::class, 'saveNewsletter']);
Route::put('/admin/updatenewsletter/{id}', [App\Http\Controllers\SettingController::class, 'updateNewsletter']);
Route::post('/admin/savebanner', [App\Http\Controllers\SettingController::class, 'saveBanner']);
Route::put('/admin/updatebanner/{id}', [App\Http\Controllers\SettingController::class, 'updateBanner']);
Route::post('/admin/savepaymentsetting', [App\Http\Controllers\SettingController::class, 'savePaymentSetting']);
Route::put('/admin/updatepaymentsetting/{id}', [App\Http\Controllers\SettingController::class, 'updatePaymentSetting']);

//SHOP CONTROLLER ROUTES
Route::post('/admin/savesize', [App\Http\Controllers\ShopController::class, 'savesize']);
Route::get('/admin/editsize/{id}', [App\Http\Controllers\ShopController::class, 'vieweditsize']);
Route::put('/admin/updatesize/{id}', [App\Http\Controllers\ShopController::class, 'updatesize']);
Route::delete('/admin/deletesize/{id}', [App\Http\Controllers\ShopController::class, 'deletesize']);

Route::post('/admin/savecolor', [App\Http\Controllers\ShopController::class, 'savecolor']);
Route::get('/admin/editcolor/{id}', [App\Http\Controllers\ShopController::class, 'vieweditcolor']);
Route::put('/admin/updatecolor/{id}', [App\Http\Controllers\ShopController::class, 'updatecolor']);
Route::delete('/admin/deletecolor/{id}', [App\Http\Controllers\ShopController::class, 'deletecolor']);

Route::post('/admin/savecountry', [App\Http\Controllers\ShopController::class, 'savecountry']);
Route::get('/admin/editcountry/{id}', [App\Http\Controllers\ShopController::class, 'vieweditcountry']);
Route::put('/admin/updatecountry/{id}', [App\Http\Controllers\ShopController::class, 'updatecountry']);
Route::delete('/admin/deletecountry/{id}',[App\Http\Controllers\ShopController::class, 'deletecountry']);

Route::post('/admin/saveshippingcoast', [App\Http\Controllers\ShopController::class, 'saveshippingcoast']);
Route::get('/admin/editshippingcoast/{id}', [App\Http\Controllers\ShopController::class, 'vieweditshippingcoast']);
Route::put('/admin/updateshippingcoast/{id}', [App\Http\Controllers\ShopController::class, 'updateshippingcoast']);
Route::delete('/admin/deleteshippingcoast/{id}', [App\Http\Controllers\ShopController::class, 'deleteshippingcoast']);

Route::post('/admin/saverestamount', [App\Http\Controllers\ShopController::class, 'saveshippingcoastrest']);
Route::put('/admin/updaterestamount/{id}', [App\Http\Controllers\ShopController::class, 'updateshippingcoastrest']);

Route::post('/admin/savetoplevelcategory', [App\Http\Controllers\ShopController::class, 'savetoplevelcategory']);
Route::put('/admin/updatetoplevelcategory/{id}', [App\Http\Controllers\ShopController::class, 'viewedupdatetoplevelcategory']);
Route::get('/admin/edittoplevelcategory/{id}', [App\Http\Controllers\ShopController::class, 'viewedittoplevelcategory']);
Route::delete('/admin/deletetoplevelcategory/{id}', [App\Http\Controllers\ShopController::class, 'deletetoplevelcategory']);

Route::post('/admin/savemiddlelevelcategory', [App\Http\Controllers\CategoryController::class, 'savemiddlelevelcategory']);
Route::put('/admin/updatemiddlelevelcategory/{id}', [App\Http\Controllers\CategoryController::class, 'updatemiddlelevelcategory']);
Route::delete('/admin/deletemiddlelevelcategory/{id}', [App\Http\Controllers\CategoryController::class, 'deletemiddlelevelcategory']);

//end level category
Route::post('/admin/saveendlevelcategory', [App\Http\Controllers\CategoryController::class, 'saveendlevelcategory']);
