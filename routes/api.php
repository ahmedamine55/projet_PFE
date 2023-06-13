<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Categories
    Route::apiResource('categories', 'CategorieApiController');

    // Types
    Route::apiResource('types', 'TypeApiController');

    // Bijoutiers
    Route::apiResource('bijoutiers', 'BijoutierApiController');

    // Payes
    Route::apiResource('payes', 'PayeApiController');

    // Addb Bijouxes
    Route::apiResource('addb-bijouxes', 'AddbBijouxApiController');

    // Currencies
    Route::apiResource('currencies', 'CurrencyApiController');

    // Check Articles
    Route::apiResource('check-articles', 'CheckArticleApiController');
});
