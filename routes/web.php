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

Route::group([], function(){
    Route::match(['get', 'post'], '/', 'IndexController@execute')->name('home1');
    Route::get('/page/{alias}', 'PageController@execute')->name('page');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/', function() {
        if(view()->exists('admin.index')) {
            $data = [
                'title' =>'Панель администратора'
            ];
            return view('admin.index', $data);
        }
    });

    Route::group(['prefix' => 'pages'], function() {
        Route::get('/', 'PagesController@execute')->name('pages');
        Route::match(['get', 'post'], '/add', 'PagesAddController@execute')->name('pagesAdd');
        Route::match(['get', 'post', 'delete'], '/edit/{page}', 'PagesEditController@execute')->name('pagesEdit');
    });
    
    Route::group(['prefix' => 'portfolio'], function() {
        Route::get('/', 'PortfoliosController@execute')->name('portfolios');
        Route::match(['get', 'post'], '/add', 'PortfoliosAddController@execute')->name('portfoliosAdd');
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', 'PortfoliosEditController@execute')->name('portfoliosEdit');
    });
    
    Route::group(['prefix' => 'teams'], function() {
        Route::get('/', 'TeamsController@execute')->name('teams');
        Route::match(['get', 'post'], '/add', 'TeamsAddController@execute')->name('teamsAdd');
        Route::match(['get', 'post', 'delete'], '/edit/{team}', 'TeamsEditController@execute')->name('teamsEdit');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
