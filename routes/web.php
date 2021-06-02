<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PacienteController;
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

Route::get('/', [HomeController::class, 'index']);
//* HOSPITALES
Route::get('/hospitales', [HospitalController::class, 'index']);
Route::post('/hospitales', [HospitalController::class, 'store']);
Route::get('/hospitales/{id}', [HospitalController::class, 'edit']);
Route::post('/hospitales/actualizar/{id}', [HospitalController::class, 'update']);
Route::post('/hospitales/actu/{id}', [HospitalController::class, 'update']);
Route::get('/hospitales/eliminar/{id}', [HospitalController::class, 'destroy']);

Route::get('/doctores', [DoctorController::class, 'index']);
//* DOCTORES
Route::post('/doctores', [DoctorController::class, 'store']);
Route::get('/lista/doctores', [DoctorController::class, 'lista']);
Route::get('/editar/doctor/{id}', [DoctorController::class, 'edit']);
Route::put('/actualizar/doctor/{id}', [DoctorController::class, 'update']);
Route::get('/eliminar/doctor/{id}', [DoctorController::class, 'destroy']);


//* PACIENTES
Route::get('/pacientes', [PacienteController::class, 'index']);
Route::post('/pacientes', [PacienteController::class, 'store']);
Route::get('/lista/pacientes', [PacienteController::class, 'lista_pacientes']);
Route::get('/formulario/covid/{id}', [PacienteController::class, 'formulario_covid']);
Route::post('/deteccion/covid', [PacienteController::class, 'deteccion_covid']);
Route::get("/atender/paciente/{id}", [PacienteController::class, 'show']);
