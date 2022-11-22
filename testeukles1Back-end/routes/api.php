
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaterielController;

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



//  ********************************************************************* //

// 1: CLIENT
Route::post('/client/create', [ClientController::class, 'createClient']);
Route::get('/client/read', [ClientController::class, 'getAllClient']);

Route::post('/materiel/create', [MaterielController::class, 'createMateriel']);
Route::get('/materiel/read', [MaterielController::class, 'getAllMateriel']);

Route::get('/client/result', [ClientController::class, 'getResult']);








