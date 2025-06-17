<?php

use Illuminate\Support\Facades\Route;
use Ghayas\HelloWorldPackage\Controllers\HelloWorldController;

Route::get('/hello-world', [HelloWorldController::class, 'index'])->name('hello-world.index');