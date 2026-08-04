<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\LayananController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/profile', 'profile.index')->name('profile');
Route::get('/layanan', [LayananController::class, 'index'])
    ->name('layanan');

/*
|--------------------------------------------------------------------------
| DETAIL LAYANAN PUBLIC
|--------------------------------------------------------------------------
*/

Route::view('/layanan/ajb-detail', 'layanan.ajb-detail')
    ->name('layanan.ajb.detail');

Route::view('/layanan/hibah-detail', 'layanan.hibah-detail')
    ->name('layanan.hibah.detail');

Route::view('/layanan/warisan-detail', 'layanan.warisan-detail')
    ->name('layanan.warisan.detail');

Route::view('/layanan/aphb-detail', 'layanan.aphb-detail')
    ->name('layanan.aphb.detail');

/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::get('/kontak', [ContactController::class, 'index'])
    ->name('kontak');

Route::post('/kontak', [ContactController::class, 'store'])
    ->name('kontak.store');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {

        if (auth()->user()->role == 'admin') {
            return redirect('/admin');
        }

        return redirect('/user/dashboard');

    })->name('dashboard');

});

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard User
Route::get('/user/dashboard', function () {

    $pengajuan = \App\Models\Pengajuan::where('user_id', auth()->id())
                    ->latest()
                    ->take(5)
                    ->get();

    $total = \App\Models\Pengajuan::where('user_id', auth()->id())
                ->count();

    $pending = \App\Models\Pengajuan::where('user_id', auth()->id())
                    ->where('status', 'pending')
                    ->count();

    $diproses = \App\Models\Pengajuan::where('user_id', auth()->id())
                    ->where('status', 'diproses')
                    ->count();

    $selesai = \App\Models\Pengajuan::where('user_id', auth()->id())
                    ->where('status', 'selesai')
                    ->count();

    return view('user.dashboard', compact(
        'pengajuan',
        'total',
        'pending',
        'diproses',
        'selesai'
    ));

})->name('user.dashboard');

    // Profil User
    Route::get('/user/profil', function () {
        return view('user.profil');
    })->name('user.profil');

    // Layanan User
    Route::get('/user/layanan', function () {
        return view('user.layanan');
    })->name('user.layanan');

    /*
    |--------------------------------------------------------------------------
    | DETAIL LAYANAN
    |--------------------------------------------------------------------------
    */

    Route::get('/user/layanan/hibah', function () {
        return view('user.layanan.hibah');
    })->name('hibah');

    Route::get('/user/layanan/warisan', function () {
        return view('user.layanan.warisan');
    })->name('warisan');

    Route::get('/user/layanan/jual-beli', function () {
        return view('user.layanan.jualbeli');
    })->name('jualbeli');

    Route::get('/user/layanan/aphb', function () {
        return view('user.layanan.aphb');
    })->name('aphb');

    /*
    |--------------------------------------------------------------------------
    | SUBMIT PENGAJUAN
    |--------------------------------------------------------------------------
    */

    Route::post('/user/layanan/hibah/store',
        [PengajuanController::class, 'storeHibah']
    )->name('hibah.store');

    Route::post('/user/layanan/warisan/store',
        [PengajuanController::class, 'storeWarisan']
    )->name('warisan.store');

    Route::post('/user/layanan/jual-beli/store',
        [PengajuanController::class, 'storeJualBeli']
    )->name('jualbeli.store');

        Route::post('/user/layanan/aphb/store',
        [PengajuanController::class, 'storeAPHB']
    )->name('aphb.store');

    /*
    |--------------------------------------------------------------------------
    | USER MENU
    |--------------------------------------------------------------------------
    */

    // Pendaftaran
    Route::get('/user/pendaftaran', function () {
        return view('user.pendaftaran');
    })->name('user.pendaftaran');

    // Histori
Route::get('/user/histori', function (Illuminate\Http\Request $request) {

    $tahun = $request->tahun ?? date('Y');

    $pengajuan = App\Models\Pengajuan::where('user_id', auth()->id())
        ->whereYear('tanggal_pengajuan', $tahun)
        ->latest()
        ->get();

    return view('user.histori', compact('pengajuan', 'tahun'));

})->middleware('auth')->name('user.histori');

    // ==========================
// REVISI DOKUMEN
// ==========================

Route::get('/user/pengajuan/{id}/edit',
    [PengajuanController::class, 'edit']
)->name('user.pengajuan.edit');

