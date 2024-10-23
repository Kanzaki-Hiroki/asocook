<?php

use Illuminate\Support\Facades\Route;
#use App\Http\Controllers\;

Route::get('/', function () {
    return view('welcome');
});
Route::get/post('ファイル名', [コントローラー名::class, 'メソッド名'])->name('route{{}}で呼び出す名前');
