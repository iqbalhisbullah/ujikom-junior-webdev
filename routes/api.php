<?php

use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// route group name api
Route::group(['as' => 'api.'], function () {
// resource route
Route::resource('employees', EmployeeController::class)
    ->except(['create', 'edit']);

});
