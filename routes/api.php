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

Route::put('departments/{department}', function (Request $request,\App\Models\Department $department) {

    $request->validate([
        'name' => 'required',
        'hospital_id' => 'required',
    ], $request->all());

    $department->update($request->all());
    return response()->json([
        'success' => true
    ]);
});

Route::post('departments', function (Request $request) {

    $request->validate([
        'name' => 'required',
        'hospital_id' => 'required',
    ], $request->all());

    $department = \App\Models\Department::create($request->all());
    return response()->json([
        'success' => true,
        'data' => \App\Http\Resources\Departments::collection([$department])
    ]);
});

Route::put('activation_codes/{activation_code}', function (Request $request,\App\Models\ActivationCode $activationCode) {

    $request->validate([
        'code' => 'required',
        'department_id' => 'required',
    ], $request->all());

    $activationCode->update($request->all());
    return response()->json([
        'success' => true
    ]);
});

Route::post('activation_codes', function (Request $request) {

    $request->validate([
        'code' => 'required',
        'department_id' => 'required',
    ], $request->all());

    $activation_code = \App\Models\ActivationCode::create($request->all());
    return response()->json([
        'success' => true,
        'data' => \App\Http\Resources\ActivationCodes::collection([$activation_code])
    ]);

});
