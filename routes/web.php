<?php

use App\Http\Controllers\Admin\CheckArticleController;
use App\Http\Controllers\ClientController;

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

    // Categories
    Route::delete('categories/destroy', 'CategorieController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategorieController');

    // Types
    Route::delete('types/destroy', 'TypeController@massDestroy')->name('types.massDestroy');
    Route::resource('types', 'TypeController');

    // Bijoutiers
    Route::delete('bijoutiers/destroy', 'BijoutierController@massDestroy')->name('bijoutiers.massDestroy');
    Route::resource('bijoutiers', 'BijoutierController');

    // Payes
    Route::delete('payes/destroy', 'PayeController@massDestroy')->name('payes.massDestroy');
    Route::resource('payes', 'PayeController');

    // Addb Bijouxes
    Route::delete('addb-bijouxes/destroy', 'AddbBijouxController@massDestroy')->name('addb-bijouxes.massDestroy');
    Route::resource('addb-bijouxes', 'AddbBijouxController');

    // Currencies
    Route::delete('currencies/destroy', 'CurrencyController@massDestroy')->name('currencies.massDestroy');
    Route::resource('currencies', 'CurrencyController');

    // Check Articles
    Route::delete('check-articles/destroy', 'CheckArticleController@massDestroy')->name('check-articles.massDestroy');
    Route::resource('check-articles', 'CheckArticleController');
    //Route::get( 'check-articles', [CheckArticleController::class,'index']);
    Route::get( 'articleViewOld', 'CheckArticleController@articleViewOld')->name('articleViewOld');
    Route::get('changeOld/{id}','CheckArticleController@makeItOld')->name('changeOld');
    Route::get('changeNew/{id}','CheckArticleController@makeItNew')->name('changeNew');

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
Route::prefix('blingstyle')->group(function () {
    Route::get( '/', 'ClientController@home')->name("client.acceuil");
    Route::get( '/products', 'ClientController@products')->name("client.products");
    Route::get( '/products/productdetails/{id}', 'ClientController@pdetails')->name("client.pdetails");
    Route::get( '/shops', 'ClientController@shops')->name("client.shops");
    Route::get( '/shops/shopdetails/{id}', 'ClientController@shop_details')->name("client.shop_details");

});

