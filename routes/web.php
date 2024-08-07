<?php


use Illuminate\Support\Facades\Route;



// dash routes
use App\Http\Controllers\HomeController;

// admin livewire routes
//
use App\Http\Livewire\Admin\Permission\AdminPerms;
use App\Http\Livewire\Admin\Permission\AdminRoles;
use App\Http\Livewire\Admin\Users\AdminUsers;
use App\Http\Livewire\Admin\Users\AdminAdmins;
//
use App\Http\Livewire\Admin\Permission\ListUsersForPerm;
use App\Http\Livewire\Admin\Permission\ListUsersForRole;
//
use App\Http\Livewire\Admin\ProductFeatures\AdminColors;
use App\Http\Livewire\Admin\ProductFeatures\AdminCategoryAttributeValue;
use App\Http\Livewire\Admin\ProductFeatures\AdminCategoryAttribute;
use App\Http\Livewire\Admin\ProductFeatures\AdminTag;
//
use App\Http\Livewire\Admin\Stock\StockProduct;
//
use App\Http\Livewire\Admin\Banner2\AdminCustomBanner;
use App\Http\Livewire\Admin\Banner2\AdminMostVisitedSlider;
use App\Http\Livewire\Admin\Banner2\AdminNewestBanner;
use App\Http\Livewire\Admin\Banner2\AdminBestSellerSlider;
use App\Http\Livewire\Admin\Banner2\AdminSuggestionBanner;
//
use App\Http\Livewire\Admin\Brand\AdminBrandList;
use App\Http\Livewire\Admin\Brand\AdminEditBrand;
use App\Http\Livewire\Admin\Setting\AdminSetting;
use App\Http\Livewire\Admin\Orders\AdminAllOrders;

//
use App\Http\Livewire\Admin\Category\AdminCategoryCreate;
use App\Http\Livewire\Admin\Brand\AdminCreateBrand;
use App\Http\Livewire\Admin\Delivery\AdminDelivery;
//
use App\Http\Livewire\Admin\IndexProduct\IndexProduct;
//
use App\Http\Livewire\Admin\Category\AdminCategoryEdit;
use App\Http\Livewire\Admin\Category\AdminCategoryList;
//
use App\Http\Livewire\Admin\Comment\AdminSingleComment;
use App\Http\Controllers\Dash\AdminPermAssignController;
use App\Http\Controllers\Dash\AdminRoleAssignController;
use App\Http\Controllers\Dash\Payment\PaymentController;
use App\Http\Controllers\Dash\Ticket\AdminCategoryTicketController;
//
use App\Http\Controllers\Dash\NotificationController;
use App\Http\Controllers\Dash\Setting\SettingController;
//
use App\Http\Controllers\Dash\AdminController;
//
use App\Http\Controllers\Dash\Order\AdminOrderController;
// admin auth routes
use App\Http\Controllers\Auth_Admin\AdminLoginController;
use App\Http\Controllers\Auth_Admin\AdminProfileController;
use App\Http\Controllers\Auth_Admin\AdminValidateController;
use App\Http\Controllers\Auth_User\RegisterUserController;
use App\Http\Controllers\Auth_User\ValidateUserController;

//
use App\Http\Controllers\Dash\Address\AdminCityController;
use App\Http\Livewire\Admin\Attribute\AdminAttributeValue;
use App\Http\Livewire\Admin\Attribute\AdminAttributeValueCreate;
use App\Http\Livewire\Admin\Attribute\AdminAttributeCreate;
use App\Http\Livewire\Admin\Attribute\AdminAttribute;

//

use App\Http\Controllers\Dash\StockProduct\StockController;
use App\Http\Controllers\Dash\Ticket\AdminTicketController;
use App\Http\Controllers\Dash\Ticket\AdminAdminTicketController;
use App\Http\Controllers\Dash\Ticket\AdminPriorityTicketController;
//

