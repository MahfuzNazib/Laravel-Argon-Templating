<?php

use App\Http\Controllers\Backend\RoleManagementController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'rolemanagement'], function(){

    //role start
    Route::group(['prefix' => 'role'], function(){
        Route::get("/",[RoleManagementController::class,'index'])->name('role.all');
        Route::get("/data",[RoleManagementController::class,'data'])->name('role.data');
        Route::get("/add",[RoleManagementController::class,'add_modal'])->name('role.add.modal');
        Route::post("/add",[RoleManagementController::class,'add'])->name('role.add');
        Route::get("/edit/{id}",[RoleManagementController::class,'edit'])->name('role.edit');
        Route::post("/update/{id}",[RoleManagementController::class,'update'])->name('role.update');
    });
    //role end

});

?>