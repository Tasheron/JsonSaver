<?php

use App\Models\JsonObject;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('setLang/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/form/store', function () {
    return view('form-store');
});

Route::get('/form/update', function () {
    return view('form-update');
});

Route::get('json/show', function () {
    $jsonObjects = JsonObject::all();
    return view('json-list', [
        'jsonObjects' => $jsonObjects,
    ]);
});

Route::get('json/show/{id}', function ($id) {
    $jsonObject = JsonObject::find($id);
    return view('json-show', [
        'id' => $jsonObject->id,
        'value' => $jsonObject->value,
    ]);
});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);