//
use App\Http\Controllers\Dash\Product\ProductCreateController;
use App\Http\Controllers\Dash\Product\ProductEditController;
use App\Http\Controllers\Dash\Product\ProductMetaController;
use App\Http\Controllers\Dash\Product\ProductEditSpecificationsController;
use App\Http\Controllers\Dash\Product\ProductCreateSpecificationsController;
use App\Http\Controllers\Dash\Product\ProductWarrantyController;
use App\Http\Controllers\Dash\Product\ProductCreateColorController;
use App\Http\Controllers\Dash\Product\ProductCreateImageController;
use App\Http\Controllers\Dash\Product\ProductCreateTagController;
//
use App\Http\Controllers\Dash\Notifications\AdminSMSNoticeController;
use App\Http\Controllers\Dash\Notifications\AdminEmailNoticesController;
use App\Http\Controllers\Dash\Notifications\AdminEmailNoticeFileController;
//
use App\Http\Controllers\Dash\Delivery\AdminDeliveryController;
use App\Http\Controllers\Dash\Address\AdminProvinceController;
use App\Http\Controllers\Dash\Comments\AdminCommentController;
//
use App\Http\Controllers\Dash\Banner2\AdminCustomBannerController;
use App\Http\Controllers\Dash\Banner2\AdminNewestController;
use App\Http\Controllers\Dash\Banner2\AdminBestSellerController;
use App\Http\Controllers\Dash\Banner2\AdminMostVisitedController;
use App\Http\Controllers\Dash\Banner2\AdminSuggestionController;
//
use App\Http\Controllers\Dash\Discount\AmazingSalesController;
use App\Http\Controllers\Dash\Discount\CouponDiscountController;
use App\Http\Controllers\Dash\Discount\CommonDiscountController;


// use App\Http\Controllers\Dash\Banner\BottomBannerController;
// use App\Http\Controllers\Dash\Banner\TopBannerController;
// use App\Http\Controllers\Dash\Banner\MainSliderController;
// use App\Http\Livewire\Admin\Banner\AdminAmazingOfferBanner;
// use App\Http\Livewire\Admin\Banner\AdminBottomTwoBanner;
// use App\Http\Livewire\Admin\Banner\AdminMainSlider;
// use App\Http\Livewire\Admin\Banner\AdminTopBanner;
// use App\Http\Controllers\Dash\Banner\AmazingOfferBannerController;
// use App\Http\Controllers\Dash\Banner\ProductByCategorySliderController;


//// sitemap routes

use App\Http\Controllers\SiteMapController;

//// front routes


// auth routes
use App\Http\Controllers\Auth_User\LoginUserController;
use App\Http\Controllers\Auth_User\VerifyEmailPromptController;
//
use App\Http\Controllers\Front\Product\ProductController;
// use App\Http\Controllers\Front\Profile\CompareController;
use App\Http\Controllers\Front\Profile\ProfileCommentController;
use App\Http\Controllers\Front\Profile\ProfileController;
use App\Http\Controllers\Front\Profile\FrontTicketController;
use App\Http\Controllers\Front\Profile\FrontAddressController;
use App\Http\Controllers\Front\Profile\ProfileOrderController;
use App\Http\Controllers\Front\Profile\FavoritesController;
use App\Http\Controllers\Front\Payment\PaymentController as FrontPaymentController;
//
use App\Http\Controllers\Front\Cart\CartController;
use App\Http\Controllers\Front\Payment\AddressController;
//
use App\Http\Controllers\Api\ProductController as ApiProductController;


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

// Route::get('/', function () {
//    return view('welcome');
// });

// Route::get('/service/test', [HomeController::class, 'serviceTest'])->name('service.test');

// Route::get('/storage-link', function () {
//    symlink(storage_path('app/public'), $_SERVER['DOCUMENT_ROOT'] . '/storage');
// });


Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'home')->name('home');

    Route::get('/page/notFound','notFound')->name('page.not.found');
});


Route::controller(SiteMapController::class)->group(function(){

   Route::get('/sitemap.xml','index')->name('sitemap.xml');
   Route::get('/sitemap.xml/products', 'products')->name('sitemap.xml.products');
   Route::get('/sitemap.xml/categories','categories')->name('sitemap.xml.categories');
   Route::get('/sitemap.xml/tags',  'tags')->name('sitemap.xml.tags');
   Route::get('/sitemap.xml/static', 'static')->name('sitemap.xml.static');

});





/**--------------------------auth routes---------------------**/
Route::prefix('auth')->name('auth.')->group(function () {

    Route::get('/register', [RegisterUserController::class, 'registerForm'])->name('register.form');
    Route::post('/register-user', [RegisterUserController::class, 'register'])->name('register.user');

    Route::get('/login', [LoginUserController::class, 'loginForm'])->name('login.form');
    Route::post('/login-user', [LoginUserController::class, 'login'])->middleware('throttle:auth-login-limiter')->name('login.user');

    Route::get('/validate-user', [ValidateUserController::class, 'validateForm'])->name('validate.user.form');
    Route::post('/validate-user', [ValidateUserController::class, 'validate_user'])->middleware('throttle:auth-validate-limiter')->name('validate.user');

    Route::get('/verify-email-prompt',[VerifyEmailPromptController::class,'verifyForm'])->name('verify.email.prompt');
    Route::post('/verify-email-send',[VerifyEmailPromptController::class,'verifySendEmail'])->name('verify.email.send');

    Route::get('/resend-token/{token}', [ValidateUserController::class, 'resendToken'])->middleware('throttle:auth-resend-token-limiter')->name('resend.token');
});

