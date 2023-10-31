<?php

use App\Livewire\HomePage;
use App\Livewire\ServicePage;
use App\Livewire\SingleServicePage;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomePage::class)->name('home');
Route::get('/services', ServicePage::class)->name('services');
Route::get('/services/{id}', SingleServicePage::class)->name('single-service');
