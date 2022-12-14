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
Route::post('/users/register', [ApiUserController::class, 'register'])->name('registerAdmin');
Route::post('/users/login', [ApiUserController::class, 'login'])->name('loginAdmin');
Route::post('/users/reset-password', [ApiUserController::class, 'sendMail'])->name('sendMail');
Route::post('/users/reset-password/{token}', [ApiUserController::class, 'resetPassword'])->name('resetPassword');

Route::group([
   'as' => 'users.',
   'prefix' => 'users',
   'middleware' => 'role:admin',
], function () {
   Route::get('/get-all-user', [ApiUserController::class, 'getAllUSer'])->name('getAllUSer');
   Route::delete('/destroy/{user}', [ApiUserController::class, 'destroy'])->name('destroy');
});


/**
 * Start API for PATIENT
 */
Route::post('/register', [ApiPatientController::class, 'register'])->name('registerPatient');
Route::post('/login', [ApiPatientController::class, 'login'])->name('loginPatient');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * SendMail
 */

 Route::get('/admin/reset-password', [ApiUserController::class, 'resetPassword'])->name('resetPassword');