Route::get('/log-out', [LoginUserController::class, 'logOut'])->middleware('auth', 'web')->name('auth.log.out');

/*------------------------route user profile-----------------**/
Route::controller(ProfileController::class)->prefix('profile')->middleware(['auth', 'web','verified_user'])->group(function () {


    Route::get('/index', 'Profile')->name('user.profile');

    Route::get('/account-information',  'accountInformation')->name('user.account.information');
    Route::post('/account-information',  'updateProfile')->name('user.update.account.information');


    Route::get('/mobile-update',  'updateMobileForm')->name('mobile.update.form');
    Route::post('/mobile-update',  'updateMobile')->name('mobile.update');


    Route::get('/email-update',  'updateEmailForm')->name('email.update.form');
    Route::post('/email-update',  'updateEmail')->name('email.update');

});



Route::controller(ProfileOrderController::class)->prefix('profile')->middleware(['auth', 'web','verified_user'])->group(function () {

    //// orders
  Route::get('/all-orders', 'allOrders')->name('all.orders');

  Route::get('/current-orders', 'currentOrders')->name('current.orders');

  Route::get('/paid-orders', 'paidOrders')->name('paid.orders');

  Route::get('/unpaid-orders', 'unPaidOrders')->name('unpaid.orders');

  Route::get('/order-details/{order}/{order_number}','orderDetails')->name('order.details');

  Route::get('/returned-orders/request','orderReturnedRequest')->name('returned.orders.request');

});

Route::controller(ProfileCommentController::class)->prefix('profile')->middleware(['auth', 'web','verified_user'])->group(function () {

    //// comments
    Route::get('/comments','comments')->name('comments');

});

Route::controller(FavoritesController::class)->prefix('profile')->middleware(['auth', 'web','verified_user'])->group(function () {


    Route::get('/favorites',  'favorites')->name('favorites');

    Route::get('/favorites/delete/{product}', 'favoritesDelete')->name('favorites.delete');

});



// Route::get('/compare-products', [CompareController::class, 'index'])->name('compare.products');


Route::controller(FrontAddressController::class)->prefix('profile')->middleware(['auth', 'web','verified_user'])->group(function () {


    Route::get('/address/index', 'addresses')->name('profile.address.index');

    Route::get('/address/create','create')->name('profile.address.create');
    Route::post('/address/store', 'store')->name('profile.address.store');

    Route::get('/address/edit/{address}', 'edit')->name('profile.address.edit');
    Route::post('/address/update', 'update')->name('profile.address.update');


});

Route::controller(FrontTicketController::class)->prefix('profile')->middleware(['auth', 'web','verified_user'])->group(function () {


    Route::get('/tickets',  'index')->name('tickets');

    Route::get('/show-ticket/{ticket}',  'showTicket')->name('show.ticket');
    Route::post('/answer-ticket/{ticket}',  'answerTicket')->name('answer.ticket');

    Route::get('/new-ticket',  'newTicket')->name('new.ticket');
    Route::post('/new-ticket/store', 'ticketStore')->name('new.ticket.store');

    Route::get('/ticket-download/{ticket}', 'downloadTicketFile')->name('ticket.download');


});


Route::get('/about_us', [\App\Http\Controllers\Front\AboutUs\AboutUsController::class, 'aboutUs'])->name('about_us');

Route::get('/contact_us', [\App\Http\Controllers\Front\ContactUs\ContactUsController::class, 'contactUs'])->name('contact_us');
Route::post('/contact_us/store',[\App\Http\Controllers\Front\ContactUs\ContactUsController::class, 'store'])->name('contact_us.store');



/* ------------------- Products Front Routes -----------------**/

Route::controller(ProductController::class)->group(function () {

    // single product
    Route::get('/product/{product:slug}', 'show')->name('product');

    // search product
    Route::get('/search/products', 'products')->name('search.products');

    // get products by category
    Route::get('/category/{slug?}', 'searchCategory')->name('category');

    // add to favorites
    Route::post('/product/add-to-favorites', 'addToFavoriteProducts')->middleware('auth', 'web')->name('product.add.to.favorites');
    // add to compare
    Route::post('/product/add-to-compare', 'addToCompareProducts')->middleware('auth', 'web')->name('product.add.to.compares');

});

Route::get('/best-seller/products',[ApiProductController::class,'products'])->name('best.seller.products');


