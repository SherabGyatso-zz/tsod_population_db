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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes();
// Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('adminV2', 'AdminV2Controller');

Route::group(['middleware' => ['adminlogin']],function(){
	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check-pwd','AdminController@chkPassword');
	Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

	//Occuption Routes (Admin)
	Route::match(['get','post'],'/admin/add-occupation','OccupationController@addOccupation');
	Route::match(['get','post'],'/admin/edit-occupation/{id}','OccupationController@editOccupation');
	Route::match(['get','post'],'/admin/delete-occupation/{id}','OccupationController@deleteOccupation');
	Route::get('/admin/view-occupations','OccupationController@viewOccupations');

	//Sponsorship Routes (Admin)
	Route::match(['get','post'],'/admin/add-sponsorship','SponsorshipController@addSponsorship');
	Route::match(['get','post'],'/admin/edit-sponsorship/{id}','SponsorshipController@editSponsorship');
	Route::match(['get','post'],'/admin/delete-sponsorship/{id}','SponsorshipController@deleteSponsorship');
	Route::get('/admin/view-sponsorships','SponsorshipController@viewSponsorships');

	//Settlement Routes (Admin)
	Route::match(['get','post'],'/admin/add-settlement','SettlementController@addSettlement');
	Route::match(['get','post'],'/admin/edit-settlement/{id}','SettlementController@editSettlement');
	Route::match(['get','post'],'/admin/delete-settlement/{id}','SettlementController@deleteSettlement');
	Route::get('/admin/view-settlements','SettlementController@viewSettlements');

	//Profie Routes (Admin)
	Route::match(['get','post'],'/admin/add-profile','ProfilesController@addProfile');
	Route::match(['get','post'],'/admin/edit-profile/{id}','ProfilesController@editProfile');
	Route::get('/admin/view-profiles','ProfilesController@viewProfiles');
	Route::get('/admin/delete-profile/{id}','ProfilesController@deleteProfile');
	Route::get('/admin/delete-profile-image/{id}','ProfilesController@deleteProfileImage');

	//Export Population Route
	Route::get('/admin/export-population','ProfilesController@exportPopulation');
	//PF view for population
	Route::get('/admin/view-pdf-profile{id}','ProfilesController@viewPDFProfile');
	//Admin Population line Charts Route
	Route::get('/admin/view-profiles-charts','ProfilesController@viewProfilesCharts');
	//Admin Population bar Charts Route
	Route::get('/admin/view-profiles-barcharts','ProfilesController@viewProfilesbarCharts');
	//Admin Population Occupations Charts Route
	Route::get('/admin/view-profiles-groups-charts','ProfilesController@viewProfilesGroupsbarCharts');
	//Admin Yearly Report Generation
	Route::resource('/admin/population_reports', 'ReportsController');

	//Admin/Sub Amdin View Route
	Route::get('/admin/view-admins','AdminController@viewAdmins');
	//Add Admin/Sub Admin Route
	Route::match(['get','post'],'/admin/add-admin','AdminController@addAdmin');
	//Edit Admin/Sub Admin Route
	Route::match(['get','post'],'/admin/edit-admin/{id}','AdminController@editAdmin');
});


Route::get('/logout','AdminController@logout');

