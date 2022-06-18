<?php

use App\Actions\Central\DownloadInvoiceAction;
use App\Http\Controllers\Central\Backend\DashboardController;
use App\Http\Controllers\Central\Backend\ProfileController;
use App\Http\Controllers\Central\Backend\SettingsController;
use App\Http\Controllers\Central\Backend\StripeController;
use App\Http\Controllers\Central\Backend\TenantController;
use App\Http\Controllers\Central\Backend\UserController;
use App\Http\Controllers\Central\Backend\RoleController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin'
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings')->middleware('can:settings');

    Route::get('/stripe', [StripeController::class, 'index'])->name('stripe.dashboard')->middleware('can:stripe');

    Route::resource('/tenants', TenantController::class);

    Route::get('/tenants/{tenant}/manage', [TenantController::class, 'manage'])->name('tenants.manage.subscription');
    Route::get('/tenants/invoice/{tenant}/{invoice}/download', DownloadInvoiceAction::class)->name('tenants.invoice.download');

    Route::resource('/auth/user', UserController::class);
    Route::resource('/auth/role', RoleController::class);
});
