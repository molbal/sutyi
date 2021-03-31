<?php

    use GDText\Box;
    use GDText\Color;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Storage;
    use Intervention\Image\Facades\Image;

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

    Route::post('/brainlet/make', [\App\Http\Controllers\BrainletController::class, 'create'])->name('brainlet.make');
    Route::get('/brainlet/get/{id}', [\App\Http\Controllers\BrainletController::class, 'get'])->name('brainlet.get');

    Route::view('/', 'welcome', [
        'brainlets' => Storage::disk('local')->allFiles('faces')
    ]);
