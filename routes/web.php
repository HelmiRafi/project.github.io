<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuntController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;

use GuzzleHttp\Middleware;

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



//Route::get('/user',[UserController::class,'user'])->name('user');
//Route::post('/user/store',[AuntController::class,'Store'])->name('userpost');
Route::get('/',[AuntController::class,'login'])->name('login');
Route::post('/',[AuntController::class,'loginStore'])->name('loginpost');
Route::post('/logout',[AuntController::class,'logout'])->name('logout');

Route::group(['middleware' =>['CheckRole:admin']],  function () {

    //User
    Route::get('/user',[UserController::class,'index'])->name('user');
    Route::post('/user/store',[UserController::class,'store'])->name('store');
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('update');
    Route::get('/user/destroy/{id}',[UserController::class,'destroy'])->name('destroy');

    //Kategori
    Route::get('/kategori',[KategoriController::class,'index']);
    Route::post('/kategori/store',[KategoriController::class,'store']);
    Route::post('/kategori/update/{id}',[KategoriController::class,'update']);
    Route::get('/kategori/destroy/{id}',[KategoriController::class,'destroy']);

    //Barang
    Route::get('/barang',[BarangController::class,'index']);
    Route::post('/barang/store',[BarangController::class,'store']);
    Route::post('/barang/update/{id}',[BarangController::class,'update']);
    Route::get('/barang/destroy/{id}',[BarangController::class,'destroy']);
});

Route::group(['middleware' =>['CheckRole:user']],function () {
    Route::get('/home',[HomeController::class,'index'])->name('home');

    //Barang Masuk
    Route::get('/barangMasuk',[BarangMasukController::class,'index']);
    Route::post('/barangMasuk/store',[BarangMasukController::class,'store']);
    Route::post('/barangMasuk/update/{id}',[BarangMasukController::class,'update']);
    Route::get('/barangMasuk/destroy/{id}',[BarangMasukController::class,'destroy']);

});    

