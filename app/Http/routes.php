<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     // return view('welcome');
//     return "hello world";
// });

// /*配置一个自己的路由
//  *			路径名/{变量}			将变量name作为参数$name传入处理函数
//  *可选参数	路径名/{变量?}			($name = null)
//  *设置默认	路径名/{变量?}			($name = '默认值')
// */
// Route::get('myRoute/{name}', function ($name) {
// // Route::get('myRoute/{name?}', function ($name = null) {
// // Route::get('myRoute/{name?}', function ($name = '我') {
//     // return view('welcome');
//     return "这是".$name."的路由";
// });

//通过路由访问控制器中的方法
Route::get('/', 'DotaUserController@index');

// //通过路由访问控制器中的方法
Route::get('DotaUserinfo/{id}', 'DotaUserController@show');

// //访问form页面
Route::get('DotaUser/create', 'DotaUserController@create');

// //访问store
Route::post('DotaUser/store', 'DotaUserController@store');

//	匹配页
Route::get('DotaUser/matching', 'DotaUserController@matching');
Route::post('DotaUser/matching', 'DotaUserController@matching');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
