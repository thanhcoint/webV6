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
use App\TheLoai;
Route::get('/', function () {
    return redirect('/admin/dangnhap');
});
Route::get('/admin/dangnhap','UserController@getdangnhapAdmin');
Route::post('/admin/dangnhap','UserController@postdangnhapAdmin');
Route::group(['prefix'=>'admin','middleware' =>'adminlogin'],function()
{
	Route::group(['prefix'=>'theloai'],function()
	{
		Route::get('sua/{id}','EmailController@getSua');
		Route::post('sua/{id}','EmailController@postSua');
		Route::get('delete/{id}','EmailController@getdelete');
		Route::post('delete_select','EmailController@delete_select');
		Route::get('delete_all/{id_mail_profile}','EmailController@delete_all');
		Route::post('delete_all','EmailController@delete_all_serch');
		Route::post('download_all','EmailController@download_all');
		Route::post('download_select','EmailController@post_download_select');
		Route::post('search','EmailController@search');
		Route::get('update','UpdateController@getUpdate');
		Route::post('update','UpdateController@updateAction');
		Route::post('updatevermail','UpdateController@updateActionVerMail');
		Route::get('updateProfile','UpdateController@getUpdateProfile');
		Route::post('updateProfile','UpdateController@updateActionProfile');
		
		Route::get('cauhinh','UpdateController@getcauhinh');
		Route::post('cauhinh','UpdateController@postcauhinh');		
		//Route::get('updateAction','UpdateController@updateAction');
		Route::get('download_select','EmailController@get_download_seclect');
		//------------------------------------------------//
		Route::get('them','AddController@getThem');
		Route::post('them','AddController@postThem');
		Route::post('addProfile','AddController@postProfile');
		Route::post('deleteProfile','AddController@deleteProfile');
		Route::get('/{id_mail_profile}','AjaxController@getEmail');
		
		});
		Route::group(['prefix'=>'Youtube'],function()
		{
			Route::get('sua/{id}','youtubeController@getSua');
			Route::post('sua/{id}','youtubeController@postSua');
			Route::get('delete/{id}','youtubeController@getdelete');
			Route::post('delete_select','youtubeController@delete_select');
			Route::get('delete_all/{id_mail_profile}','youtubeController@delete_all');
			Route::post('delete_all','youtubeController@delete_all_serch');
			Route::post('download_all','youtubeController@download_all');
			Route::post('download_select','youtubeController@post_download_select');
			Route::post('search','youtubeController@search');
			Route::get('download_select','youtubeController@get_download_seclect');
			Route::get('/{id_mail_profile}','AjaxController@getEmailYT');
			//------------------------------------------------//
			
		});
		Route::group(['prefix'=>'gmail'],function()
		{
			Route::get('sua/{id}','gmailController@getSua');
			Route::post('sua/{id}','gmailController@postSua');
			Route::get('delete/{id}','gmailController@getdelete');
			Route::post('delete_select','gmailController@delete_select');
			Route::get('delete_all/{id_mail_profile}','gmailController@delete_all');
			Route::post('delete_all','gmailController@delete_all_serch');
			Route::post('download_all','gmailController@download_all');
			Route::post('download_select','gmailController@post_download_select');
			Route::post('search','gmailController@search');
			Route::get('download_select','gmailController@get_download_seclect');
			Route::get('/{id_mail_profile}','AjaxController@getGmai');
			//------------------------------------------------//
			
		});
		Route::group(['prefix'=>'Android'],function()
		{
			Route::get('sua/{id}','AndroidController@getSua');
			Route::post('sua/{id}','AndroidController@postSua');
			Route::get('delete/{id}','AndroidController@getdelete');
			Route::post('delete_select','AndroidController@delete_select');
			Route::get('delete_all/{id_mail_profile}','AndroidController@delete_all');
			Route::post('delete_all','AndroidController@delete_all_serch');
			Route::post('download_all','AndroidController@download_all');
			Route::post('download_select','AndroidController@post_download_select');
			Route::post('search','AndroidController@search');
			Route::get('download_select','AndroidController@get_download_seclect');
			Route::get('/{id_mail_profile}','AjaxController@getAndroid');
			//------------------------------------------------//
			
		});
		Route::group(['prefix'=>'Ipad'],function()
		{
			Route::get('sua/{id}','ipadController@getSua');
			Route::post('sua/{id}','ipadController@postSua');
			Route::get('delete/{id}','ipadController@getdelete');
			Route::post('delete_select','ipadController@delete_select');
			Route::get('delete_all/{id_mail_profile}','ipadController@delete_all');
			Route::post('delete_all','ipadController@delete_all_serch');
			Route::post('download_all','ipadController@download_all');
			Route::post('download_select','ipadController@post_download_select');
			Route::post('search','ipadController@search');
			Route::get('download_select','ipadController@get_download_seclect');
			Route::get('/{id_mail_profile}','AjaxController@getEmailipad');
			//------------------------------------------------//
			
		});
		Route::group(['prefix'=>'user'],function(){
			Route::get('list','UserController@getlist_user');
			Route::get('add_user','UserController@add_user');
			Route::post('add_user','UserController@post_add_user');
			Route::get('delete/{id}','UserController@delete');
			Route::get('update/{id}','UserController@update_user');
			//Route::post('deleteProfile','AddController@deleteProfile');
			
			});
		// Route::group(['prefix'=>'ajax'],function(){
		// 	Route::get('/{id_mail_profile}','AjaxController@getEmail');
		// });
});
		//Route::group(['prefix'=>'api','middleware' =>'authstore'],function(){
		Route::group(['prefix'=>'api'],function(){
		Route::post('email','ApiController@postFirstEmail');
		Route::post('getmailver','ApiController@postGetMailVer');
		Route::post('test/{id}','ApiController@testEmail');
		Route::get('test/{id}','ApiController@getTestEmail');
		Route::post('update_email/{id}','ApiController@postUpdateEmail');
		Route::post('postScret','ApiController@postScret');
		Route::post('postOTP','ApiController@postOTP');
		Route::get('getprofile','ApiController@getProfile');
		Route::post('testUser','ApiController@testUser');
		Route::post('getMail/{id}','ApiController@postgetMail');
		Route::get('getAction/{id}','ApiController@getAction');
		Route::post('GetRestoreYtb','ApiController@postGetRestoreYtb');
		Route::get('gettest','ApiController@gettest');
	
		});
Route::get('test','EmailController@test');