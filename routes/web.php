<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
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
Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class,'index'])->name('login');
    Route::post('login', [LoginController::class,'authenticate']);

    Route::get('/', function () {
        return view('home');
    });
    Route::get('/about', function () {
        return view('about');
    });
    Route::get('/projects', function () {
        return view('project');
    });
    Route::get('/contact', function () {
        return view('contact');
    });
    Route::get('/index', function () {
        return view('template');
    });
});
Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('master_s', SiswaController::class);
    Route::get('master_s/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('master_s.hapus');
    Route::resource('master_p', ProjectController::class);
    Route::get('master_p/create/{id_siswa}', [ProjectController::class, 'create'])->name('master_p.create');
    Route::get('master_p/{id_siswa}/hapus', [ProjectController::class, 'hapus'])->name('master_p.hapus');
    Route::resource('master_k', ContactController::class);
    Route::post('logout', [LoginController::class,'logout']);
    
});

// Route::resource('dashboard', DashboardController::class);
// Route::get('login', [LoginController::class,'index'])->name('login');
// Route::post('login', [LoginController::class,'authenticate']);
// Route::post('logout', [LoginController::class,'logout']);
// Route::resource('master_s', SiswaController::class);
// Route::get('master_s/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('master_s.hapus');
// Route::resource('master_p', ProjectController::class);
// Route::get('master_p/create/{id_siswa}', [ProjectController::class, 'create'])->name('master_p.create');
// Route::get('master_p/{id_siswa}/hapus', [ProjectController::class, 'hapus'])->name('master_p.hapus');
// Route::resource('master_k', ContactController::class);
// Route::get('/', 'DashboardController@index');

// Route::get('/master_s', function () {
//     return view('master_siswa');
// });
// Route::get('/master_p', function () {
//     return view('master_project');
// });
// Route::get('/master_k', function () {
//     return view('master_kontak');
// });
Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/projects', function () {
    return view('project');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/index', function () {
    return view('template');
});
