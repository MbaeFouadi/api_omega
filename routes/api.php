<?php

use App\Http\Controllers\etudiantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('etudiant',etudiantController::class);
Route::post('info_etudiant',[etudiantController::class,'info_etudiant'])->name('info_etudiant');

Route::get('droit_inscription',[etudiantController::class,'droit_inscription'])->name('droit_inscription');
Route::get('droit_preinscription',[etudiantController::class,'droit_preinscription'])->name('droit_preinscription');

Route::get('FDSE/L1',[etudiantController::class,'FDSE_l1'])->name('FDSE_l1');
Route::get('FDSE/L2',[etudiantController::class,'FDSE_l2'])->name('FDSE_l2');
Route::get('FDSE/L3',[etudiantController::class,'FDSE_l3'])->name('FDSE_l3');
Route::get('FDSE/M1',[etudiantController::class,'FDSE_M1'])->name('FDSE_M1');
Route::get('FDSE/M2',[etudiantController::class,'FDSE_M2'])->name('FDSE_M2');

Route::get('FLSH/L1',[etudiantController::class,'FLSH_l1'])->name('FLSH_l1');
Route::get('FLSH/L2',[etudiantController::class,'FLSH_l2'])->name('FLSH_l2');
Route::get('FLSH/L3',[etudiantController::class,'FLSH_l3'])->name('FLSH_l3');
Route::get('FLSH/M1',[etudiantController::class,'FLSH_M1'])->name('FLSH_M1');
Route::get('FLSH/M2',[etudiantController::class,'FLSH_M2'])->name('FLSH_M2');


Route::get('FST/L1',[etudiantController::class,'FST_l1'])->name('FST_l1');
Route::get('FST/L2',[etudiantController::class,'FST_l2'])->name('FST_l2');
Route::get('FST/L3',[etudiantController::class,'FST_l3'])->name('FST_l3');
Route::get('FST/M1',[etudiantController::class,'FST_M1'])->name('FST_M1');
Route::get('FST/M2',[etudiantController::class,'FST_M2'])->name('FST_M2');

Route::get('FIC/L1',[etudiantController::class,'FIC_l1'])->name('FIC_l1');
Route::get('FIC/L2',[etudiantController::class,'FIC_l2'])->name('FIC_l2');
Route::get('FIC/L3',[etudiantController::class,'FIC_l3'])->name('FIC_l3');
Route::get('FIC/M1',[etudiantController::class,'FIC_M1'])->name('FIC_M1');
Route::get('FIC/M2',[etudiantController::class,'FIC_M2'])->name('FIC_M2');

Route::get('EMSP/L1',[etudiantController::class,'EMSP_l1'])->name('EMSP_l1');
Route::get('EMSP/L2',[etudiantController::class,'EMSP_l2'])->name('EMSP_l2');
Route::get('EMSP/L3',[etudiantController::class,'EMSP_l3'])->name('EMSP_l3');
Route::get('EMSP/M1',[etudiantController::class,'EMSP_M1'])->name('EMSP_M1');
Route::get('EMSP/M2',[etudiantController::class,'EMSP_M2'])->name('EMSP_M2');

Route::get('IFERE/L1',[etudiantController::class,'IFERE_l1'])->name('IFERE_l1');
Route::get('IFERE/L2',[etudiantController::class,'IFERE_l2'])->name('IFERE_l2');
Route::get('IFERE/L3',[etudiantController::class,'IFERE_l3'])->name('IFERE_l3');
Route::get('IFERE/M1',[etudiantController::class,'IFERE_M1'])->name('IFERE_M1');
Route::get('IFERE/M2',[etudiantController::class,'IFERE_M2'])->name('IFERE_M2');

Route::get('IUT/L1',[etudiantController::class,'IUT_l1'])->name('IUT_l1');
Route::get('IUT/L2',[etudiantController::class,'IUT_l2'])->name('IUT_l2');
Route::get('IUT/L3',[etudiantController::class,'IUT_l3'])->name('IUT_l3');
Route::get('IUT/M1',[etudiantController::class,'IUT_M1'])->name('IUT_M1');
Route::get('IUT/M2',[etudiantController::class,'IUT_M2'])->name('IUT_M2');

Route::get('CUP/L1',[etudiantController::class,'CUP_l1'])->name('CUP_l1');
Route::get('CUP/L2',[etudiantController::class,'CUP_l2'])->name('CUP_l2');
Route::get('CUP/L3',[etudiantController::class,'CUP_l3'])->name('CUP_l3');
Route::get('CUP/M1',[etudiantController::class,'CUP_M1'])->name('CUP_M1');
Route::get('CUP/M2',[etudiantController::class,'CUP_M2'])->name('CUP_M2');

Route::get('CUM/L1',[etudiantController::class,'CUM_l1'])->name('CUM_l1');
Route::get('CUM/L2',[etudiantController::class,'CUM_l2'])->name('CUM_l2');
Route::get('CUM/L3',[etudiantController::class,'CUM_l3'])->name('CUM_l3');
Route::get('CUM/M1',[etudiantController::class,'CUM_M1'])->name('CUM_M1');
Route::get('CUM/M2',[etudiantController::class,'CUM_M2'])->name('CUM_M2');

