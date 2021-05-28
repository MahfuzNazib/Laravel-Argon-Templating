<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;


Route::group(['prefix' => 'usermanagement'], function(){

    //user start 
    Route::group(['prefix' => 'user'], function(){
        Route::get("/",[UserController::class,'index'])->name('user.all');
        Route::get("/data",[UserController::class,'allUserData'])->name('user.data');

        Route::get("/add",[UserController::class,'add_modal'])->name('user.add.modal');
        Route::post("/add",[UserController::class,'add'])->name('user.add');

        Route::get("/edit/{id}",[UserController::class,'edit'])->name('user.edit');
        Route::post("/edit/{id}",[UserController::class,'update'])->name('user.update');

        Route::get("/reset/modal/{id}",[UserController::class,'reset_modal'])->name('user.reset.modal');
        Route::post("/reset/{id}",[UserController::class,'reset'])->name('user.reset');
    }); 
    //user end

});

?>