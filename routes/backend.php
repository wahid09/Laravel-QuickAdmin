<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\LogActivityController;




Route::get('/dashboard', DashboardController::class)->name('dashboard');
//Roles
Route::resource('/roles', RoleController::class);

//User
Route::resource('/users', UserController::class);
Route::resource('/profile', ProfileController::class);

//Backup
Route::resource('/backups', BackupController::class)->only(['index', 'store', 'destroy']);
Route::get('backups/{file_name}', [BackupController::class, 'download'])->name('backups.download');
Route::delete('backups', [BackupController::class, 'clean'])->name('backups.clean');

//Permission
Route::resource('/permissions', PermissionController::class);

//Modules
Route::resource('/modules', ModuleController::class);

//Log activity
Route::get('/logs', [LogActivityController::class, 'index'])->name('log_list');
Route::get('/add_log', [LogActivityController::class, 'store'])->name('add_log');
Route::delete('/log-delete/{id}', [LogActivityController::class, 'delete'])->name('log_delete');
