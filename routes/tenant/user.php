<?php

use App\Actions\Tenant\DownloadInvoiceAction;
use App\Http\Controllers\Tenant\DashboardController;
use App\Http\Controllers\Tenant\User\SettingsController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'check.subscription'],
    'prefix' => 'app'
] , function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/settings/profile', [SettingsController::class, 'profile'])->name('settings.profile');

    Route::middleware('check.owner')->group(function () {
        Route::get('/settings/billing', [SettingsController::class, 'billing'])->name('settings.billing');
        Route::get('/settings/invoice/{id}/download', DownloadInvoiceAction::class)->name('invoice.download');
    });
});
