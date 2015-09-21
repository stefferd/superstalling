<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Admin */
Route::get('admin/',  ['as' => 'admin.login', 'uses' => 'LoginController@login']);
Route::post('admin/',  ['as' => 'admin.authenticate', 'uses' => 'LoginController@authenticate']);
Route::group(['prefix' => 'admin', 'before' => 'auth'], function() {
    /* Admin specific routes */
    Route::get('/logout', ['as' => 'admin.logout', 'uses' => 'LoginController@logout']);
    Route::get('/dashboard', ['as' => 'admin.dashboard.index', 'uses' => 'DashboardController@index']);

    /* Admin : users */
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', ['as' => 'admin.users.index', 'uses' => 'UserController@index']);
        Route::get('/{id}/edit/', ['as' => 'admin.users.edit', 'uses' => 'UserController@edit']);
        Route::post('/{id}/edit/', ['as' => 'admin.users.update', 'uses' => 'UserController@update']);
        Route::get('/{id}/delete/', ['as' => 'admin.users.delete', 'uses' => 'UserController@delete']);
        Route::get('/create/', ['as' => 'admin.users.new', 'uses' => 'UserController@add']);
        Route::post('/create/', ['as' => 'admin.users.create', 'uses' => 'UserController@create']);
    });

    /* Admin : cataloge */
    Route::group(['prefix' => 'catalog'], function() {
        Route::get('/', ['as' => 'admin.catalog.index', 'uses' => 'CatalogController@index']);
        Route::get('/edit/{id}/', ['as' => 'admin.catalog.edit', 'uses' => 'CatalogController@edit']);
        Route::post('/edit/{id}/', ['as' => 'admin.catalog.update', 'uses' => 'CatalogController@update']);
        Route::get('/delete/{id}/', ['as' => 'admin.catalog.delete', 'uses' => 'CatalogController@destroy']);
        Route::get('/create/', ['as' => 'admin.catalog.new', 'uses' => 'CatalogController@create']);
        Route::post('/create/', ['as' => 'admin.catalog.create', 'uses' => 'CatalogController@store']);
        Route::get('/delete/picture/{id}', ['as' => 'admin.catalog.deletePicture', 'uses' => 'CatalogController@deleteImage']);
    });

    /* Admin : pages */
    Route::group(['prefix' => 'pages'], function() {
        Route::get('/', ['as' => 'admin.pages.index', 'uses' => 'PageController@index']);
        Route::get('/{id}/edit/', ['as' => 'admin.pages.edit', 'uses' => 'PageController@edit']);
        Route::post('/{id}/edit/', ['as' => 'admin.pages.update', 'uses' => 'PageController@update']);
        Route::get('/{id}/delete/', ['as' => 'admin.pages.delete', 'uses' => 'PageController@delete']);
        Route::get('/create/', ['as' => 'admin.pages.new', 'uses' => 'PageController@add']);
        Route::post('/create/', ['as' => 'admin.pages.create', 'uses' => 'PageController@create']);
    });

    /* Admin : news */
    Route::group(['prefix' => 'news'], function() {
        Route::get('/', ['as' => 'admin.news.index', 'uses' => 'NewsController@index']);
        Route::get('/{id}/edit/', ['as' => 'admin.news.edit', 'uses' => 'NewsController@edit']);
        Route::post('/{id}/edit/', ['as' => 'admin.news.update', 'uses' => 'NewsController@update']);
        Route::get('/{id}/delete/', ['as' => 'admin.news.delete', 'uses' => 'NewsController@delete']);
        Route::get('/create/', ['as' => 'admin.news.new', 'uses' => 'NewsController@add']);
        Route::post('/create/', ['as' => 'admin.news.create', 'uses' => 'NewsController@create']);
    });

    /* Admin : newsletter */
    Route::group(['prefix' => 'newsletter'], function() {
        Route::get('/', ['as' => 'admin.newsletter.index', 'uses' => 'NewsletterController@index']);
        Route::get('/{id}/delete/', ['as' => 'admin.newsletter.delete', 'uses' => 'NewsletterController@delete']);
        Route::get('/{catalog}/create/', ['as' => 'admin.newsletter.new', 'uses' => 'NewsletterController@add']);
        Route::post('/{catalog}/create/', ['as' => 'admin.newsletter.create', 'uses' => 'NewsletterController@create']);
    });

    /* Admin : subscriber */
    Route::group(['prefix' => 'subscriber'], function() {
        Route::get('/', ['as' => 'admin.subscriber.index', 'uses' => 'SubscriberController@index']);
        Route::post('/', ['as' => 'admin.subscriber.create', 'uses' => 'SubscriberController@create']);
        Route::get('/{id}/delete/', ['as' => 'admin.subscriber.delete', 'uses' => 'SubscriberController@delete']);
    });

    /* Admin : settings */
    Route::group(['prefix' => 'settings'], function() {
        Route::get('/', ['as' => 'admin.settings.index', 'uses' => 'SettingsController@index']);
        Route::get('/{id}/edit/', ['as' => 'admin.settings.edit', 'uses' => 'SettingsController@edit']);
        Route::post('/{id}/edit/', ['as' => 'admin.settings.update', 'uses' => 'SettingsController@update']);
    });

    /* Admin : offer */
    Route::group(['prefix' => 'offer'], function() {
        Route::get('/', ['as' => 'admin.offer.index', 'uses' => 'OfferController@index']);
        Route::get('/{id}/edit/', ['as' => 'admin.offer.edit', 'uses' => 'OfferController@edit']);
        Route::post('/{id}/edit/', ['as' => 'admin.offer.update', 'uses' => 'OfferController@update']);
    });
});

//Route::get('/install', function() {
//    Artisan::call('migrate', array('--force' => true));
//    Artisan::call('db:seed', array('--force' => true));
//});

Route::get('/install/migrate', function() {
    Artisan::call('migrate', array('--force' => true));
    Artisan::call('db:seed', array('--force' => true));
});

/* Frontend */
Route::get('/', ['as' => 'front.index', 'uses' => 'FrontController@index']);
Route::get('/inventory', ['as' => 'front.inventory', 'uses' => 'FrontController@inventory']);
Route::post('/inventory', ['as' => 'front.inventory.filter', 'uses' => 'FrontController@filter']);
Route::get('/inventory/sold/', ['as' => 'front.inventory.sold', 'uses' => 'FrontController@sold']);
Route::get('/inventory/{id}/details', ['as' => 'front.inventory.details', 'uses' => 'FrontController@details']);
Route::post('/inventory/{id}/details', ['as' => 'front.inventory.contact', 'uses' => 'FrontController@detailsContact']);
Route::get('/inventory/{filter}/{value}', ['as' => 'front.inventory.prefilter', 'uses' => 'FrontController@filter']);
Route::get('/newsletter/unsubscribe/{user}', ['as' => 'front.newsletter.unsubscribe', 'uses' => 'FrontController@unsubscribe']);
Route::post('/subscribe', ['as' => 'front.newsletter', 'uses' => 'FrontController@subscribe']);
Route::post('/contact', ['as' => 'front.contact', 'uses' => 'FrontController@contact']);
Route::get('/{pageName}', ['as' => 'front.page', 'uses' => 'FrontController@page', 'except' => 'admin, install, inventory, newsubscription, newsletter']);

// ===============================================
// 404 ===========================================
// ===============================================

App::missing(function($exception)
{

    // shows an error page (app/views/error.blade.php)
    // returns a page not found error
    return Response::view('error', array(), 404);
});

App::error(function($exception) {
    return Response::view('error', array(), 500);
});
