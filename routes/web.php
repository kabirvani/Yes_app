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
    $data['user'] = "";
    // return view('/auth/register', $data);
    return view('/auth/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('show.company_details');
Route::get('/test', 'HomeController@test');
Route::post('/sendVerifyCode','SendMailController@sendVerifyCode');
Route::post('/companyName','SignUpProcessController@checkVerifyCode');
Route::post('/createPassword','SignUpProcessController@companyName');
Route::post('/welcomeSignup','SignUpProcessController@createPassword');
Route::get('/youth_uploader','YouthController@index');
Route::post('importExcel', 'YouthController@importExcel');
Route::post('save_youth_data', 'YouthController@save_youth_data');
Route::get('/password/reset/{token}/{email}','Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::post('/store_company_detail','CompanyDetailsController@save_company_detail')->name('store.company_details');
Route::post('/beee/upload/', 'FileUploadController@uploadBeeeCertificate')->name('upload.beee');
Route::post('/contact_detail', 'CompanyDetailsController@show_contact_detail')->name('show.contact_detail');
Route::post('/store_contact_detail', 'CompanyDetailsController@save_contact_detail')->name('store.contact_details');
Route::post('/my_commitment', 'CompanyDetailsController@show_my_commitment')->name('show.my_commitment');
Route::get('/get_ip_location','GetGeoIPLocationController@getCountry')->name('get.ip_location');
Route::post('/submit_payment', 'CompanyDetailsController@show_submit_payment')->name('show.submit_payment');
Route::get('/send_pledge', 'CompanyDetailsController@send_pledge')->name('send.pledge');
Route::post('/download_invoice', 'CompanyDetailsController@download_invoice');

Route::post('/back_home', 'CompanyDetailsController@back_company_detail')->name('back.company_detail');
Route::post('/back_contact_detail', 'CompanyDetailsController@back_contact_detail')->name('back.contact_detail');


Route::get('/boost_a_business', 'BoostABusinessController@index')->name('show.boost_confirm');
Route::post('/boost_a_business_checkout', 'BoostABusinessController@checkout')->name('show.boost_checkout');
Route::get('/in_house', 'InHouseController@index')->name('show.inhouse_confirm');
Route::post('/in_house_checkout', 'InHouseController@checkout')->name('show.inhouse_checkout');
Route::get('/in_house_assisted', 'InHouseAssistedController@index')->name('show.inhouseassisted_confirm');
Route::post('/in_house_assisted_checkout', 'InHouseAssistedController@checkout')->name('show.inhouseassisted_checkout');
