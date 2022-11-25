<?php

use App\Http\Controllers\ApiPatientController;
use App\Http\Controllers\ApiUserController;
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

/**
 * Start API for ADMIN
 */
Route::post('/admin/register', [ApiUserController::class, 'register'])->name('registerAdmin');
Route::post('/admin/login', [ApiUserController::class, 'login'])->name('loginAdmin');


/**
 * Start API for PATIENT
 */
Route::post('/register', [ApiPatientController::class, 'register'])->name('registerPatient');
Route::post('/login', [ApiPatientController::class, 'login'])->name('loginPatient');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });