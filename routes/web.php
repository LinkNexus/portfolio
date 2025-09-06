<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
  return view('home');
})->name("home");

// Dashboard routes (protected)
Route::controller(DashboardController::class)
  ->group(function () {
    Route::match(["POST", "GET"], "login", "login")->name("login");
    Route::match(["GET", "POST"], '/dashboard', 'index')->name('dashboard')->middleware("dashboard_auth");
  });

