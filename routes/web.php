<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authurization\RoleController;

use App\Http\Controllers\User\Services\ServiceController;
use App\Http\Controllers\User\Reservations\ReservationController;
use App\Http\Controllers\Authentication\Admin\DashboardController;
use App\Http\Controllers\Authentication\Admin\AdminServiceController;
use App\Http\Controllers\Authentication\Admin\AdminReservationController;
use App\Http\Controllers\Authentication\user\LoginController as UserLoginController;
use App\Http\Controllers\Authentication\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Authentication\user\RegisterController as UserRegisterController;
use App\Http\Controllers\Authentication\Admin\RegisterController as AdminRegisterController;

##############################dashboard routes#####################
Route::name('admin.')->middleware('admin.auth')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
#####################admin authentication routes#################
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('register', [AdminRegisterController::class, 'showRegisterForm'])->name('register.form');
    Route::post('register', [AdminRegisterController::class, 'register'])->name('register');
    Route::get('login', action: [AdminLoginController::class, 'showLoginForm'])->name('login.show');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
});

##################admin authorization routes####################
Route::middleware(['auth:admin', 'can:manage'])->group(function () {
    Route::resource('roles', RoleController::class);
});
######################admin services routes#####################
Route::middleware(['auth:admin', 'can:manage'])->group(function () {
    Route::resource('services', AdminServiceController::class);
    Route::get('/statistics', [AdminServiceController::class, 'statistics'])->name('services.statistics');
});
#########################user routes###########################
Route::prefix('user')->name('user.')->group(function () {
    Route::get('services', [serviceController::class, 'showServices'])->name('services');
    Route::get('index', [serviceController::class, 'index'])->name('index');
    Route::get('register', [UserRegisterController::class, 'showRegisterForm'])->name('register.form');
    Route::post('register', [UserRegisterController::class, 'register'])->name('register');
    Route::get('login', action: [UserLoginController::class, 'showLoginForm'])->name('login.show');
    Route::post('login', [UserLoginController::class, 'login'])->name('login');
    Route::post('logout', [UserLoginController::class, 'logout'])->name('logout');
    ##################reservations routes#######################
    Route::get('reservations/{service}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::post('reservations/store', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('reservations', [ReservationController::class, 'manage'])->name('reservations.manage');
    Route::post('cancel/{id}', [ReservationController::class, 'cancel'])->name('reservations.cancel');
});

#########################admin reservations monitoring routes###########################
Route::middleware(['auth:admin', 'can:manage'])->name('admin.')->group(function () {
    Route::resource('admin/reservations', AdminReservationController::class);
    Route::get('reservations/statistics', [AdminReservationController::class, 'statistics'])->name('reservations.statistics');
});
