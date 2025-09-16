<?php

use App\Http\Controllers\DashboardController;
use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/contact', function (ContactRequest $request) {
    Mail::to(config('mail.from.address'))->send(new Contact(
        name: $request->input('name'),
        email: $request->input('email'),
        subjectString: $request->input('subject'),
        message: $request->input('message')
    ));

    return redirect(route('home') . '#contact')
        ->with('success', 'Your message has been sent successfully!');
})
    ->name('contact')
    ->middleware('throttle:5,1');

// Dashboard routes (protected)
Route::controller(DashboardController::class)
    ->group(function () {
        Route::match(['POST', 'GET'], 'login', 'login')->name('login');
        Route::view('/dashboard', 'dashboard.index')->middleware('dashboard_auth');
        Route::post('/dashboard', 'handleSubmit')->name('dashboard.handle_submit')->middleware('dashboard_auth');
    });
