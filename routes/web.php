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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
/*
/Auto Create Routes by Auth
// Authentication Routes...
/$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
/$this->post('login', 'Auth\LoginController@login');
/$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
/$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
/$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
/$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
/$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
/$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
/$this->post('password/reset', 'Auth\ResetPasswordController@reset');
*/



Route::get('find-dog-breeder', function () {
    return view('find-dog-breeders');
})->name('find-dog-breeder');

Route::get('find-cat-breeder', function () {
    return view('find-cat-breeders');
})->name('find-cat-breeder');

Route::get('dog-breeds', function () {
    return view('dog-breeds');
})->name('dog-breeds');

Route::get('cat-breeds', function () {
    return view('cat-breeds');
})->name('cat-breeds');

Route::get('dog-and-cat-news', function () {
    return view('dog-and-cat-news');
})->name('dog-and-cat-news');

Route::get('view-breeds', function () {
    return view('view-breeds');
})->name('view-breeds');


Route::prefix('manage')->middleware('role:superadministrator|administrator')->group(function () {
  Route::get('/', 'ManageController@index');
  Route::get('/dashboard','ManageController@dashboard')->name('manage.dashboard');
  Route::resource('/users','UserController');
  Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
  Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
});

Route::prefix('breeds')->group(function () {
  Route::get('/', 'BreedsController@index')->name('breeds.index');
  Route::get('/view', 'BreedsController@view')->name('breeds.view');
  Route::get('/edit','BreedsController@edit')->name('breeds.edit');
  Route::get('/add','BreedsController@add')->name('breeds.add');
  Route::get('/delete','BreedsController@delete')->name('breeds.delete');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('redirect', 'RedirectController@index')->name('redirect');
