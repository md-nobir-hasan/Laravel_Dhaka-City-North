<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parlamentController;
use App\Http\Controllers\PS_controler;
use App\Http\Controllers\w_controler;
use App\Http\Controllers\u_controler;
use App\Http\Controllers\designation_controler;
use App\Http\Controllers\mp_controler;
use App\Http\Controllers\secreatry_controler;
use App\Http\Controllers\word_rp_controler;
use App\Http\Controllers\unit_rp_controler;
use App\Http\Controllers\adminController;
use App\Http\Controllers\displayInfo;
use App\Http\Controllers\SMSController;

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
    return view('login');
});

Route::post('/login',[adminController::class,'login']);
Route::post('/signup',[adminController::class,'signup']);
Route::get('/logout',[adminController::class,'logout']);





Route::get('/dasboard', [adminController::class,'index']);

Route::get('/add_parlament_info', [parlamentController::class,'show']);
Route::post('/insert_parlament', [parlamentController::class,'insert']);
Route::get('/parlament_update_page/{id}', [parlamentController::class,'update_page']);
Route::put('/update_parlament/{id}', [parlamentController::class,'update']);


Route::get('/Add_Police_Station', [PS_controler::class,'show']);
Route::post('/insert_ps', [PS_controler::class,'insert']);
Route::get('/update_page_ps/{id}', [PS_controler::class,'update_page']);
Route::put('/update_ps/{id}', [PS_controler::class,'update']);


Route::get('/add_word_info', [w_controler::class,'show']);
Route::post('insert_word_info', [w_controler::class,'insert']);
Route::get('/update_page_word/{id}', [w_controler::class,'update_page']);
Route::put('update_word_info/{id}', [w_controler::class,'update']);

Route::get('/add_unit_info', [u_controler::class,'show']);
Route::get('insert_unit_info', [u_controler::class,'insert']);
Route::get('update_page_unit/{id}', [u_controler::class,'update_page']);
Route::put('update_unit_info/{id}', [u_controler::class,'update']);


Route::get('/ps_ajax/{id}', [w_controler::class,'ajax']);
Route::get('/w_ajax/{id}', [u_controler::class,'ajax']);
Route::get('/u_ajax/{id}', [unit_rp_controler::class,'ajax']);


Route::get('/show_designation_info', [designation_controler::class,'show']);
Route::post('insert_designation_info', [designation_controler::class,'insert']);

Route::get('/show_mp_info', [mp_controler::class,'show']);
Route::post('/insert_mp_info', [mp_controler::class,'insert']);
Route::get('/update_page_mp/{id}', [mp_controler::class,'update_page']);
Route::put('/update_mp/{id}', [mp_controler::class,'update']);

Route::get('/show_thana_rs_info', [secreatry_controler::class,'show']);
Route::post('/insert_thana_rs_info', [secreatry_controler::class,'insert']);
Route::get('/update_page_thana_rs/{id}', [secreatry_controler::class,'update_page']);
Route::put('/update_thana_rs_info/{id}', [secreatry_controler::class,'update']);

Route::get('/show_word_rp_info', [word_rp_controler::class,'show']);
Route::post('/insert_word_rp_info', [word_rp_controler::class,'insert']);
Route::get('/update_page_word_rp/{id}', [word_rp_controler::class,'update_page']);
Route::put('/update_word_rp_info/{id}', [word_rp_controler::class,'update']);

Route::get('/show_unit_rp_info', [unit_rp_controler::class,'show']);
Route::post('/insert_unit_rp_info', [unit_rp_controler::class,'insert']);
Route::get('/update_page_unit_rp/{id}', [unit_rp_controler::class,'update_page']);
Route::put('/update_unit_rp_info/{id}', [unit_rp_controler::class,'update']);

Route::delete('/delete/{model}/{id}', [unit_rp_controler::class,'deletes']);



Route::get('/display_thana', [displayInfo::class,'thana']);
Route::get('/thana_report', [displayInfo::class,'show_thana_report']);

Route::get('/display_word', [displayInfo::class,'word']);
Route::get('/word_report', [displayInfo::class,'show_word_report']);

Route::get('/display_unit', [displayInfo::class,'unit']);
Route::get('/unit_report', [displayInfo::class,'show_unit_report']);

Route::get('/display_mp', [displayInfo::class,'mp']);
Route::get('/mp_report', [displayInfo::class,'show_mp_report']);


//SMS Routes
Route::get('/mp_sms', [SMSController::class,'index'])->name('mp_sms');
Route::post('/sms/send', [SMSController::class,'send_sms'])->name('sms.send');



