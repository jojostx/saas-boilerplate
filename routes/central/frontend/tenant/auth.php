<?php

use App\Actions\Central\CreateTenantAction;
use App\Actions\Central\TenantLoginAction;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'tenant.' ], function () {
    Route::view('login', 'central.frontend.tenants.login')->name('login');
    Route::view('register', 'central.frontend.tenants.register')->name('register');

    Route::post('login', TenantLoginAction::class)->name('login');
    Route::post('register', CreateTenantAction::class)->name('register');
});