Route::put('/user/pengajuan/{id}',
    [PengajuanController::class, 'update']
)->name('user.pengajuan.update');

    // profil
    Route::put('/user/profile/update',
    [ProfileController::class, 'updateCustom']
    )->name('profile.update.custom');

    /*
    |--------------------------------------------------------------------------
    | PROFILE LARAVEL
    |--------------------------------------------------------------------------
    */

    Route::get('/user-profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::get('/user/profil/edit', function () {
    return view('user.edit-profil');
    })->name('user.editprofil');

    Route::patch('/user-profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete('/user-profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard Admin
Route::get('/admin', function () {

    $total = \App\Models\Pengajuan::count();

    $pending = \App\Models\Pengajuan::where('status', 'pending')->count();

    $diproses = \App\Models\Pengajuan::where('status', 'diproses')->count();

    $selesai = \App\Models\Pengajuan::where('status', 'selesai')->count();

    $pengajuan = \App\Models\Pengajuan::latest()
                    ->take(5)
                    ->get();

    return view('admin.dashboard', compact(
        'total',
        'pending',
        'diproses',
        'selesai',
        'pengajuan'
    ));

})->name('admin');

    // Kontak
    Route::get('/admin/contacts',
        [ContactController::class, 'adminIndex']
    )->name('admin.contacts');

    // Pegawai
    Route::get('/pegawai', function () {
        return view('admin.pegawai');
    })->name('admin.pegawai');

    // Klien
    Route::get('/klien', function () {
        return view('admin.klien');
    })->name('admin.klien');

    // Pendaftaran
    Route::get('/pendaftaran', function () {
        return view('admin.pendaftaran');
    })->name('admin.pendaftaran');

    // Laporan
    Route::get('/laporan',
       [PengajuanController::class, 'laporan']
    )->name('admin.laporan');

    Route::get('/laporan/pdf',
       [PengajuanController::class, 'laporanPdf']
    )->name('admin.laporan.pdf');

    // Pengajuan User
    Route::get('/admin/pengajuan', function () {

        $pengajuan = \App\Models\Pengajuan::with('user')
                        ->latest()
                        ->get();

        return view('admin.pengajuan', compact('pengajuan'));

    })->name('admin.pengajuan');

    // Detail Pengajuan
    Route::get('/admin/pengajuan/{id}',
        [PengajuanController::class, 'show']
    )->name('admin.pengajuan.show');

    //Pengajuan status
    Route::put('/admin/pengajuan/{id}/status',
        [PengajuanController::class, 'updateStatus']
    )->name('admin.pengajuan.status');

Route::put('/admin/pengajuan/{id}/progress',
    [PengajuanController::class, 'updateProgress']
)->name('admin.progress.update');

    Route::post('/admin/surat/{id}/kirim',
    [PengajuanController::class, 'kirimSurat']
)->name('admin.surat.kirim');

    Route::post('/admin/pengajuan/{id}/upload-surat',
    [PengajuanController::class, 'uploadSurat']
)->name('admin.pengajuan.upload-surat');

Route::get('/user/surat/{id}', function ($id) {
    $pengajuan = \App\Models\Pengajuan::findOrFail($id);

    return view('surat.pemberitahuan', compact('pengajuan'));
});

Route::get('/user/surat/{id}/download',
[PengajuanController::class, 'downloadSurat']);

Route::get('/admin/pengajuan/{id}/surat',
    [PengajuanController::class, 'previewSurat']
)->name('admin.surat.create');

// Kelola Layanan Admin
Route::resource('/admin/layanan', LayananController::class)
    ->names('admin.layanan');

       /*
    |--------------------------------------------------------------------------
    | GRAFIK DASHBOARD (FILTER TAHUN)
    |--------------------------------------------------------------------------
    */
    Route::get('/grafik', function (Request $request) {

        $tahun = $request->tahun ? (int)$request->tahun : date('Y');

        $perBulan = \App\Models\Pengajuan::selectRaw('MONTH(tanggal_pengajuan) as bulan, COUNT(*) as total')
            ->whereYear('tanggal_pengajuan', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        $perLayanan = \App\Models\Pengajuan::selectRaw('layanan, COUNT(*) as total')
            ->whereYear('tanggal_pengajuan', $tahun)
            ->groupBy('layanan')
            ->get();

        $dataTahun = \App\Models\Pengajuan::with('user')
            ->whereYear('tanggal_pengajuan', $tahun)
            ->latest()
            ->get();

        return view('admin.grafik', compact(
            'perBulan',
            'perLayanan',
            'tahun',
            'dataTahun'
            ));

    })->name('admin.grafik');

    /*
    |--------------------------------------------------------------------------
    | DRILLDOWN DETAIL (KLIK BULAN)
    |--------------------------------------------------------------------------
    */
    Route::get('/grafik/detail', function (Request $request) {

        $tahun = $request->tahun ? (int)$request->tahun : date('Y');
        $bulan = $request->bulan;

        if (!$bulan) {
            return response()->json([]);
        }

        return \App\Models\Pengajuan::with('user')
            ->whereYear('created_at', $tahun)
            ->whereMonth('created_at', $bulan)
            ->latest()
            ->get();

    })->name('admin.grafik.detail');
});

require __DIR__.'/auth.php';
