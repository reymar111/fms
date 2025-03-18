<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\BurialPlotController;
use App\Http\Controllers\BurialTypeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DeceasedController;
use App\Http\Controllers\OffenseLevelController;
use App\Http\Controllers\PenaltyActionController;
use App\Http\Controllers\PenaltyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionViolationController;
use App\Http\Controllers\ViolationCategoryController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\YearLevelController;
use App\Models\OffenseLevel;
use App\Models\ViolationCategory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canResetPassword' => Route::has('password.request'),
        'status' => session('status'),
    ]);

    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
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

});

require __DIR__.'/auth.php';
