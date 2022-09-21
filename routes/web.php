<?php

use App\Http\Controllers\TestController;
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

Route::get('test/edit/{test}', [TestController::class, 'update'])->name('test.edit');
Route::put('test/update/{test}', [TestController::class, 'update'])->name('test.update');
Route::delete('test/{id}', [TestController::class, 'destroy'])->name('test.destroy');
Route::resource('test', TestController::class)->middleware('auth')->except(['edit', 'update', 'destroy']);
//Route::get('tests/update/{test}', [TestController::class, 'update'])->name('tests.update');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
