<?php

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

Route::get('/', 'IndexController@index');

Route::get('/categories/{category}', 'Promotions\CategoryController@show')->name('category.show');

Route::get('/search', 'SearchController@index')->name('search.index');

Route::get('/promotions/{promotion}', 'Promotions\PromotionController@show')->name('promotion.show');

// WebAPI
Route::group(['prefix' => 'webapi', 'namespace' => 'Webapi'], function () {
  Route::get('/locations', 'LocationController@index');
});

// External redirects
Route::get('/redirect/{promotion}', function (App\Models\Promotions\Promotion $promotion) {
  $url = $promotion->website;
  if ((substr($url, 0, 7) !== 'http://') && (substr($url, 0, 8) !== 'https://')) {
    return redirect()->to("http://{$url}");
  }
  return redirect()->to($url);
})->name('redirect.external');
