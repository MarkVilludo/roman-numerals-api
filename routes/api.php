<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RomanNumeralController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('roman-numerals', [RomanNumeralController::class, 'store']);
Route::get('recent-converted-numerals', [RomanNumeralController::class, 'recentNumeral']);
Route::get('top-converted-numerals', [RomanNumeralController::class, 'topNumeral']);


