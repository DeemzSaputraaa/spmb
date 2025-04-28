<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use Illuminate\Support\Facades\Route;

// Redirect root to login
Route::redirect('/', '/home');

Route::get('/home', function () {
    return view('home');
})->name('home');

// Guest routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('/admin/siswa', SiswaController::class)->names([
    'index' => 'admin.siswa.index',
    'create' => 'admin.siswa.create',
    'store' => 'admin.siswa.store',
    'edit' => 'admin.siswa.edit',
    'update' => 'admin.siswa.update',
    'destroy' => 'admin.siswa.destroy',
])->except(['show']);

// Tambahkan route resource untuk TabulasiController
Route::resource('/admin/tabulasi', \App\Http\Controllers\Admin\TabulasiController::class)->names([
    'index' => 'admin.tabulasi.index',
    'create' => 'admin.tabulasi.create',
    'store' => 'admin.tabulasi.store',
    'edit' => 'admin.tabulasi.edit',
    'update' => 'admin.tabulasi.update',
    'destroy' => 'admin.tabulasi.destroy',
])->except(['show']);

// Route untuk export Excel
Route::get('/admin/tabulasi/export/excel', [\App\Http\Controllers\Admin\TabulasiController::class, 'exportExcel'])->name('admin.tabulasi.export.excel');
// Route untuk export CSV (alternatif)
Route::get('/admin/tabulasi/export/csv', [\App\Http\Controllers\Admin\TabulasiController::class, 'exportCsv'])->name('admin.tabulasi.export.csv');

// Pendaftaran Wizard Routes
Route::get('/admin/siswa/{siswa_id}/pendaftaran', [App\Http\Controllers\Admin\PendaftaranController::class, 'index'])->name('admin.siswa.pendaftaran.index');
Route::post('/admin/siswa/{siswa_id}/pendaftaran/step1', [App\Http\Controllers\Admin\PendaftaranController::class, 'storeStep1'])->name('admin.siswa.pendaftaran.step1');
Route::post('/admin/siswa/{siswa_id}/pendaftaran/step2', [App\Http\Controllers\Admin\PendaftaranController::class, 'storeStep2'])->name('admin.siswa.pendaftaran.step2');
Route::post('/admin/siswa/{siswa_id}/pendaftaran/step3', [App\Http\Controllers\Admin\PendaftaranController::class, 'storeStep3'])->name('admin.siswa.pendaftaran.step3');
Route::post('/admin/siswa/{siswa_id}/pendaftaran/step4', [App\Http\Controllers\Admin\PendaftaranController::class, 'storeStep4'])->name('admin.siswa.pendaftaran.step4');
Route::post('/admin/siswa/{siswa}/pendaftaran/save-draft', [App\Http\Controllers\PendaftaranController::class, 'saveDraft'])
    ->name('admin.siswa.pendaftaran.save-draft');

// Siswa Dashboard
Route::get('/siswa/dashboard', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard');

// Fallback route for dashboard (will be redirected based on role)
Route::get('/dashboard', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('siswa.dashboard');
    }
})->name('dashboard');
