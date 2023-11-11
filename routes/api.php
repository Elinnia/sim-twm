<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MasterDataController;
use App\Http\Controllers\Api\NilaiController;
use App\Http\Controllers\Api\RaportController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function (){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});

 Route::get('raport/view', [RaportController::class, 'view']);

Route::group(['middleware' => ['jwt.verify']], function(){
    Route::prefix('masterdata')->group(function() {
        Route::post('tahun_ajaran', [MasterDataController::class, 'tahun_ajaran']);
        Route::post('kelas', [MasterDataController::class, 'kelas']);
        Route::post('semester', [MasterDataController::class, 'semester']);
        Route::post('jurusan', [MasterDataController::class, 'jurusan']); 
        Route::post('kalender', [MasterDataController::class, 'kalender']);        
    });

    Route::prefix('nilai')->group(function() {
        Route::post('get', [NilaiController::class, 'get']);
        Route::post('detail', [NilaiController::class, 'detail']);
                
    });

    Route::prefix('raport')->group(function() {
        Route::post('get', [RaportController::class, 'get']);
        Route::post('detail', [RaportController::class, 'detail']);
       
        
                
    });

    

   
});
