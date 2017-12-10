<?php

// Route::get('/', 'IndexController@index');

Route::group(['namespace' => 'V2'], function () {
  Route::get('/', 'IndexController@index');
});

Route::get('/categories/{category}', 'Promotions\CategoryController@show')->name('category.show');

// Route::get('/search', 'SearchController@index')->name('search.index');

Route::get('/promotions/{promotion}', 'Promotions\PromotionController@show')->name('promotion.show');

// Application for discount
Route::post('/promotions/{promotion}/applications', 'Promotions\ApplicationController@store')
    ->name('application.store');

// WebAPI
Route::group(['prefix' => 'webapi', 'namespace' => 'Webapi'], function () {
  Route::get('/locations', 'LocationController@index');
  //V2 WebAPI routes
  Route::get('/promotions', 'Promotions\PromotionController@index');
});

// External redirects
Route::get('/redirect/{promotion}', function (App\Models\Promotions\Promotion $promotion) {
  $url = $promotion->website;
  if ((substr($url, 0, 7) !== 'http://') && (substr($url, 0, 8) !== 'https://')) {
    return redirect()->to("http://{$url}");
  }
  return redirect()->to($url);
})->name('redirect.external');

// Authentication
Auth::routes();

// User dashboard and profile
Route::get('/home', 'HomeController@index')->name('home');

// Legal documents
Route::group(['prefix' => 'legal'], function () {
  Route::get('/terms', function () {
    return view('legal.terms');
  })->name('legal.terms');
  Route::get('/privacy', function () {
    return view('legal.privacy');
  })->name('legal.privacy');
});