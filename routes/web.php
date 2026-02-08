<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\AdminTicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.tickets.index');
    }

    return redirect()->route('tickets.index');
})->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::resource('tickets', TicketController::class)
        ->only(['index', 'create', 'store', 'show']);

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/tickets', [AdminTicketController::class, 'index'])
            ->name('tickets.index');

        Route::get('/tickets/deleted', [AdminTicketController::class, 'deleted'])
            ->name('tickets.deleted');

        Route::get('/tickets/{ticket}', [AdminTicketController::class, 'show'])
            ->name('tickets.show');

        Route::patch('/tickets/{ticket}/status', [AdminTicketController::class, 'updateStatus'])
            ->name('tickets.status');

        Route::delete('/tickets/{ticket}', [AdminTicketController::class, 'destroy'])
            ->name('tickets.destroy');
    });

require __DIR__.'/auth.php';