/* ------------------- Basket & address & payment Front Routes -----------------**/

Route::prefix('shopping')->middleware(['auth','web','verified_user'])->group(function(){

   Route::get('/cart/check', [CartController::class,'checkoutCart'])->name('cart.check');

});

Route::controller(AddressController::class)->middleware(['auth','web','verified_user'])->group(function(){

    Route::get('/check/address','checkAddress')->name('check.address');

    Route::post('/choose-address-delivery','chooseAddressDelivery')->name('choose.address.delivery');

    // Route::get('/get-city','getCities')->name('get.cities');

    // Route::post('/address/store','store')->name('address.store');

    // Route::post('/address/update','update')->name('address.update');

    // Route::get('/address/delete/{address}','delete')->name('address.delete');

 });


Route::controller(FrontPaymentController::class)->middleware(['auth','web','verified_user'])->group(function(){

    Route::post('/coupon-discount')->name('coupon-discount');

    Route::get('/payment/checkout','checkOut')->name('payment.checkout');

    Route::post('/payment','payment')->name('payment');

});

Route::controller(FrontPaymentController::class)->group(function(){

    Route::post('/payment/verify','paymentVerify')->name('payment.verify');

    Route::get('/payment/success/{trackId}/{order}','paymentSuccess')->name('payment.success');

    Route::get('/payment/failed/{order}','paymentFailed')->name('payment.failed');

});
/* ------------------- admin Routes ------------------------**/

// Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|admin'])->group(function () {
//
// });

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [AdminLoginController::class, 'loginForm'])->name('admin.login.form');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login');

    Route::get('/validate', [AdminValidateController::class, 'validateEmailForm'])->name('admin.validate.email.form');
    Route::post('/validate', [AdminValidateController::class, 'validateEmail'])->name('admin.validate.email');


});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [AdminProfileController::class, 'profile'])->name('profile');
    Route::post('/update/profile', [AdminProfileController::class, 'update'])->name('update.profile');

    Route::get('/edit/mobile', [AdminProfileController::class, 'editMobile'])->name('edit.mobile');
    Route::post('/update/mobile', [AdminProfileController::class, 'updateMobile'])->name('update.mobile');

    Route::get('/logout', [AdminLoginController::class, 'logOut'])->name('logout');

});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/users/index', AdminUsers::class)->name('users');
    Route::get('/admins/index', AdminAdmins::class)->name('admins');

});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/perms/index', AdminPerms::class)->name('perms');
    Route::get('/roles/index', AdminRoles::class)->name('roles');

});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/roles/list/users', ListUsersForRole::class)->name('role.list.users');
    Route::get('/roles/assign/form', [AdminRoleAssignController::class, 'create'])->name('roles.assign.form');
    Route::post('/roles/assign', [AdminRoleAssignController::class, 'store'])->name('roles.assign');

});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/perms/list/users', ListUsersForPerm::class)->name('perm.list.users');
    Route::get('/perms/assign/form', [AdminPermAssignController::class, 'create'])->name('perms.assign.form');
    Route::post('/perms/assign', [AdminPermAssignController::class, 'store'])->name('perms.assign');
});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/category/index', AdminCategoryList::class)->name('category.index');
    Route::get('/category/create', AdminCategoryCreate::class)->name('category.create');
    Route::get('/category/edit/{id}', AdminCategoryEdit::class)->name('category.edit');
});

// crud brands
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/brand/index', AdminBrandList::class)->name('brand.index');
    Route::get('/brand/create', AdminCreateBrand::class)->name('brand.create');
    Route::get('/brand/edit/{id}', AdminEditBrand::class)->name('brand.edit');

});

// crud tags
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/tag/index', AdminTag::class)->name('tag.index');

});
// crud colors
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/colors/index', AdminColors::class)->name('colors.index');

});
// crud category attribute & attribute value
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/category/attribute/index', AdminCategoryAttribute::class)->name('category.attribute.index');
    Route::get('/category/attribute/value/index/{attribute}', AdminCategoryAttributeValue::class)->name('category.attribute.value.index');

});

// crud product attribute & attribute value
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {
    ////
    Route::get('/attribute/index', AdminAttribute::class)->name('attribute.index');
    Route::get('/attribute/create/{id}', AdminAttributeCreate::class)->name('attribute.create');
    ////
    Route::get('/attribute/value/index', AdminAttributeValue::class)->name('attribute.value.index');
    Route::get('/attribute/value/create/{id}', AdminAttributeValueCreate::class)->name('attribute.value.create');

});


