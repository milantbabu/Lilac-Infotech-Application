<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticateUser');

Route::middleware(['auth'])->group(function() {
	
	Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
	Route::get('dashboard/get', [DashboardController::class, 'get'])->name('getDashboardData');

	Route::get('departments', [DepartmentController::class, 'index'])->name('departments');
	Route::post('department/save', [DepartmentController::class, 'save'])->name('saveDepartment');
	Route::get('department/get', [DepartmentController::class, 'get'])->name('getDepartment');
	Route::delete('department/delete', [DepartmentController::class, 'delete'])->name('deleteDepartment');

	Route::get('designations', [DesignationController::class, 'index'])->name('designations');
	Route::post('designation/save', [DesignationController::class, 'save'])->name('saveDesignation');
	Route::get('designation/get', [DesignationController::class, 'get'])->name('getDesignation');
	Route::delete('designation/delete', [DesignationController::class, 'delete'])->name('deleteDesignation');

	Route::get('users', [UserController::class, 'index'])->name('users');
	Route::get('get/users', [UserController::class, 'get'])->name('getUsers');
	Route::get('user/departments', [UserController::class, 'getUserDepartments'])->name('getUserDepartments');
	Route::get('user/designations', [UserController::class, 'getUserDesignations'])->name('getUserDesignations');
	Route::post('user/save', [UserController::class, 'save'])->name('saveUser');

	Route::get('profile', [LoginController::class, 'profile'])->name('userProfile');
	Route::post('profile/save', [LoginController::class, 'saveProfile'])->name('saveProfile');
	Route::get('logout', [LoginController::class, 'logout'])->name('logout');
	
});


