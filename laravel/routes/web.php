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
    return view('home');
});
Route::get('home', function () {
    return view('home');
});
Route::get('product/getcurl/{page}', 'ProductController@getCurl')->name('product/getcurl');
Route::get('product/detail_product/{id}', 'ProductController@detailProduct');
Route::get('product/list_product', 'ProductController@listProduct')->name('product/list_product');
Route::get('product/list', 'ProductController@getList')->name('product/list');
Route::post('comment/add', 'ProductController@addComment')->name('comment/add');
Route::get('vote/add/{commentId}/{ip}/{isUp}', 'VoteCommentController@addComment')->name('vote/add');
Route::get('vote/getvote/{commentId}', 'VoteCommentController@getCountVote')->name('vote/getvote');