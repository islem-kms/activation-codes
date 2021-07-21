<?php

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

Route::get('hospitals', function () {
    $hospitals = \App\Models\Hospital::paginate(2);
    return response()->json(\App\Http\Resources\Hospitals::collection(\App\Models\Hospital::all()));
});

Route::put('hospitals/{hospital}', function (Request $request,\App\Models\Hospital $hospital) {

    $request->validate([
        'name' => 'required',
    ], $request->all());

    $hospital->update(['name' => $request->name]);
    return response()->json([
        'success' => true
    ]);
});

Route::post('hospitals', function (Request $request) {

    $request->validate([
        'name' => 'required',
    ], $request->all());

    $hospital = \App\Models\Hospital::create(['name' => $request->name]);
    return response()->json([
        'success' => true,
        'data' => $hospital
    ]);
});
