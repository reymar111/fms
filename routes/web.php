<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeceasedController;
use App\Http\Controllers\BurialPlotController;
use App\Http\Controllers\BurialTypeController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/reservation'); // Redirect to dashboard if already authenticated
    }

    return Inertia::render('Auth/Login', [
        'canResetPassword' => Route::has('password.request'),
        'status' => session('status'),
    ]);
});

Route::get('/dashboard', function () {
    return redirect('/reservation');
    // return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // NEW SETTINGS

    //client
    Route::prefix('client')->group(function() {
        Route::get('/',[ClientController::class, 'index'])->name('client.index');
        Route::post('/store', [ClientController::class, 'store'])->name('client.store');
        Route::patch('/update/{client}', [ClientController::class, 'update'])->name('client.update');
        Route::delete('/destroy/{client}', [ClientController::class, 'destroy'])->name('client.destroy');
    });

    //burial type
    Route::prefix('burial_type')->group(function() {
        Route::get('/',[BurialTypeController::class, 'index'])->name('burial_type.index');
        Route::post('/store', [BurialTypeController::class, 'store'])->name('burial_type.store');
        Route::patch('/update/{burial_type}', [BurialTypeController::class, 'update'])->name('burial_type.update');
        Route::delete('/destroy/{burial_type}', [BurialTypeController::class, 'destroy'])->name('burial_type.destroy');
    });

    //burial plot
    Route::prefix('burial_plot')->group(function() {
        Route::get('/',[BurialPlotController::class, 'index'])->name('burial_plot.index');
        Route::post('/store', [BurialPlotController::class, 'store'])->name('burial_plot.store');
        Route::patch('/update/{burial_plot}', [BurialPlotController::class, 'update'])->name('burial_plot.update');
        Route::delete('/destroy/{burial_plot}', [BurialPlotController::class, 'destroy'])->name('burial_plot.destroy');
    });

    // deceased
    Route::prefix('deceased')->group(function() {
        Route::get('/',[DeceasedController::class, 'index'])->name('deceased.index');
        Route::post('/store', [DeceasedController::class, 'store'])->name('deceased.store');
        Route::patch('/update/{deceased}', [DeceasedController::class, 'update'])->name('deceased.update');
        Route::delete('/destroy/{deceased}', [DeceasedController::class, 'destroy'])->name('deceased.destroy');
    });

    // reservation
    Route::prefix('reservation')->group(function() {
        Route::get('/',[ReservationController::class, 'index'])->name('reservation.index');
        Route::post('/store', [ReservationController::class, 'store'])->name('reservation.store');
        Route::patch('/update/{reservation}', [ReservationController::class, 'update'])->name('reservation.update');
        Route::patch('/update_status/{reservation}', [ReservationController::class, 'updateStatus'])->name('reservation.update_status');
        Route::delete('/destroy/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
    });

    // payment
    Route::prefix('payment')->group(function() {
        Route::get('/',[PaymentController::class, 'index'])->name('payment.index');
        Route::post('/store', [PaymentController::class, 'store'])->name('payment.store');
        Route::patch('/update/{payment}', [PaymentController::class, 'update'])->name('payment.update');
        Route::patch('/update_status/{payment}', [PaymentController::class, 'updateStatus'])->name('payment.update_status');
        Route::delete('/destroy/{payment}', [PaymentController::class, 'destroy'])->name('payment.destroy');
    });

    // payment

    Route::prefix('user')->middleware('isAdmin')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::patch('/update/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    // reservation summary
    Route::prefix('reports')->group(function() {
        Route::get('/reservation_summary', [ReportController::class, 'reservationSummary'])->name('report.reservation_summary');
        Route::get('/payment', [ReportController::class, 'generatePaymentReport'])->name('report.payment');
        Route::get('/available_burial_plots', [ReportController::class, 'generateAvailablePlotsReport'])->name('report.available_burial_plots');
        Route::get('/deceased_burial_report', [ReportController::class, 'generateDeceasedBurialReport'])->name('report.deceased_burial_report');
        Route::get('/revenue_report', [ReportController::class, 'generateRevenueReport'])->name('report.revenue_report');
    });

});

require __DIR__.'/auth.php';
