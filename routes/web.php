<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [StudentController::class, 'index'])->name('index');
// Route::get('/login', [StudentController::class, 'login'])->name('admin.login');
Route::group(['prefix' => 'student'],function ($router) {
        Route::post('/store', [StudentController::class, 'studentStore'])->name('student.store');
        Route::get('/view', [StudentController::class, 'studentShow'])->name('student.view');
        
    }
);
