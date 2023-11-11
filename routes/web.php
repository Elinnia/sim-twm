<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\KarakterController;
use App\Http\Controllers\DeskripsikarakterController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KenaikanController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PklController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\WalikelasController;
use App\Http\Controllers\RaportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TahunAjarController;
use App\Http\Controllers\KalenderController;



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
    return redirect("auth/login");
});
Route::group(['middleware' => ['guest']], function() {
    Route::name('auth.')->prefix('auth')->group(function(){
        Route::get('/login', [AuthController::class, 'index'])->name('index');
        Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
    });
});

 Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['check.login'])->group(function(){
    Route::name('dashboard.')->prefix('dashboard')->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
    Route::name('siswa.')->prefix('siswa')->group(function(){
       Route::get('/', [SiswaController::class, 'index'])->name('index');
       Route::get('/form/{id}', [SiswaController::class, 'form'])->name('form');
       Route::get('/form_akun/{id}', [SiswaController::class, 'form_akun'])->name('form_akun');
       Route::post('/store', [SiswaController::class, 'store'])->name('store');
       Route::post('/store_akun', [SiswaController::class, 'store_akun'])->name('store_akun');
      
       Route::get('/delete/{id}', [SiswaController::class, 'delete'])->name('delete');
       Route::post('/edit/{id}', [SiswaController::class, 'edit'])->name('edit');
       
    });
    Route::name('guru.')->prefix('guru')->group(function(){
        Route::get('/', [GuruController::class, 'index'])->name('index');
        Route::get('/form/{id}', [GuruController::class, 'form'])->name('form');
        Route::post('/store',[GuruController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [GuruController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [GuruController::class, 'edit'])->name('edit');

     });
    Route::name('user.')->prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/form/{id}', [UserController::class, 'form'])->name('form');
        Route::post('/store',[UserController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [UserController::class, 'edit'])->name('edit');

    });
    Route::name('akademik.')->prefix('akademik')->group(function(){
        Route::get('/', [AkademikController::class, 'index'])->name('index');
        Route::get('/form/{id}', [AkademwalikelasikController::class, 'form'])->name('form');
        Route::post('/store', [AkademikController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [AkademikController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [AkademikController::class, 'edit'])->name('edit');
        Route::post('/get_data', [AkademikController::class, 'get_data'])->name('get_data');
        
    });

    Route::name('raport.')->prefix('raport')->group(function(){
        Route::get('/', [RaportController::class, 'index'])->name('index');
        Route::get('/approval_walikelas', [RaportController::class, 'approval_walikelas'])->name('approval_walikelas');
        Route::post('/get_data_walikelas', [RaportController::class, 'get_data_walikelas'])->name('get_data_walikelas');
        
        Route::get('/approval_kurikulum', [RaportController::class, 'approval_kurikulum'])->name('approval_kurikulum');
        Route::post('/get_data_kurikulum', [RaportController::class, 'get_data_kurikulum'])->name('get_data_kurikulum');
        
        Route::get('/approval_kepsek', [RaportController::class, 'approval_kepsek'])->name('approval_kepsek');
        Route::post('/get_data_kepsek', [RaportController::class, 'get_data_kepsek'])->name('get_data_kepsek');


        Route::get('/lihat_raport', [RaportController::class, 'lihat_raport'])->name('lihat_raport');
        Route::post('/get_data_lihat', [RaportController::class, 'get_data_lihat'])->name('get_data_lihat');

        Route::get('/cetak', [RaportController::class, 'cetak'])->name('cetak');
        Route::post('/approve_raport', [RaportController::class, 'approve_raport'])->name('approve_raport');
    });
    Route::name('karakter.')->prefix('karakter')->group(function(){
        Route::get('/', [KarakterController::class, 'index'])->name('index');
        Route::get('/form/{id}', [KarakterController::class, 'form'])->name('form');
        Route::post('/store', [KarakterController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [KarakterController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [KarakterController::class, 'edit'])->name('edit');
        Route::post('/get_siswa', [KarakterController::class, 'get_siswa'])
            ->name('get_siswa');
        Route::post('/get_data', [KarakterController::class, 'get_data'])
            ->name('get_data');

    });
    Route::name('deskripsi_karakter.')->prefix('deskripsi_karakter')->group(function(){
        Route::get('/', [DeskripsikarakterController::class, 'index'])->name('index');
        Route::get('/form/{id}', [DeskripsikarakterController::class, 'form'])->name('form');
        Route::post('/store', [DeskripsikarakterController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [DeskripsikarakterController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [DeskripsikarakterController::class, 'edit'])->name('edit');
        Route::post('/get_siswa', [DeskripsikarakterController::class, 'get_siswa'])
            ->name('get_siswa');
        Route::post('/get_data', [DeskripsikarakterController::class, 'get_data'])
            ->name('get_data');


    });
    Route::name('jurusan.')->prefix('jurusan')->group(function(){
        Route::get('/', [JurusanController::class, 'index'])->name('index');
        Route::get('/form/{id}', [JurusanController::class, 'form'])->name('form');
        Route::post('/store', [JurusanController::class, 'store'])->name('store'); 
        Route::get('/delete/{id}', [JurusanController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [JurusanController::class, 'edit'])->name('edit');
    });

     Route::name('tahun_ajar.')->prefix('tahun_ajar')->group(function(){
        Route::get('/', [TahunAjarController::class, 'index'])->name('index');
        Route::get('/form/{id}', [TahunAjarController::class, 'form'])->name('form');
        Route::post('/store', [TahunAjarController::class, 'store'])->name('store'); 
        Route::get('/delete/{id}', [TahunAjarController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [TahunAjarController::class, 'edit'])->name('edit');
    });

    Route::name('kenaikan.')->prefix('kenaikan')->group(function(){
        Route::get('/', [KenaikanController::class, 'index'])->name('index');
        Route::get('/form/{id}', [KenaikanController::class, 'form'])->name('form');
        Route::post('/store', [KenaikanController::class, 'store'])->name('store'); 
        Route::get('/delete/{id}', [KenaikanController::class, 'delete'])->name('kenaikan.delete');
        Route::post('/edit/{id}', [KenaikanController::class, 'edit'])->name('kenaikan.edit');
        Route::post('/get_data', [KenaikanController::class, 'get_data'])->name('get_data');
    });

    Route::name('kehadiran.')->prefix('kehadiran')->group(function(){
        Route::get('/', [KehadiranController::class, 'index'])->name('index');
        Route::get('/form/{id}', [KehadiranController::class, 'form'])->name('form');
        Route::post('/store', [KehadiranController::class, 'store'])->name('store'); 
        Route::get('/delete/{id}', [KehadiranController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [KehadiranController::class, 'edit'])->name('edit');
        Route::post('/get_data', [KehadiranController::class, 'get_data'])->name('get_data');
    });

    Route::name('mapel.')->prefix('mapel')->group(function(){
        Route::get('/', [MapelController::class, 'index'])->name('index');
        Route::get('/form/{id}', [MapelController::class, 'form'])->name('form');
        Route::post('/get_mapel', [MapelController::class, 'get_mapel'])->name('get_mapel');
        Route::post('/store', [MapelController::class, 'store'])->name('store'); 
        Route::get('/delete/{id}', [MapelController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [MapelController::class, 'edit'])->name('edit');
    });

    Route::name('ekstrakurikuler.')->prefix('ekstrakurikuler')->group(function(){
        Route::get('/', [EkstrakurikulerController::class, 'index'])->name('index');
        Route::get('/form/{id}', [EkstrakurikulerController::class, 'form'])->name('form');
        Route::post('/store', [EkstrakurikulerController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [EkstrakurikulerController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [EkstrakurikulerController::class, 'edit'])->name('edit');
        Route::post('/get_data', [EkstrakurikulerController::class, 'get_data'])->name('get_data');
    });

    Route::name('nilai.')->prefix('nilai')->group(function(){
        Route::get('/', [NilaiController::class, 'index'])->name('index');
        Route::get('/lihat', [NilaiController::class, 'lihat'])->name('lihat');
        Route::post('/get_data_lihat', [NilaiController::class, 'get_data_lihat'])->name('get_data_lihat');
        Route::get('/form/{id}', [NilaiController::class, 'form'])->name('form');
        Route::post('/store', [NilaiController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [NilaiController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [NilaiController::class, 'edit'])->name('edit');
        Route::post('/get_mapel', [NilaiController::class, 'get_mapel'])
            ->name('get_mapel');
        Route::post('/get_data', [NilaiController::class, 'get_data'])
            ->name('get_data');
    });

    Route::name('pkl.')->prefix('pkl')->group(function(){
        Route::get('/', [PklController::class, 'index'])->name('index');
        Route::get('/form/{id}', [PklController::class, 'form'])->name('form');
        Route::post('/store', [PklController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [PklController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [PklController::class, 'edit'])->name('edit');
        Route::post('/get_data', [PklController::class, 'get_data'])->name('get_data');
    });

    Route::name('profil.')->prefix('profil')->group(function(){
        Route::get('/', [ProfilController::class, 'index'])->name('index');
        Route::get('/form/{id}', [ProfilController::class, 'form'])->name('form');
        Route::post('/store', [ProfilController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [ProfileController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [ProfileController::class, 'edit'])->name('edit');
    });

    Route::name('walikelas.')->prefix('walikelas')->group(function(){
        Route::get('/', [WalikelasController::class, 'index'])->name('index');
        Route::get('/form/{id}', [WalikelasController::class, 'form'])->name('form');
        Route::post('/store', [WalikelasController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [WalikelasController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [WalikelasController::class, 'edit'])->name('edit');
    });

    Route::name('kalender.')->prefix('kalender')->group(function(){
        Route::get('/', [KalenderController::class, 'index'])->name('index');
        Route::get('/form/{id}', [KalenderController::class, 'form'])->name('form');
        Route::post('/store', [KalenderController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [KalenderController::class, 'delete'])->name('delete');
        Route::post('/edit/{id}', [KalenderController::class, 'edit'])->name('edit');
    });

});



/*Route::get('/', function () {
    return view('layout/layout');
});
Route::get('sim',function () {
    return view('sim');
});
Route::get('sim',[SimController::class,'index']);*/