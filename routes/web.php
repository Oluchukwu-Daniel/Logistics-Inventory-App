<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;

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

Route::match(['GET', 'POST'], '/', [InventoryController::class, 'home']);

Route::match(['GET', 'POST'], '/create', [InventoryController::class, 'create']);

Route::match(['GET', 'POST'], '/store', [InventoryController::class, 'store']);

Route::match(['GET', 'POST'], '/edit/{inventory}', [InventoryController::class, 'edit']);

Route::match(['GET', 'POST', 'PUT'], '/update/{inventory}', [InventoryController::class, 'update']);

Route::match(['GET', 'POST', 'DELETE'], '/destroy/{inventory}', [InventoryController::class, 'destroy']);

Route::match(['GET', 'POST'], '/thrashed', [InventoryController::class, 'thrashed']);

Route::match(['GET', 'POST'], '/undelete/{inventory}', [InventoryController::class, 'undelete']);


