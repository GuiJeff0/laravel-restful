<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EmployeeController;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("/user/add", [EmployeeController::class, 'store',])->name('user.getallemployee');
Route::get("/user/all", [EmployeeController::class, 'getallemployee',])->name('user.getallemployee');
Route::put("/user/update/{id}", [EmployeeController::class, 'updateemployee',])->name('user.updateemployee');
Route::delete("/user/delete/{id}", [EmployeeController::class, 'deleteemployee',])->name('user.deleteemployee');