<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/filialy/{branch}', [BranchController::class, 'show'])->name('branch.show');
