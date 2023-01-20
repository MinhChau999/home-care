<?php

use App\Http\Controllers\ApiBookingController;
use App\Http\Controllers\ApiClinicController;
use App\Http\Controllers\ApiEnumController;
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
Route::get('/users/edit-profile', [ApiUserController::class, 'getUserByToken'])->name('getUserByToken');
Route::put('/users/update-profile', [ApiUserController::class, 'updateProfile'])->name('updateProfile');
Route::put('/users/change-password', [ApiUserController::class, 'changePassword'])->name('changePassword');

Route::group([
   'as' => 'users.',
   'prefix' => 'users',
   'middleware' => 'role:admin',
], function () {
   // Get data from user
   Route::get('/get-all-user', [ApiUserController::class, 'getAllUser'])->name('getAllUser');
   Route::get('/get-all-doctor', [ApiUserController::class, 'getAllDoctor'])->name('getAllDoctor');
   
   // CRUD
   Route::post('/store', [ApiUserController::class, 'store'])->name('store');
   Route::get('/edit/{user}', [ApiUserController::class, 'edit'])->name('edit');
   Route::put('/update/{user}', [ApiUserController::class, 'update'])->name('update');
   Route::put('/users/update-password/{user}', [ApiUserController::class, 'updatePassword'])->name('updatePassword');
   Route::delete('/destroy/{user}', [ApiUserController::class, 'destroy'])->name('destroy');
});

Route::group([
   'as' => 'patients.',
   'prefix' => 'patients',
   'middleware' => 'role:admin',
], function () {
   // Get data from user
   Route::get('/get-all-patient', [ApiPatientController::class, 'getAllPatient'])->name('getAllPatient');
   
   // CRUD
   Route::post('/store', [ApiUserController::class, 'store'])->name('store');
   Route::get('/edit/{user}', [ApiUserController::class, 'edit'])->name('edit');
   Route::put('/update/{user}', [ApiUserController::class, 'update'])->name('update');
   Route::put('/users/update-password/{user}', [ApiUserController::class, 'updatePassword'])->name('updatePassword');
   Route::delete('/destroy/{user}', [ApiUserController::class, 'destroy'])->name('destroy');
});

Route::group([
   'as' => 'clinics.',
   'prefix' => 'clinics',
   // 'middleware' => 'role:doctor',
], function () {
   // Get data from user
   Route::get('/get-all-clinic', [ApiClinicController::class, 'getAllClinic'])->name('getAllClinic');
   
   // CRUD
   Route::post('/store', [ApiUserController::class, 'store'])->name('store');
   Route::get('/edit/{user}', [ApiUserController::class, 'edit'])->name('edit');
   Route::put('/update/{user}', [ApiUserController::class, 'update'])->name('update');
   Route::put('/users/update-password/{user}', [ApiUserController::class, 'updatePassword'])->name('updatePassword');
   Route::delete('/destroy/{user}', [ApiUserController::class, 'destroy'])->name('destroy');
});

Route::group([
   'as' => 'bookings.',
   'prefix' => 'bookings',
   // 'middleware' => 'role:admin',
], function () {
   // Get data from booking
   Route::get('/get-all-booking-homes', [ApiBookingController::class, 'getAllBookingHomes'])->name('getAllBookingHomes');
   Route::get('/get-all-booking-clinics', [ApiBookingController::class, 'getAllBookingClinics'])->name('getAllBookingClinics');
   
   // CRUD
   Route::post('/store', [ApiUserController::class, 'store'])->name('store');
   Route::get('/edit-booking-home/{booking}', [ApiBookingController::class, 'editBookingHome'])->name('editBookingHome');
   Route::put('/update/{user}', [ApiUserController::class, 'update'])->name('update');
   Route::put('/update-status-booking-home/{booking}', [ApiBookingController::class, 'updateStatusBookingHome'])->name('updateStatusBookingHomeF');
   Route::delete('/destroy-booking-home/{booking}', [ApiBookingController::class, 'destroyBookingHome'])->name('destroyBookingHome');
});


/**
 * Start API for Site
 */
Route::post('/register', [ApiPatientController::class, 'register'])->name('registerPatient');
Route::post('/login', [ApiPatientController::class, 'login'])->name('loginPatient');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * Enums Api routes
 */
Route::group([
   'as' => 'enums.',
   'prefix' => 'enums',
   // 'middleware' => 'role:admin',
], function () {
   Route::get('/roles', [ApiEnumController::class, 'getRoleUser'])->name('getRoleUser');
   Route::get('/status-booking', [ApiEnumController::class, 'getStatusBooking'])->name('getStatusBooking');
});