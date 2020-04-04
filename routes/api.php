<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiresource('question', 'QuestionController');
Route::apiresource('category', 'CategoryController');
Route::apiresource('/{question}/reply', 'ReplyController');
Route::post('/Like/{reply}', 'LikesController@LikeIt');
Route::delete('/Like/{reply}', 'LikesController@unLikeIt');

Route::post('notifications','NotificationsController@index');
Route::post('markAsRead','NotificationsController@markAsRead');


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
