<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;

// Tạo tất cả các route cho resource 'issues'
Route::resource('issues', IssueController::class);
