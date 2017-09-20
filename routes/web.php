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



//Base routes, home/checkout

Route::get('/dog-and-cat-news', 'PostController@showArticles')->name('dog-and-cat-news');
Route::get('/dog-and-cat-news/{url}', ['as' => 'view-news','uses' =>'PostController@view']);

Route::get('/find-cat-breeder', ['uses' =>'SearchController@findcatbreeder'])->name('find-cat-breeder');
Route::get('/find-dog-breeder', ['uses' =>'SearchController@finddogbreeder'])->name('find-dog-breeder');
Route::get('/find-breeder', ['uses' =>'SearchController@findallbreeders'])->name('find-breeders');

Route::get('/dog-breeds', 'BreedsController@viewDogs')->name('dog-breeds');
Route::get('/cat-breeds', 'BreedsController@viewCats')->name('cat-breeds');
Route::get('/view-breeds', 'BreedsController@view')->name('view-breeds');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::post('/checkout', ['as' => 'checkout-post', 'uses' => 'HomeController@postOrder']);


//Base user account routes
Route::get('/your-listings', 'BreederController@viewYourListings')->name('listings');
Route::get('/add-to-directory', function () {
    return redirect()->route('listings');
})->name('directory-add');
Route::post('/add-to-directory','ListingCreator@breedersProcessAdd')->name('directory-add');
Route::post('/edit-listing','ListingCreator@breederEditListing')->name('breeder-edit-listing');
Route::post('/add-picture-to-listing','ListingCreator@breederEditListingAdd')->name('breeder-edit-listing-add');
Route::get('/add-forSale/{url}', ['as' => 'add-available','uses' =>'ListingController@addForSale']);


Route::get('/account-settings', 'UserController@accountSettings')->name('settings');

//update user Settings
Route::post('/update-email', 'UserController@updateAccount')->name('update-account');
Route::get('/update-email', function () {
    return redirect()->route('settings');
})->name('update-account');

Route::post('/update-password', 'UserController@updateAccountPw')->name('update-account-pw');
Route::get('/update-password', function () {
    return redirect()->route('settings');
})->name('update-account-pw');

//breeder listing routes find, create, edit, view
Route::post('/find-cat-breeder','SearchController@FindBreeders')->name('cat-search');
Route::post('/find-dog-breeder','SearchController@FindBreeders')->name('dog-search');
Route::post('/find-breeders','SearchController@FindBreeders')->name('breeder-search');
Route::get('/view-breeder/{url}', ['as' => 'view-breeder','uses' =>'BreederController@view']);
Route::get('/breed-info/{url}', ['as' => 'breed-info','uses' =>'BreedsController@listing']);
Route::get('/find/{url}', ['uses' =>'SearchController@allByBreed']);

//Admin Routes
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
  Route::prefix('breeds')->group(function () {
    Route::post('/add-new-breed', 'BreedsController@processAdd')->name('manage.breeds.processadd');
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

//Redirects
Route::get('/page-moved', 'RedirectController@index')->name('redirect');
Route::get('/listing-removed', 'RedirectController@listingremoved')->name('listingremoved');
Route::get('/member-only', 'RedirectController@notOnline')->name('member-only');
Route::get('/admin-only', 'RedirectController@notAdmin')->name('admin-only');
