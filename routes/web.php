<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MJasaController;
use App\Http\Controllers\MProdukController;
use App\Http\Controllers\ReportTransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Route names using the original "slash" style are kept intentionally so the
| existing Blade views continue to work without any changes.
|
*/

Route::get('/', function () {
    return view('datahome.index');
});

Route::post('loginaksi', [AuthController::class, 'loginaksi'])->name('loginaksi');
Route::get('logoutaksi', [AuthController::class, 'logoutaksi'])->name('logoutaksi')->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/loginpage', [AuthController::class, 'loginpage'])->name('loginpage');

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'getIndex'])->name('dashboard');

    // Master Inovasi - Produk
    Route::get('/masterproduk', [MProdukController::class, 'getIndex'])->name('masterproduk');
    Route::get('/masterproduk/create', [MProdukController::class, 'getCreate'])->name('masterproduk/create');
    Route::post('/masterproduk/store', [MProdukController::class, 'store'])->name('masterproduk/store');
    Route::post('/masterproduk/update', [MProdukController::class, 'update'])->name('masterproduk/update');
    Route::post('/masterproduk/destroy', [MProdukController::class, 'destroy'])->name('masterproduk/destroy');
    Route::post('/masterproduk/publish', [MProdukController::class, 'publish'])->name('masterproduk/publish');
    Route::post('/masterproduk/notes', [MProdukController::class, 'notes'])->name('masterproduk/notes');
    Route::post('/masterproduk/anulir', [MProdukController::class, 'anulir'])->name('masterproduk/anulir');
    Route::get('/masterproduk/edit/{id}', [MProdukController::class, 'getEdit']);
    Route::get('/masterproduk/detail/{id}', [MProdukController::class, 'getShow']);
    Route::get('/masterproduk/revision/{id}', [MProdukController::class, 'getRevision']);
    Route::get('/masterproduk/rejected/{id}', [MProdukController::class, 'getRejected']);

    // Master Inovasi - Jasa
    Route::get('/masterjasa', [MJasaController::class, 'getIndex'])->name('masterjasa');
    Route::get('/masterjasa/create', [MJasaController::class, 'getCreate'])->name('masterjasa/create');
    Route::post('/masterjasa/store', [MJasaController::class, 'store'])->name('masterjasa/store');
    Route::post('/masterjasa/update', [MJasaController::class, 'update'])->name('masterjasa/update');
    Route::post('/masterjasa/destroy', [MJasaController::class, 'destroy'])->name('masterjasa/destroy');
    Route::post('/masterjasa/publish', [MJasaController::class, 'publish'])->name('masterjasa/publish');
    Route::post('/masterjasa/notes', [MJasaController::class, 'notes'])->name('masterjasa/notes');
    Route::post('/masterjasa/anulir', [MJasaController::class, 'anulir'])->name('masterjasa/anulir');
    Route::get('/masterjasa/edit/{id}', [MJasaController::class, 'getEdit']);
    Route::get('/masterjasa/detail/{id}', [MJasaController::class, 'getShow']);
    Route::get('/masterjasa/revision/{id}', [MJasaController::class, 'getRevision']);
    Route::get('/masterjasa/rejected/{id}', [MJasaController::class, 'getRejected']);

    // Laporan transaksi
    Route::get('/transaksiproduk', [ReportTransaksiController::class, 'getIndex'])->name('transaksiproduk');
    Route::get('/transaksijasa', [ReportTransaksiController::class, 'getIndexJasa'])->name('transaksijasa');

    // Profil & manajemen pengguna
    Route::get('/profil', [UserController::class, 'getIndex'])->name('profil');
    Route::get('/profil/usermanagement', [UserController::class, 'getUser'])->name('/profil/usermanagement');
    Route::get('/profil/usermanagement/operator', [UserController::class, 'getOperator'])->name('/profil/usermanagement/operator');
    Route::get('/profil/create', [UserController::class, 'getCreate'])->name('/profil/create');
    Route::post('/profil/store', [UserController::class, 'store'])->name('/profil/store');
    Route::get('/profil/usermanagement/operator/edit/{id}', [UserController::class, 'getEdit']);
    Route::post('/profil/update', [UserController::class, 'update'])->name('profil/update');
    Route::post('/profil/changepassword', [UserController::class, 'change'])->name('profil/changepassword');
    Route::post('/profil/changeprofil', [UserController::class, 'changeprofil'])->name('profil/changeprofil');
    Route::get('/profil/aktif/{id}/{status}', [UserController::class, 'aktif']);
    Route::get('/profil/reset/{id}', [UserController::class, 'reset']);
});
