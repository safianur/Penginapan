<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PangpiController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RincianController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KetentuanController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\TypeKamarController;
use App\Http\Controllers\BisnisUserController;
use App\Http\Controllers\FasilitasPublicController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout']);

/* SEMUA ROUTE UNTUK USER */
Route::get('/', [BisnisUserController::class, 'index'])->middleware('guest');
// Route::get('/', [BisnisUserController::class, 'index'])->middleware('guest');
Route::post('/gettypekamaruser', [BisnisUserController::class, 'gettypekamar'])->name('gettypekamaruser');
Route::post('/booknow', [BisnisUserController::class, 'booknow']);
Route::post('/uploadbuktitf', [BisnisUserController::class, 'buktitransfer']);
Route::get('/cetak_bukti/{id_reservasi}', [BisnisUserController::class, 'cetakbukti'])->name('cetak_bukti');

Route::get('/villapakis', [BisnisUserController::class, 'villapakis'])->middleware('guest');
Route::get('/kusumahills', [BisnisUserController::class, 'kusumahills'])->middleware('guest');
Route::post('/kusumahills/detailkusumahills/{id_typekamar}', [BisnisUserController::class, 'melasti']);
Route::get('/event', [BisnisUserController::class, 'event'])->middleware('guest');
Route::get('/other', [BisnisUserController::class, 'other'])->middleware('guest');
Route::get('/ketentuan', [KetentuanController::class, 'index'])->middleware('guest');
Route::get('/rincian', [RincianController::class, 'index'])->middleware('guest');



/* SEMUA ROUTE UNTUK ADMIN */
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// route untuk halaman list booking dan detail list booking
Route::get('/list', [ReservasiController::class, 'index'])->name('listbooking')->middleware('auth');
Route::post('/gettypekamar', [ReservasiController::class, 'gettypekamar'])->name('gettypekamar');
Route::post('/list/create', [ReservasiController::class, 'create']);
Route::post('/getedittypekamar', [ReservasiController::class, 'getedittypekamar'])->name('getedittypekamar');
Route::post('/list/editreservasi/{id_reservasi}', [ReservasiController::class, 'editreservasi']);
Route::get('/list/detail/{id_reservasi}', [ReservasiController::class, 'detail'])->middleware('auth');
Route::post('/list/detail/pengunjung/{id_pengunjung}', [ReservasiController::class, 'editpengunjung']);
Route::post('/list/detail/reservasi/{id_reservasi}', [ReservasiController::class, 'editstatus']);
Route::post('/list/detail/buktitf/{id_reservasi}', [ReservasiController::class, 'buktitransfer']);

// route untuk halaman pada menu penginapan
Route::get('/type', [TypeKamarController::class, 'index'])->name('typekamar')->middleware('auth');
Route::post('/type/create', [TypeKamarController::class, 'create']);
Route::post('/type/update/{id_typekamar}', [TypeKamarController::class, 'update']);
Route::get('/type/delete/{id_typekamar}', [TypeKamarController::class, 'delete'])->middleware('auth');
Route::get('/type/info/{id_typekamar}', [TypeKamarController::class, 'info'])->middleware('auth');
Route::post('/type/info/create/{id_typekamar}', [TypeKamarController::class, 'createfasilitaskamar']);

Route::get('/faspub', [FasilitasPublicController::class, 'index'])->middleware('auth');
Route::post('/faspub/create', [FasilitasPublicController::class, 'create']);
Route::post('/faspub/update/{id_faspub}', [FasilitasPublicController::class, 'update']);
Route::get('/faspub/delete/{id_faspub}', [FasilitasPublicController::class, 'delete'])->middleware('auth');

Route::get('/wisata', [WisataController::class, 'index'])->middleware('auth');
Route::post('/wisata/create', [WisataController::class, 'create']);
Route::post('/wisata/update/{id_wiwisata}', [WisataController::class, 'update']);
Route::get('/wisata/delete/{id_wisata}', [WisataController::class, 'delete'])->middleware('auth');

Route::get('/gallery', [GalleryController::class, 'index'])->middleware('auth');
Route::post('/gallery/create', [GalleryController::class, 'create']);
Route::post('/gallery/update/{id_gallery}', [GalleryController::class, 'update']);
Route::get('/gallery/delete/{id_gallery}', [GalleryController::class, 'delete'])->middleware('auth');

// route untuk halaman kegiatan
Route::get('/kegiatan', [KegiatanController::class, 'index'])->middleware('auth');
Route::post('/kegiatan/create', [KegiatanController::class, 'create']);
Route::post('/kegiatan/update/{id_kegiatan}', [KegiatanController::class, 'update']);
Route::get('/kegiatan/delete/{id_kegiatan}', [KegiatanController::class, 'delete'])->middleware('auth');

// route untuk halaman gallery pada menu PangPi
Route::get('/pangpi', [PangpiController::class, 'index'])->middleware('auth');
Route::post('/pangpi/create', [PangpiController::class, 'create']);
Route::post('/pangpi/update/{id_pangpi}', [PangpiController::class, 'update']);
Route::get('/pangpi/delete/{id_pangpi}', [PangpiController::class, 'delete'])->middleware('auth');

// route untuk halaman data pegawai
Route::get('/pegawai', [UserController::class, 'index'])->middleware('auth');
Route::post('/pegawai/create', [UserController::class, 'create']);
Route::post('/pegawai/update/{id_user}', [UserController::class, 'update']);
Route::get('/pegawai/delete/{id_user}', [UserController::class, 'delete'])->middleware('auth');
