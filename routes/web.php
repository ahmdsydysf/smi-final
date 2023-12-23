<?php

use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function () {

        Route::get('/', function () {
            return view('welcome');
        });



        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->middleware(['auth', 'verified' ,'accDash'])->name('dashboard');

        Route::prefix('/dashboard')
        ->as('dashboard.')
        ->middleware(['auth', 'verified' ,'accDash'])
        ->group(function () {
            Route::get('/', function () {
                return view('dashboard');
            })->name('main');

            Route::resource('users', UserController::class);
        });
    }
);

require __DIR__ . '/auth.php';
