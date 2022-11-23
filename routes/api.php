<?php

use App\Http\Controllers\View\PembayaranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/hitung-pembayaran', [PembayaranController::class, 'hitungPembayaran']);
