<?php

use App\Http\Controllers\TodoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/todos', [TodoController::class, 'index'])->name('todos');
Route::get('/todos/create', [TodoController::class, 'create']);
Route::get('/todos/{todo:slug}', [TodoController::class, 'edit']);
Route::put('/todos/{todo:slug}', [TodoController::class, 'update']);
Route::delete('/todos/{todo:slug}', [TodoController::class, 'destroy']);
Route::post('/todos', [TodoController::class, 'store']);
