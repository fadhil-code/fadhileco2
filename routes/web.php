<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Models\User;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

//Route::get('/', function () {    return view('welcome');})->name('welcome');

Route::get('/login', [AuthManager::class , 'login'])->name('login');
Route::post('/login', [AuthManager::class , 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class , 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class , 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class , 'logout'])->name('logout');
//Route::group(['middleware' => 'auth'], function(){
  //  Route::get('/profile', function () {
    //    return view('welcome');
//})->name('home');
//});
Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', [AuthManager::class , 'home'])->name('home');
});

//Route::get('/show_edit_info/{id}',[AuthManager::class, 'show_edit_info']);
//Route::post('/editinfo/{id}',[AuthManager::class, 'editinfo']);
//Route::post('/editadress/{id}',[AuthManager::class, 'editadress']);
Route::post('/editskils/{id}',[AuthManager::class, 'editskils']);
Route::post('/editjobs/{id}',[AuthManager::class, 'editjobs']);
//Route::get('delete_study/{id}/{uid}',[AuthManager::class , 'delete_study']);
//Route::post('/addstudy/{id}',[AuthManager::class, 'addstudy']);
Route::get('/show_edit_info2',[AuthManager::class, 'show_edit_info2'])->name('show_edit_info2');
Route::post('/show_edit_info2',[AuthManager::class, 'show_edit_info2Post'])->name('show_edit_info2.post');
Route::post('/editadress2',[AuthManager::class, 'editadress2Post'])->name('editadress2.post');
Route::post('/addstudy2',[AuthManager::class, 'addstudy2Post'])->name('addstudy2.post');
Route::post('/delete_study2/{id}',[AuthManager::class, 'delete_study2Post'])->name('delete_study2.post');
Route::post('/addskils',[AuthManager::class, 'addskilsPost'])->name('addskils.post');
Route::post('/delete_skill/{id}',[AuthManager::class, 'delete_skillPost'])->name('delete_skill.post');
Route::post('/addcirtificate',[AuthManager::class, 'addcirtificatePost'])->name('addcirtificate.post');
Route::post('/delete_cirtificate/{id}',[AuthManager::class, 'delete_cirtificatePost'])->name('delete_cirtificate.post');
Route::post('/addlang',[AuthManager::class, 'addlangPost'])->name('addlang.post');
Route::post('/delete_lang/{id}',[AuthManager::class, 'delete_langPost'])->name('delete_lang.post');
Route::post('/addjob',[AuthManager::class, 'addjobPost'])->name('addjob.post');
Route::post('/delete_job/{id}',[AuthManager::class, 'delete_jobPost'])->name('delete_job.post');


Route::post('/addpost',[AuthManager::class, 'addpostPost'])->name('addpost.post');

Route::post('/add_job_request/{id}/{uid}',[AuthManager::class, 'add_job_requestPost'])->name('add_job_request.post');
Route::post('/add_post_comment/{id}',[AuthManager::class, 'add_post_commentPost'])->name('add_post_comment.post');
Route::post('/add_post_like/{id}',[AuthManager::class, 'add_post_likePost'])->name('add_post_like.post');
Route::post('/delete_post_like/{id}',[AuthManager::class, 'delete_post_likePost'])->name('delete_post_like.post');
Route::post('/deactive_post/{id}',[AuthManager::class, 'deactive_postPost'])->name('deactive_post.post');

Route::get('/jobsRequests',[AuthManager::class, 'jobsRequests'])->name('jobsRequests');
Route::get('/jobsRequests/{id}/{par}/{uid}/{pid}',[AuthManager::class, 'jobsRequestsPost'])->name('jobsRequests.post');

Route::get('/profiles/{id}',[AuthManager::class, 'profiles'])->name('profiles');
Route::get('/postview/{id}',[AuthManager::class, 'postview'])->name('postview');