// crud product routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/product/index', IndexProduct::class)->name('product.index');
    // new product
    Route::get('/product/create/basic', [ProductCreateController::class, 'create'])->name('product.create.basic');
    Route::post('/product/store/basic', [ProductCreateController::class, 'store'])->name('product.store.basic');
    // edit product
    Route::get('/product/edit/basic/{product}', [ProductEditController::class, 'edit'])->name('product.edit.basic');
    Route::post('/product/update/basic', [ProductEditController::class, 'update'])->name('product.update.basic');
    // crud attribute product feature
    Route::get('/product/create/property/{product}', [ProductMetaController::class, 'index'])->name('product.create.property');
    ////
    Route::get('/product/specifications/index/{product}', [ProductCreateSpecificationsController::class, 'index'])->name('product.specifications.index');
    ////
    Route::get('/product/create/specifications/{product}', [ProductCreateSpecificationsController::class, 'index'])->name('product.create.specifications');
    Route::get('/product/edit/specifications/{attribute_product_id}/{product_id}', [ProductEditSpecificationsController::class, 'index'])->name('product.edit.specifications');
    Route::post('/product/update/specifications/{attribute_product_id}/{product_id}', [ProductEditSpecificationsController::class, 'update'])->name('product.update.specifications');
    // crud image product feature
    Route::get('/product/create/images/{product}', [ProductCreateImageController::class, 'create'])->name('product.create.images');
    // crud color product feature
    Route::get('/product/create/colors/{product}', [ProductCreateColorController::class, 'create'])->name('product.create.colors');
    // crud tag product feature
    Route::get('/product/create/tags/{product}', [ProductCreateTagController::class, 'create'])->name('product.create.tags');
    // crud guarantee product feature
    Route::get('/product-guarantee/index/{product}', [ProductWarrantyController::class, 'create'])->name('product.guarantee.index');
});

// stock product routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/stock-product/index', StockProduct::class)->name('stock.product.index');
    ////
    Route::get('/add_to_stock/{product}', [StockController::class, 'addToStockForm'])->name('add_to_stock.form');
    Route::post('/add_to_stock', [StockController::class, 'addToStock'])->name('add_to_stock');
    ////
    Route::get('/modify_stock/{product}', [StockController::class, 'modifyStockForm'])->name('modify_stock.form');
    Route::post('/modify_stock', [StockController::class, 'modifyStock'])->name('modify_stock');

});

// payments routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/payments-all/index', [PaymentController::class, 'index'])->name('payments.all.index');
    ////
    Route::get('/payments-offline/index', [PaymentController::class, 'offline'])->name('payments.offline.index');
    Route::get('/payments-online/index', [PaymentController::class, 'online'])->name('payments.online.index');
    Route::get('/payments-cash/index', [PaymentController::class, 'cash'])->name('payments.cash.index');
    ////
    Route::get('/payment-canceled/{payment}', [PaymentController::class, 'canceled'])->name('payment.canceled');
    Route::get('/payment-returned/{payment}', [PaymentController::class, 'returned'])->name('payment.returned');
    ////
    Route::get('/payment-show/{payment}', [PaymentController::class, 'show'])->name('payment.show');

});

// common discount routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/common-discount/index', [CommonDiscountController::class, 'index'])->name('common.discount.index');
    ////
    Route::get('/common-discount/create', [CommonDiscountController::class, 'create'])->name('common.discount.create');
    Route::post('/common-discount/store', [CommonDiscountController::class, 'store'])->name('common.discount.store');
    ////
    Route::get('/common-discount/edit/{discount}', [CommonDiscountController::class, 'edit'])->name('common.discount.edit');
    Route::post('/common-discount/update', [CommonDiscountController::class, 'update'])->name('common.discount.update');

});

// amazing sale routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/amazing-sale/index', [AmazingSalesController::class, 'index'])->name('amazing.sale.index');
    ////
    Route::get('/amazing-sale/create', [AmazingSalesController::class, 'create'])->name('amazing.sale.create');
    Route::post('/amazing-sale/store', [AmazingSalesController::class, 'store'])->name('amazing.sale.store');
    ////
    Route::get('/amazing-sale/edit/{amazingSale}', [AmazingSalesController::class, 'edit'])->name('amazing.sale.edit');
    Route::post('/amazing-sale/update', [AmazingSalesController::class, 'update'])->name('amazing.sale.update');

});

// coupon routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/coupons/index', [CouponDiscountController::class, 'index'])->name('coupons.index');
    ////
    Route::get('/coupons/create', [CouponDiscountController::class, 'create'])->name('coupons.create');
    Route::post('/coupons/store', [CouponDiscountController::class, 'store'])->name('coupons.store');
    ////
    Route::get('/coupons/edit/{coupon}', [CouponDiscountController::class, 'edit'])->name('coupons.edit');
    Route::post('/coupons/update', [CouponDiscountController::class, 'update'])->name('coupons.update');

});


