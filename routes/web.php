<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PatientInformationController;
use App\Http\Controllers\AppointmentController;

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', UserController::class);
Route::resource('/inventory', InventoryController::class);
Route::resource('/patients', PatientInformationController::class);
Route::resource('/appointment', AppointmentController::class);
Route::get('/user/search', [SearchController::class, 'searchUser']);

Route::get('/search_product', [SearchController::class, 'searchProduct']);
Route::get('/search_patient', [SearchController::class, 'searchPatient']);
Route::get('/search_paitent_for_appointment', [SearchController::class, 'searchPatientForAppointment'])->name('searchPatientForAppointment');

Route::get('/add_appointment/patients', [AppointmentController::class, 'showPatients'])->name('showPatientsForAppointments');
Route::get('/add_appointment/patients/create/{id}', [AppointmentController::class, 'createAppointment'])->name('createAppointment');
Route::POST('/add_appointment/patients/create/{id}', [AppointmentController::class, 'storeAppointment'])->name('storeAppointment');


Route::GET('/appointments/today', [AppointmentController::class, 'todayAppointment'])->name('todayAppointment');
Route::GET('/appointments/week', [AppointmentController::class, 'weekAppointment'])->name('weekAppointment');
Route::GET('/appointments/month', [AppointmentController::class, 'monthAppointment'])->name('monthAppointment');

Route::GET('/appointments/today/search', [SearchController::class, 'searchPatientTodayAppointment'])->name('searchPatientTodayAppointment');
Route::GET('/appointments/week/search', [SearchController::class, 'searchPatientWeekAppointment'])->name('searchPatientWeekAppointment');
Route::GET('/appointments/month/search', [SearchController::class, 'searchPatientMonthAppointment'])->name('searchPatientMonthAppointment');
Route::GET('/appointments/search', [SearchController::class, 'searchAllAppointment'])->name('searchAllAppointment');




