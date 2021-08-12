<?php

use App\Http\Resources\ActivationCodes;
use App\Http\Resources\Departments;
use App\Http\Resources\Hospitals;
use App\Models\ActivationCode;
use App\Models\Department;
use App\Models\Hospital;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/hospitals', function () {
    $hospitals = Hospitals::collection(Hospital::all());
    $model = new Hospital();
    $model->getFillable();
    $fillable = array_merge(['id'], $model->getFillable());
    return Inertia::render('Hospitals', [
        'hospital_fields' => $fillable,
        'hospitals' => $hospitals
    ]);
})->name('hospitals');

Route::middleware(['auth:sanctum', 'verified'])->get('/departments', function () {
    $departments = Departments::collection(Department::all());
    $model = new Department();
    $model->getFillable();
    $fillable = array_merge(['id'], $model->getFillable());

    return Inertia::render('Departments', [
        'item_fields' => $fillable,
        'resource_items' => $departments,
        'resource_name' => 'Departments',
        'resource_object' => 'department',
    ]);
})->name('departments');

Route::middleware(['auth:sanctum', 'verified'])->get('/activation_codes', function () {
    $activation_codes = ActivationCodes::collection(ActivationCode::all());
    $model = new ActivationCode();
    $model->getFillable();
    $fillable = array_merge(['id'], $model->getFillable());

    return Inertia::render('ActivationCodes', [
        'item_fields' => $fillable,
        'resource_items' => $activation_codes,
        'resource_name' => 'Activation codes',
        'resource_object' => 'activation_code',
    ]);
})->name('activation_codes');

// samba password
// $2y$10$5LMHQs3wlKCn5pXBPgnBHOp0sEdh1RhGau198qWS/EOK8kcTmHOo.
// $2y$10$5LMHQs3wlKCn5pXBPgnBHOp0sEdh1RhGau198qWS/EOK8kcTmHOo.