// order routes

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/all-orders', AdminAllOrders::class)->name('orders.index');

    Route::get('/orders-new', [AdminOrderController::class, 'newOrders'])->name('orders.new');

    Route::get('/orders-sending', [AdminOrderController::class, 'sending'])->name('orders.sending');

    Route::get('/orders-unpaid', [AdminOrderController::class, 'unpaid'])->name('orders.unpaid');

    Route::get('/orders-paid', [AdminOrderController::class, 'paid'])->name('orders.paid');

    Route::get('/orders-canceled', [AdminOrderController::class, 'canceled'])->name('orders.canceled');

    Route::get('/orders-returned', [AdminOrderController::class, 'returned'])->name('orders.returned');

    Route::get('/show-order/{order}', [AdminOrderController::class, 'show'])->name('order.show');

    Route::get('/order-details/{order}', [AdminOrderController::class, 'details'])->name('order.details');

});

// shipment routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/delivery/index', AdminDelivery::class)->name('delivery.index');
    Route::get('/delivery/create', [AdminDeliveryController::class, 'create'])->name('delivery.create');
    Route::post('/delivery/store', [AdminDeliveryController::class, 'store'])->name('delivery.store');
    Route::get('/delivery/edit/{delivery}', [AdminDeliveryController::class, 'edit'])->name('delivery.edit');
    Route::post('/delivery/update', [AdminDeliveryController::class, 'update'])->name('delivery.update');

});

// province routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/province/index', [AdminProvinceController::class, 'index'])->name('province.index');
    Route::post('/province/store', [AdminProvinceController::class, 'store'])->name('province.store');
    ////
    Route::get('/province/edit/{province}', [AdminProvinceController::class, 'edit'])->name('province.edit');
    Route::post('/province/update', [AdminProvinceController::class, 'update'])->name('province.update');
    ////
    Route::get('/province/delete/{province}', [AdminProvinceController::class, 'delete'])->name('province.delete');

});

// cities routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/city/create', [AdminCityController::class, 'create'])->name('city.create');
    Route::post('/city/store', [AdminCityController::class, 'store'])->name('city.store');
    ////
    Route::get('/city/edit/{city}', [AdminCityController::class, 'edit'])->name('city.edit');
    Route::post('/city/update', [AdminCityController::class, 'update'])->name('city.update');
    /////
    Route::post('/city/delete/{city}', [AdminCityController::class, 'delete'])->name('city.delete');

});
// ticket routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/category-tickets', [AdminCategoryTicketController::class, 'categoryTickets'])->name('category.tickets');
    Route::get('/category-ticket/create', [AdminCategoryTicketController::class, 'create'])->name('category.ticket.create');
    Route::post('/category-ticket/store', [AdminCategoryTicketController::class, 'store'])->name('category.ticket.store');
    Route::get('/category-ticket/edit/{ticketCategory}', [AdminCategoryTicketController::class, 'edit'])->name('category.ticket.edit');
    Route::post('/category-ticket/update', [AdminCategoryTicketController::class, 'update'])->name('category.ticket.update');
    ////
    Route::get('/priority-tickets', [AdminPriorityTicketController::class, 'priorityTickets'])->name('priority.tickets');
    Route::get('/priority-ticket/create', [AdminPriorityTicketController::class, 'create'])->name('priority.ticket.create');
    Route::post('/priority-ticket/store', [AdminPriorityTicketController::class, 'store'])->name('priority.ticket.store');
    Route::get('/priority-ticket/edit/{ticketPriority}', [AdminPriorityTicketController::class, 'edit'])->name('priority.ticket.edit');
    Route::post('/priority-ticket/update', [AdminPriorityTicketController::class, 'update'])->name('priority.ticket.update');

});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/all-tickets', [AdminTicketController::class, 'allTickets'])->name('all.tickets');
    Route::get('/new-tickets', [AdminTicketController::class, 'newTickets'])->name('new.tickets');
    Route::get('/open-tickets', [AdminTicketController::class, 'openTickets'])->name('open.tickets');
    Route::get('/close-tickets', [AdminTicketController::class, 'closeTickets'])->name('close.tickets');
    Route::get('/show-ticket/{ticket}', [AdminTicketController::class, 'showTicket'])->name('show.ticket');
    Route::post('/answer-ticket/{ticket}', [AdminTicketController::class, 'answer'])->name('answer.ticket');
    Route::get('/change-status/ticket/{ticket}', [AdminTicketController::class, 'changeStatus'])->name('change.status.ticket');

});

Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'verify_admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/admin-tickets/index', [AdminAdminTicketController::class, 'index'])->name('admin.tickets.index');
    Route::get('/set/admin-ticket/{admin}', [AdminAdminTicketController::class, 'setAdmin'])->name('set.admin.ticket');

});

