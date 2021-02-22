<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/','HomeController@welcomeindex');

Route::get('/index', function () {
    return view('welcome2');
});

Route::get('/home/index', 'HomeController@index');
// Route::get('/','HomeController@welcome');

Auth::routes();

Route::post('/city', 'UsersController@findcity');
Route::post('/subdist', 'UsersController@findsubdis');

// Route::resource('contact', 'ContactController');
Route::get('user/edit_profile/{id}','UsersController@editprofile');
Route::get('/edit/{id}','UsersController@edit');
Route::put('/updateprofile/{id}','UsersController@updateprofile');
Route::put('/updateuser/{id}','UsersController@update');
Route::get('/user/user_check/{id}','UsersController@checkprofile');
Route::get('/user/index', 'UsersController@index');
Route::resource('user', 'UsersController');

Route::get('/help', function () {
    return view('help.index');
});
// Route::get('/download', function () {
//     return view('download.index');
// });

//Download
Route::get('/create', 'DownloadController@create');
Route::get('/download/detail','DownloadController@detail');
Route::post('downloadupload', 'DownloadController@store');
Route::get('/download/fill', 'DownloadController@fill');
Route::resource('download', 'DownloadController');

// Equipment
Route::get('/warehouse/edit/{id}','WarehouseController@edit');
Route::post('/destroyw/{id}','WarehouseController@destroy');
Route::get('/warehouse/borrows','WarehouseController@borrows');
Route::get('/warehouse/borrows_eqip/{id}','WarehouseController@borrowseqip');
Route::post('/addborroow', 'WarehouseController@borrowsadd');
Route::get('/warehouse/show_borrows/{id}', 'WarehouseController@show_borrows');
Route::get('/warehouse/return/{id}', 'WarehouseController@showreturn');
Route::post('/savereturn/{id}','WarehouseController@savereturn');
// Route::post('/savereturn', 'WarehouseController@savereturn2');
Route::get('/warehouse/histoy_borrows/{id}','WarehouseController@histoy');
Route::get('/warehouse/category','WarehouseController@categoryindex');
Route::get('/warehouse/create_category', 'WarehouseController@categorycreate');
Route::post('/insertcategory','WarehouseController@insertcategory');
Route::get('/warehouse/edit_category/{id}','WarehouseController@editcategory');
Route::post('/updatecategory/{id}','WarehouseController@updatecategory');
Route::post('/deletecategory/{id}','WarehouseController@deletecategory');
Route::get('/warehouse/return_index','WarehouseController@returnindex');
Route::get('/warehouse/index', 'WarehouseController@index');
Route::resource('warehouse', 'WarehouseController');

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});

//Route for admin
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['admin']], function () {
        // Route::get('/dashboard', 'admin\AdminController@index');
        Route::get('/home', 'HomeController@index');
    });
});

// Assignment
Route::get('/assignment/work', 'AssignmentController@work');
// Route::get('/assignment/create/{id}','AssignmentController@edit');
Route::get('/assignment/create','AssignmentController@edit');
Route::get('/assignment/someuser','AssignmentController@someuser');
Route::get('/assignment/leave', 'AssignmentController@leave');
Route::get('/assignment/leavead', 'AssignmentController@leavead');
Route::get('/assignment/create_leave','AssignmentController@createleave');
Route::get('/assignment/edit_leave/{id}', 'AssignmentController@editleave');
Route::post('/createleave', 'AssignmentController@leave_create');
Route::post('/updateleave/{id}','AssignmentController@leaveupdate');
Route::post('/deleteleave/{id}','AssignmentController@deleteleave');
Route::post('/approve/{id}', 'AssignmentController@approve');
Route::get('/assignment/detail_leave/{id}','AssignmentController@deleave');
Route::get('/assignment/schedule', 'AssignmentController@schedule');
Route::get('/assignment/schedule/create_schedule', 'AssignmentController@schedulecreate');
Route::post('/createschedule', 'AssignmentController@schedule_create');
Route::get('/assignment/detail_assing/{id}' ,'AssignmentController@detailAS');
Route::get('/assignment/edit/{id}','AssignmentController@edit');
Route::post('/updateassign/{id}','AssignmentController@update');
Route::post('/assigndestroy/{id}','AssignmentController@destroy');
Route::get('/assignment/show/{id}','AssignmentController@show');
Route::resource('assignment', 'AssignmentController');

