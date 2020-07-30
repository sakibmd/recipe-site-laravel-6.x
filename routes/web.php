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

use App\Http\Controllers\HomeController;

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('recipe/{slug}', 'HomeController@details')->name('recipe.details');
Route::get('recipes', 'HomeController@allRecipe')->name('recipe.allRecipe');



Route::group([ 
    'as' => 'admin.', 
    'prefix' => 'admin', 
    'namespace' => 'Admin', 
    'middleware' => [ 
        'auth', 'admin' 
    ]
], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('recipe','RecipeController');

    Route::get('memberlist','MemberController@index')->name('memberlist.index');
    Route::delete('memberlist/{id}','MemberController@destroy')->name('member.destroy');

    Route::get('profile-info','SettingsController@index')->name('profile');
    Route::get('profile-info/edit','SettingsController@edit')->name('profile.edit');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
});

Route::group([ 
    'as' => 'member.', 
    'prefix' => 'member', 
    'namespace' => 'Member', 
    'middleware' => [ 
    'auth', 'member' 
    ]
], function () {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('recipe','RecipeController');
    
    Route::get('profile-info','SettingsController@index')->name('profile');
    Route::get('profile-info/edit','SettingsController@edit')->name('profile.edit');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
});