// comments routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/product_comments/index', [AdminCommentController::class, 'productIndexComments'])->name('product_comments.index');
    Route::get('/comments/index/product/{product}', [AdminCommentController::class, 'productComments'])->name('comments.index.product');
    Route::get('/comment/show/{comment}', AdminSingleComment::class)->name('comment.show');

});


// setting routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/setting/index', AdminSetting::class)->name('setting.index');
    Route::get('/setting/edit/{setting}', [SettingController::class, 'edit'])->name('setting.edit');
    Route::post('/setting/update', [SettingController::class, 'update'])->name('setting.update');

});

//// banners routes


// custom  banner
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {
    ////
    Route::get('/custom-banners/index',AdminCustomBanner::class)->name('custom.banners.index');

    ////
    Route::get('/custom-banner/create', [AdminCustomBannerController::class, 'create'])->name('custom.banner.create');
    Route::post('/custom-banner/store', [AdminCustomBannerController::class, 'store'])->name('custom.banner.store');
    // ////
    // Route::get('/newest-product/edit/{banner}', [AdminNewestController::class, 'edit'])->name('newest.product.edit');
    // Route::post('/newest-product/update', [AdminNewestController::class, 'update'])->name('newest.product.update');
});


// newest products banner
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {
     ////
     Route::get('/newest-product/index',AdminNewestBanner ::class)->name('newest.product.index');
     ////
     Route::get('/newest-product/create', [AdminNewestController::class, 'create'])->name('newest.product.create');
     Route::post('/newest-product/store', [AdminNewestController::class, 'store'])->name('newest.product.store');
     ////
     Route::get('/newest-product/edit/{banner}', [AdminNewestController::class, 'edit'])->name('newest.product.edit');
     Route::post('/newest-product/update', [AdminNewestController::class, 'update'])->name('newest.product.update');
});


// suggestion products banner
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {
    ////
    Route::get('/suggestion-products/index',AdminSuggestionBanner ::class)->name('suggestion.products.index');
    ////
    Route::get('/suggestion-products/create', [AdminSuggestionController::class, 'create'])->name('suggestion.products.create');
    Route::get('/suggestion-products/add/{product}', [AdminSuggestionController::class, 'store'])->name('suggestion.products.store');
    ////
    Route::get('/suggestion-products/edit/{banner}', [AdminSuggestionController::class, 'edit'])->name('suggestion.products.edit');
    Route::post('/suggestion-products/update', [AdminSuggestionController::class, 'update'])->name('suggestion.products.update');
});


// most visited slider
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {
    ////
    Route::get('/most-visited/index',AdminMostVisitedSlider ::class)->name('most.visited.index');
    ////
    Route::get('/most-visited/create', [AdminMostVisitedController::class, 'create'])->name('most.visited.create');
    Route::post('/most-visited/store', [AdminMostVisitedController::class, 'store'])->name('most.visited.store');
    ////
    Route::get('/most-visited/edit/{banner}', [AdminMostVisitedController::class, 'edit'])->name('most.visited.edit');
    Route::post('/most-visited/update', [AdminMostVisitedController::class, 'update'])->name('most.visited.update');
});

// best seller slider
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/best-seller/index',AdminBestSellerSlider::class)->name('best.seller.index');
    ////
    Route::get('/best-seller/create', [AdminBestSellerController::class, 'create'])->name('best.seller.create');
    Route::post('/best-seller/store', [AdminBestSellerController::class, 'store'])->name('best.seller.store');
    ////
    Route::get('/best-seller/edit/{banner}', [AdminBestSellerController::class, 'edit'])->name('best.seller.edit');
    Route::post('/best-seller/update', [AdminBestSellerController::class, 'update'])->name('best.seller.update');

});


// Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {
//     // top banner
//     Route::get('/top-banner/index', AdminTopBanner::class)->name('top.banner.index');
//     ////
//     Route::get('/top-banner/create', [TopBannerController::class, 'create'])->name('top.banner.create');
//     Route::post('/top-banner/store', [TopBannerController::class, 'store'])->name('top.banner.store');
//     ////
//     Route::get('/top-banner/edit/{banner}', [TopBannerController::class, 'edit'])->name('top.banner.edit');
//     Route::post('/top-banner/update', [TopBannerController::class, 'update'])->name('top.banner.update');