Route::get('risk', 'RiskController@index');
Route::get('/risk/create_risk','RiskController@create');
Route::post('/insertrisk','RiskController@insertrisk');
Route::get('/risk/edit_risk/{id}', 'RiskController@edit');
Route::post('/updaterisk/{id}','RiskController@update');
Route::post('/destroyriks/{id}', 'RiskController@destroy');

Route::get('/danger_area/index_area','DangerAreaController@index_area');
Route::get('/danger_area/create','DangerAreaController@create');
Route::post('/insertarea', 'DangerAreaController@store');
Route::get('/danger_area/edit_area/{id}','DangerAreaController@edit');
Route::post('/updatearea/{id}','DangerAreaController@update');
Route::post('/deletearea/{id}','DangerAreaController@destroy');

Route::get('/notification','NotificationController@index');
Route::post('/store','NotificationController@store');
Route::get('/notification/show_notifiy','NotificationController@shownotifiy');
Route::post('/notify','NotificationController@notify');
Route::post('/unotify','NotificationController@unotify');
Route::get('/notification/detail/{id}','NotificationController@detailnotify');
Route::post('/suceess/{id}', 'NotificationController@success');
Route::post('/nextuser','NotificationController@nextuser');
Route::post('/destroy/{id}','NotificationController@destroy');

// Route::post('/unoyifynext', 'NotificationController@unoyifynext');
// Route::post('/noyifynext', 'NotificationController@noyifynext');

Route::get('/danger_area','DangerAreaController@index');

Route::get('/blog/index','blogController@index');
Route::get('/blog/create', 'blogController@create');
Route::post('/insertnews','blogController@store');
Route::get('/blog/show/{id}', 'blogController@show');
Route::get('/blog/edit/{id}','blogController@edit');
Route::post('/updatenews/{id}','blogController@update');
Route::post('/blogdestroy/{id}','blogController@destroy');

Route::get('/operation/index','OperationController@index');
Route::get('/operation/create', 'OperationController@create');

//pdf
Route::get('/PDF/leave/{id}','PDFController@leave');
Route::get('/PDF/general/{id}','PDFController@general');
Route::get('/PDF/certificate_request/{id}', 'PDFController@certificate_request');
Route::get('/PDF/certificate/{id}', 'PDFController@certificate');

// Requset
Route::get('/request/general_request','RequestController@general_request_index');
Route::get('/request/general_request_insert_online', 'RequestController@general_request');
Route::get('/request/general_request_insert', 'RequestController@general_request_insert');
Route::post('/insert_general', 'RequestController@insert_genral');
Route::post('/insert_general2', 'RequestController@insert_genral2');
Route::post('/destroygenral/{id}', 'RequestController@destroy_genral');
Route::get('/request/general_request_edit/{id}','RequestController@edit_general');
Route::post('/update_general/{id}', 'RequestController@update_general');

Route::get('/request/certificate_request_insert_online', 'RequestController@certificate_request_online');
Route::post('/insert_certificate_request_online', 'RequestController@insert_certificate_request_online');
Route::get('/request/certificate_request', 'RequestController@certificate_request_index');
Route::get('/request/certificate_request_insert', 'RequestController@certificate_request_insert');
Route::post('/insert_certificate_request', 'RequestController@insert_certificate_request');
Route::get('/request/certificate_request_edit/{id}', 'RequestController@certificate_request_edit');
Route::post('/update_certificate_request/{id}', 'RequestController@update_certificate_request');
Route::post('/destroy_certificate_request/{id}', 'RequestController@destroy_certificate_request');

Route::get('/request/certificate_insert_online', 'RequestController@certificate_create_online');
Route::post('/insert_certificate_online', 'RequestController@certificate_insert_online');
Route::get('/request/certificate', 'RequestController@certificate_index');
Route::get('/request/certificate_insert', 'RequestController@certificate_create');
Route::post('/insert_certificate', 'RequestController@certificate_insert');
Route::get('/request/certificate_edit/{id}', 'RequestController@certificate_edit');
Route::post('/update_certificate/{id}', 'RequestController@certificate_update');
Route::post('/destroy_certificate/{id}', 'RequestController@certificate_delete');

Route::get('/request/ems_report_insert_online', 'RequestController@ems_report_insert_online');
Route::post('/insert_ems_online', 'RequestController@insert_ems_online');
Route::get('/request/ems_report', 'RequestController@ems_repoet');
Route::get('/request/ems_report_create', 'RequestController@ems_create');
