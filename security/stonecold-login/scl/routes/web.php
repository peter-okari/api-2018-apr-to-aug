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

//simple route - kumbusha
Route::get('kumbusha','KumbushaController@kmb');

Route::get('holabaloo','AnthuController@hbc');

Route::get('testing',function(){
    echo 'test';
});

Route::get('/',array('as' => '/','uses' => function () {
    return view('welcome');
}));

//Login route
Route::get('login', array('as' => 'login', 'uses' => 'AnthuController@login'));

//Login route - the action
Route::post('anthu/login', array('as' => 'anthu.login', 'uses' => 'AnthuController@attemptLogin'));

//Logout route
Route::post('logout', array('as' => 'logout', 'uses' => 'AnthuController@logout'));

//secure route
//Laravel will automatically check for user login when this page is accessed. If the user is not logged in the he/she is redirected to login page
//Laravel ships with an auth middleware, which is defined at  Illuminate\Auth\Middleware\Authenticate. Since this middleware is already registered in your HTTP kernel, all you need to do is attach the middleware to a route definition:
Route::get('anthu/profile', array('as' => 'anthu.profile', 'uses' => 'AnthuController@profile'))->middleware('auth');

//Mockr route
Route::get('mockr', array('as' => 'mockr', 'uses' => 'AnthuController@mockr'));
