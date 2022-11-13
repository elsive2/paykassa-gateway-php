<?php

use App\Http\Controllers\PaykassaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('payment-address', [PaykassaController::class, 'getPaymentAddress']);
Route::post('payment', [PaykassaController::class, 'invoiceForPayment']);
Route::post('check-payment', [PaykassaController::class, 'checkPayment']);
Route::post('notifications', [PaykassaController::class, 'notificationsForTransactions']);
Route::post('instant-payment', [PaykassaController::class, 'instantPayment']);