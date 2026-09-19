<?php

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filialy/{branch}', [BranchController::class, 'show'])->name('branch.show');
