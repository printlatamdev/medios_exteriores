<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistroUserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/contract/{sale}', [ReportController::class, 'contractPDF'])->name('contract.pdf');

Route::get('/external-media/{externalmedia}', [ReportController::class, 'externalmediaPDF'])->name('externalmedia.pdf');
