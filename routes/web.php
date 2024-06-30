<?php

use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/posts/create", [postController::class, "create"]);

Route::get("/posts/read", [postController::class, "read"]);

Route::get("/posts/readall", [postController::class, "all"]);

Route::get("/posts/update", [postController::class, "update"]);

Route::get("/posts/delete", [postController::class, "delete"]);