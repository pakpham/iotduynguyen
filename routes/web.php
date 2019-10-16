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


Route::get('/test-mail','pakController@testMail');

Route::get('/fb-ms-api', 'fbController@index');
Route::post('/fb-ms-api', 'fbController@index');


Route::get('/zalo', 'pakController@testZalo');
Route::get('zalo-logined','pakController@sendMesengerZalo');

Route::get('/pusher', function() {
    event(new App\Events\PusherEvent("UPDATE RealTime Controller using Pusher API "));
    //event(new PusherEvent('hello world'));
    return "Event has been sent!";
});

Route::get('/clentpusher', function(){
	return view ('test-pusher');
});

Route::get('/', function () {
	if(!Auth::check()){
		return view('admin.login');
	} else{
		return redirect()->route('home-admin');
	}
});
// Route::get('/home', 'pakController@getHome');
// Route::get('/get-test', 'pakController@getTest');
// Route::get('/table-ss1', 'TableSensor@getSs1');
// Route::get('/table-ss2', 'TableSensor@getSs2');
// Route::get('/table-ss3', 'TableSensor@getSs3');
// Route::get('/table-ss4', 'TableSensor@getSs4');

// Route::get('/chart-1', function(){
// 	return view ('pages.chart-1');
// });

Route::post ('get-data-home', 'pakController@getDataHome')->name('get-data-home');
Route::post('post-test', 'pakController@addDataSensor')->name('post-test');
Route::get('add-user/{name}/{pass}', 'pakController@addUser');



Route::get('add-data/{data1}/{data2}/{data3}/{data4}', 'addDataSensor@addDataSensor');
Route::get('add-data-2/{data1}/{data2}/{data3}/{data4}', 'addDataSensor@addDataSensor2');
Route::get('add-data-3/{data1}/{data2}/{data3}/{data4}', 'addDataSensor@addDataSensor3');
Route::get('add-data-4/{data1}/{data2}/{data3}/{data4}', 'addDataSensor@addDataSensor4');




/////////////////////////////////////////////////////////////////////////
Route::get('testpub/{topic}/{message}','mqttController@testPub');

Route::get('testsub/{topic}','mqttController@testSub');

// DANG NHAP NGUOI DUNG  +++ Auth  +++
Route::get('dangnhap', function(){
	if(!Auth::check()){
		return view('admin.login');
	}
	else echo "Ban da dang nhap. ";
});

Route::post('login','User@handlingLogin')->name('login');
//////////////////////////////////////////////////////////////


// PHAN QUYEN TRUY CAP
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){
	Route::get('dangxuat', 'User@logout')->name('logout');
	Route::get('/home', 'homeController@getHome')->name('home-admin');
	Route::get('/get-test', 'pakController@getTest');
	Route::get('/table-ss1', 'TableSensor@getSs1');
	Route::get('/table-ss2', 'TableSensor@getSs2');
	Route::get('/table-ss3', 'TableSensor@getSs3');
	Route::get('/table-ss4', 'TableSensor@getSs4');
	Route::post('get-chart', 'TableSensor@getData')->name('get-data-chart');
	Route::get('/query-data','ajaxController@queryData');

	Route::get('/chart', function(){
		return view ('pages.chart');
	});
	Route::get('/about', function(){
		return view ('pages.about');
	});
	Route::get('export-data/{date_state}/{date_end}', 'pakController@export')->name('export');
	Route::get('importExportView', 'pakController@importExportView');
	Route::post('import', 'pakController@import')->name('import');


	// Setup warning
	Route::get('/warning-setup', 'warningController@warningSetup');
	Route::get('/setWarningSSS1', 'warningController@setWarningSSS1');
	Route::get('/setWarningSSS2', 'warningController@setWarningSSS2');
	Route::get('/setWarningSSS3', 'warningController@setWarningSSS3');
	Route::get('/setWarningSSS4', 'warningController@setWarningSSS4');
	Route::post('/resetWarning', 'warningController@resetWarning');

});




Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});




Route::get('testt','warningController@test');