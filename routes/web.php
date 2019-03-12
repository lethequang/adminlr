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

Route::get('test', function () {
	return view('home');
});

   /*================================='Login'==================================================*/
Route::get('login','StaffController@getLogin')->name('admin.getLogin');
Route::post('login','StaffController@postLogin')->name('admin.postLogin');
Route::get('logout','StaffController@getLogout')->name('admin.getLogout');

// Route::get('/send/sendemail', 'HomeController@sendMail')->name('staff.sendmail');



Route::group(['prefix'=>'admin','middleware' => 'admin'],function() {
	/*================================='Department'============================================*/

	Route::group(['prefix'=>'department'],function() {
		Route::get('list','DepartmentController@getList')->name('admin.department.list');
		Route::get('add','DepartmentController@getAdd')->name('admin.department.getAdd');
		Route::post('add','DepartmentController@postAdd')->name('admin.department.postAdd');
		Route::get('edit/{id}','DepartmentController@getEdit')->name('admin.department.getEdit');
		Route::post('edit/{id}','DepartmentController@postEdit')->name('admin.department.postEdit');
		Route::get('delete/{id}','DepartmentController@getDelete')->name('admin.department.delete');
		
	});
	/*================================'Position'===============================================*/
	Route::group(['prefix'=>'position'],function() {
		Route::get('list','PositionController@getList')->name('admin.position.list');
		Route::get('add','PositionController@getAdd')->name('admin.position.getAdd');
		Route::post('add','PositionController@postAdd')->name('admin.position.postAdd');
		Route::get('edit/{id}','PositionController@getEdit')->name('admin.position.getEdit');
		Route::post('edit/{id}','PositionController@postEdit')->name('admin.position.postEdit');
		Route::get('delete/{id}','PositionController@getDelete')->name('admin.position.delete');
		Route::get('test','PositionController@getDepartment')->name('admin.department.getdepartment');

	});
	/*=================================='Staff'==============================================*/
	Route::group(['prefix'=>'staff'],function() {
		Route::get('list','StaffController@getList')->name('admin.staff.list');
		Route::get('add','StaffController@getAdd')->name('admin.staff.getAdd');
		Route::post('add','StaffController@postAdd')->name('admin.staff.postAdd');
		Route::get('edit/{id}','StaffController@getEdit')->name('admin.staff.getEdit');
		Route::post('edit/{id}','StaffController@postEdit')->name('admin.staff.postEdit');
		Route::get('delete/{id}','StaffController@getDelete')->name('admin.staff.delete');
		Route::get('edit/{id}','StaffController@getEdit')->name('admin.staff.getEdit');
		Route::post('resetpassword','StaffController@resetpassword')->name('admin.resetpassword');
	});
    /*===================================='coordinator'======================================*/
 //    Route::group(['prefix'=>'staff'],function() {
	// 	Route::get('list','StaffController@getList')->name('admin.staff.list');
	// 	Route::get('add','StaffController@getAdd')->name('admin.staff.getAdd');
	// 	Route::post('add','StaffController@postAdd')->name('admin.staff.postAdd');
	// });

});
//dangnhapcuaAuth
// Auth::routes();
    /*===================================== 'UserLogin=======================================*/

// Route::get('login', 'UserloginController@getLogin')->name('user.login.getLogin');
// Route::get('login', 'UserloginController@postLogin')->name('user.login.postLogin');
  /*=========================================================================================*/
Route::get('home', 'HomeController@index')->name('home');
Route::get('edit/user','HomeController@getEditUser')->name('get.edituser');
Route::post('edit/user','HomeController@postEditUser')->name('post.edituser');
Route::get('testmail','StaffController@testmail')->name('index');
Route::get('resetpassword','StaffController@getResetpassword')->name('getresetpassword');
Route::post('resetpassword','StaffController@postResetpassword')->name('postresetpassword');
Route::get('testjon','PositionController@gettest')->name('index');

