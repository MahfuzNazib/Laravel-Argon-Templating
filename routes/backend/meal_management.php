<?php

use App\Http\Controllers\Backend\MealManagementController;
use Illuminate\Support\Facades\Route;

//meal start
Route::group(['prefix' => 'meal'], function(){
    Route::get("/", [MealManagementController::class, 'MealList'])->name('meal.list');
    Route::get("/add", [MealManagementController::class, 'addDailyMeal'])->name('meal.add');
});
//meal end

?>