//     // main slider banner

//     Route::get('/main-slider/index', AdminMainSlider::class)->name('main.slider.index');
//     ////
//     Route::get('/main-slider/create', [MainSliderController::class, 'create'])->name('main.slider.create');
//     Route::post('/main-slider/store', [MainSliderController::class, 'store'])->name('main.slider.store');
//     ////
//     Route::get('/main-slider/edit/{banner}', [MainSliderController::class, 'edit'])->name('main.slider.edit');
//     Route::post('/main-slider/update', [MainSliderController::class, 'update'])->name('main.slider.update');

//     // amazing_offer_banner

//     Route::get('/amazing-banner/index', AdminAmazingOfferBanner::class)->name('amazing.banner.index');
//     ////
//     Route::get('/amazing-banner/create', [AmazingOfferBannerController::class, 'create'])->name('amazing.banner.create');
//     Route::post('/amazing-banner/store', [AmazingOfferBannerController::class, 'store'])->name('amazing.banner.store');
//     ////
//     Route::get('/amazing-banner/edit/{banner}', [AmazingOfferBannerController::class, 'edit'])->name('amazing.banner.edit');
//     Route::post('/amazing-banner/update', [AmazingOfferBannerController::class, 'update'])->name('amazing.banner.update');

//     // bottom two banner

//     Route::get('/bottom-banner/index', AdminBottomTwoBanner::class)->name('bottom.banner.index');
//     ////
//     Route::get('/bottom-banner/create', [BottomBannerController::class, 'create'])->name('bottom.banner.create');
//     Route::post('/bottom-banner/store', [BottomBannerController::class, 'store'])->name('bottom.banner.store');
//     ////
//     Route::get('/bottom-banner/edit/{banner}', [BottomBannerController::class, 'edit'])->name('bottom.banner.edit');
//     Route::post('/bottom-banner/update', [BottomBannerController::class, 'update'])->name('bottom.banner.update');


//     // product by category slider
//     Route::get('/product-category/index', [ProductByCategorySliderController::class, 'index'])->name('product.category.index');
//     Route::post('/product-category/store', [ProductByCategorySliderController::class, 'store'])->name('product.category.store');
//     Route::get('/product-category/destroy/{category}', [ProductByCategorySliderController::class, 'destroy'])->name('product.category.destroy');


// });

// notification routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/notification/read-all', [NotificationController::class, 'readNotifications'])->name('notification.read.all');

});

// Notifications email& sms
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {


    //// email notices routes
    Route::get('/email-notices/index', [AdminEmailNoticesController::class, 'index'])->name('email.notices.index');
    // create
    Route::get('/email-notices/create', [AdminEmailNoticesController::class, 'create'])->name('email.notices.create');
    Route::post('/email-notices/store', [AdminEmailNoticesController::class, 'store'])->name('email.notices.store');
    // edit
    Route::get('/email-notices/edit/{publicMail}', [AdminEmailNoticesController::class, 'edit'])->name('email.notices.edit');
    Route::post('/email-notices/update', [AdminEmailNoticesController::class, 'update'])->name('email.notices.update');
    // send mail
    Route::get('/send-mail/{mail}', [AdminEmailNoticesController::class, 'sendMail'])->name('notices.send.mail');
    //// sms notices routes
    Route::get('/sms-notices/index', [AdminSMSNoticeController::class, 'index'])->name('sms.notices.index');
    // create
    Route::get('/sms-notices/create', [AdminSMSNoticeController::class, 'create'])->name('sms.notices.create');
    Route::post('/sms-notices/store', [AdminSMSNoticeController::class, 'store'])->name('sms.notices.store');
    // edit
    Route::get('/sms-notices/edit/{publicSms}', [AdminSMSNoticeController::class, 'edit'])->name('sms.notices.edit');
    Route::post('/sms-notices/update', [AdminSMSNoticeController::class, 'update'])->name('sms.notices.update');
    // send sms
    Route::get('/send-sms/{publicSms}', [AdminSMSNoticeController::class, 'sendSms'])->name('notices.send.sms');

});


// email notices  file routes
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', 'role:admin|super_admin'])->group(function () {

    Route::get('/email-notice-file/index', [AdminEmailNoticeFileController::class, 'emailFileIndex'])->name('email.notice.file.index');
    Route::get('/email-notice-file/create', [AdminEmailNoticeFileController::class, 'create'])->name('email.notice.file.create');
    Route::post('/email-notice-file/store', [AdminEmailNoticeFileController::class, 'store'])->name('email.notice.file.store');

});
