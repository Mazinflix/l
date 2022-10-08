<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Shoe
    Route::delete('shoes/destroy', 'ShoeController@massDestroy')->name('shoes.massDestroy');
    Route::resource('shoes', 'ShoeController');

    // Shoes Options
    Route::delete('shoes-options/destroy', 'ShoesOptionsController@massDestroy')->name('shoes-options.massDestroy');
    Route::post('shoes-options/media', 'ShoesOptionsController@storeMedia')->name('shoes-options.storeMedia');
    Route::post('shoes-options/ckmedia', 'ShoesOptionsController@storeCKEditorImages')->name('shoes-options.storeCKEditorImages');
    Route::resource('shoes-options', 'ShoesOptionsController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Perfumee
    Route::delete('perfumees/destroy', 'PerfumeeController@massDestroy')->name('perfumees.massDestroy');
    Route::post('perfumees/media', 'PerfumeeController@storeMedia')->name('perfumees.storeMedia');
    Route::post('perfumees/ckmedia', 'PerfumeeController@storeCKEditorImages')->name('perfumees.storeCKEditorImages');
    Route::resource('perfumees', 'PerfumeeController');

    // Slipper
    Route::delete('slippers/destroy', 'SlipperController@massDestroy')->name('slippers.massDestroy');
    Route::resource('slippers', 'SlipperController');

    // Slipper Option
    Route::delete('slipper-options/destroy', 'SlipperOptionController@massDestroy')->name('slipper-options.massDestroy');
    Route::post('slipper-options/media', 'SlipperOptionController@storeMedia')->name('slipper-options.storeMedia');
    Route::post('slipper-options/ckmedia', 'SlipperOptionController@storeCKEditorImages')->name('slipper-options.storeCKEditorImages');
    Route::resource('slipper-options', 'SlipperOptionController');

    // Wearable
    Route::delete('wearables/destroy', 'WearableController@massDestroy')->name('wearables.massDestroy');
    Route::resource('wearables', 'WearableController');

    // Wearable Option
    Route::delete('wearable-options/destroy', 'WearableOptionController@massDestroy')->name('wearable-options.massDestroy');
    Route::post('wearable-options/media', 'WearableOptionController@storeMedia')->name('wearable-options.storeMedia');
    Route::post('wearable-options/ckmedia', 'WearableOptionController@storeCKEditorImages')->name('wearable-options.storeCKEditorImages');
    Route::resource('wearable-options', 'WearableOptionController');

    // Customer
    Route::delete('customers/destroy', 'CustomerController@massDestroy')->name('customers.massDestroy');
    Route::post('customers/media', 'CustomerController@storeMedia')->name('customers.storeMedia');
    Route::post('customers/ckmedia', 'CustomerController@storeCKEditorImages')->name('customers.storeCKEditorImages');
    Route::resource('customers', 'CustomerController');

    // Wearable Order
    Route::delete('wearable-orders/destroy', 'WearableOrderController@massDestroy')->name('wearable-orders.massDestroy');
    Route::resource('wearable-orders', 'WearableOrderController');

    // Slipper Order
    Route::delete('slipper-orders/destroy', 'SlipperOrderController@massDestroy')->name('slipper-orders.massDestroy');
    Route::resource('slipper-orders', 'SlipperOrderController');

    // Perfume Order
    Route::delete('perfume-orders/destroy', 'PerfumeOrderController@massDestroy')->name('perfume-orders.massDestroy');
    Route::resource('perfume-orders', 'PerfumeOrderController');

    // Wallet
    Route::delete('wallets/destroy', 'WalletController@massDestroy')->name('wallets.massDestroy');
    Route::post('wallets/media', 'WalletController@storeMedia')->name('wallets.storeMedia');
    Route::post('wallets/ckmedia', 'WalletController@storeCKEditorImages')->name('wallets.storeCKEditorImages');
    Route::resource('wallets', 'WalletController');

    // Wallet Order
    Route::delete('wallet-orders/destroy', 'WalletOrderController@massDestroy')->name('wallet-orders.massDestroy');
    Route::resource('wallet-orders', 'WalletOrderController');

    //orders
    Route::get('all-orders', HomeController::class, 'orders')->name('orders.all');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('shoes_options', function (Request $request) {

    $options = DB::table('shoes_options')->where('shoe_id', $request->shoe_id)->pluck("option", "id");

    return response()->json($options);
})->name('shoes_options');