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
/*
Route::get('/phpinfo', function(){
	phpinfo();
});
*/
Route::controller('/dashboard/gallery', 'GalleryController');
Route::controller("/gallery", "GalleryController");
// Route::controller('/dashboard/test', 'TestController');
Route::controller("/dashboard/informations","InformationController");
Route::controller('/dashboard/pages','PagesController');
Route::controller('/dashboard/participe','ParticipeController');
Route::controller('/dashboard/videos','VideosController');
Route::controller("/dashboard/albums", "AlbumsController");
Route::controller("/dashboard/newsletter","NewsletterController");
Route::controller("/dashboard/uploads","UploadsController");
Route::controller("/dashboard","InformationController");
// Route::controller('informations','informationsController');
// Route::controller('albums','AlbumsController');
// Route::controller('gallery','GalleryController');
Route::get('/logout', function(){
	Auth::logout();
	Redirect::to("/gd-admin");
});
Route::controller("/gd-admin","LoginController");
Route::controller('/', "FrontendController");
// Route::get("document/{url}","FrontendController@Document");