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
    return view('home');
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



Route::get('dog-and-cat-news', function () {
    return view('dog-and-cat-news');
})->name('dog-and-cat-news');

Route::get('view-news', function () {
    return view('view-article');
})->name('view-news');

Route::get('find-cat-breeder', ['uses' =>'SearchController@findcatbreeder'])->name('find-cat-breeder');
Route::get('find-dog-breeder', ['uses' =>'SearchController@finddogbreeder'])->name('find-dog-breeder');
Route::get('find-breeder', ['uses' =>'SearchController@findallbreeders'])->name('find-breeders');

Route::get('dog-breeds', 'BreedsController@viewDogs')->name('dog-breeds');
Route::get('cat-breeds', 'BreedsController@viewCats')->name('cat-breeds');
Route::get('view-breeds', 'BreedsController@view')->name('view-breeds');

Route::prefix('manage')->middleware('role:superadministrator|administrator')->group(function () {
  Route::get('/', 'ManageController@index');
  Route::get('/dashboard','ManageController@dashboard')->name('manage.dashboard');
  Route::resource('/users','UserController');
  Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
  Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
  Route::prefix('breeders')->group(function () {
      Route::get('/dashboard','ManageController@breedersView')->name('manage.breeders.dashboard');
      Route::get('/view','ManageController@breedersView')->name('manage.breeders.view');
      Route::get('/add','ListingCreator@manageBreedersAdd')->name('manage.breeders.add');
      Route::post('/add','ListingCreator@manageBreedersProcessAdd')->name('manage.breeders.process.add');
      Route::get('/','ManageController@breedersView');
  });
});

Route::prefix('editor')->middleware('role:superadministrator|administrator|editor')->group(function () {
  Route::get('/', 'EditorController@index');
  Route::get('/view','EditorController@view')->name('editor.view');
  Route::get('/add','EditorController@add')->name('editor.add');
  Route::post('/add','EditorController@processAdd')->name('editor.process.add');
  Route::get('/remove','EditorController@remove')->name('editor.remove');
  Route::get('/feed','EditorController@feed')->name('editor.feed');
});


Route::prefix('hero')->middleware('role:superadministrator|administrator')->group(function () {
  Route::get('/', 'HeroController@index');
  Route::get('/view', 'HeroController@index')->name('hero.view');
  Route::get('/add','HeroController@add')->name('hero.add');
  Route::get('/remove','HeroController@remove')->name('hero.remove');
});

Route::prefix('breeds')->group(function () {
  Route::get('/', 'BreedsController@index')->name('breeds.index');
  Route::get('/view', 'BreedsController@view')->name('breeds.view');
  Route::get('/edit','BreedsController@edit')->name('breeds.edit');
  Route::get('/add','BreedsController@add')->name('breeds.add');
  Route::get('/delete','BreedsController@delete')->name('breeds.delete');
});


//breeder listing routes find, create, edit, view
Route::post('/find-cat-breeder','SearchController@FindBreeders')->name('cat-search');
Route::post('/find-dog-breeder','SearchController@FindBreeders')->name('dog-search');
Route::post('/find-breeders','SearchController@FindBreeders')->name('breeder-search');
Route::get('view-breeder/{url}', ['as' => 'view-breeder','uses' =>'BreederController@view']);
Route::get('breed-info/{url}', ['as' => 'breed-info','uses' =>'BreedsController@listing']);
Route::get('find/{url}/breeders', ['uses' =>'SearchController@allByBreed']);


//Base routes, home/checkout
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');

Route::get('redirect', 'RedirectController@index')->name('redirect');
Route::get('listingremoved', 'RedirectController@listingremoved')->name('listingremoved');
