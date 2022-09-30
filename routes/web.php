<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

// ホーム
Route::get('/',
'App\Http\Controllers\ContentController@showList')->name
('index');


// 詳細ページ
Route::get('/detail/{id}',
'App\Http\Controllers\ContentController@showDetail')->name
('detail');

// ランダム
Route::get('/random',
'App\Http\Controllers\ContentController@showRandom')->name
('randam');

// 投稿ページ
Route::get('/create',
'App\Http\Controllers\SummernoteController@create')->name
('');

Route::post('/summernote/summernote_images', 'SummernoteController@image')->name
('summernote.image');

Route::post('/create_conf',
'App\Http\Controllers\SummernoteController@confirm')->name
('content.create_conf');

Route::post('/create_comp',
'App\Http\Controllers\SummernoteController@store')->name
('content.create_comp');

// 編集ページ
Route::get('/edit/{id}',
'App\Http\Controllers\SummernoteController@edit')->name
('edit');

Route::post('/create_edit_conf/{id}',
'App\Http\Controllers\SummernoteController@editConfirm')->name
('content.create_edie_conf');

Route::post('/create_edit_comp/{id}',
'App\Http\Controllers\SummernoteController@editStore')->name
('content.create_comp');

// マイページ
Route::get('/mypage',
'App\Http\Controllers\ContentController@showMypage')->name
('');

Route::get('/like',
'App\Http\Controllers\ContentController@showMylike')->name
('');
// ユーザーページ
Route::get('/userpage/{id}',
'App\Http\Controllers\ContentController@showUserpage')->name
('');

// 設定
Route::get('/setting',
'App\Http\Controllers\ContentController@showSetting')->name
('');

// ログイン
Route::group(['middleware' => ['guest']], function () {
    // ログインフォーム表示
    Route::get('/login',
    'App\Http\Controllers\Auth\AuthController@showLogin')->name
    ('showLogin');
    // ログイン処理
    Route::post('/login',
    'App\Http\Controllers\Auth\AuthController@login')->name
    ('login');
});

// ログアウト
Route::group(['middleware' => ['auth']], function () {
    // ログアウト処理
    Route::post('/logout',
    'App\Http\Controllers\Auth\AuthController@logout')->name
    ('logout');
});

// ミドルウェア

// 新規登録
Route::get('/signup',
'App\Http\Controllers\LoginController@showSignup')->name
('signup');

Route::post('/signup_conf',
'App\Http\Controllers\LoginController@signupConfirm')->name
('signup_conf');

Route::post('/signup/store',
'App\Http\Controllers\LoginController@exeStore')->name
('exeStore');

// リセット
Route::get('/reset_mail',
'App\Http\Controllers\LoginController@showResetmail')->name
('');

// いいね機能
Route::get('/reply/good/{content}', 'App\Http\Controllers\GoodController@good')->name('good');
Route::get('/reply/ungood/{content}', 'App\Http\Controllers\GoodController@ungood')->name('ungood');

Route::get('/switchGood','App\Http\Controllers\GoodController@switchGood')->name('switchGood');

// 記事削除
Route::post('/delete/{id}',
'App\Http\Controllers\SummernoteController@delete')->name
('delete');

// ユーザー編集
Route::post('/user_edit',
'App\Http\Controllers\UserController@userEdit')->name
('userEdit');