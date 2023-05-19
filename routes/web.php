<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Index;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Event;
use App\Http\Livewire\Guest;
use App\Http\Livewire\Company;
use App\Http\Controllers\PhotoController;
use App\Http\Livewire\Category;
use App\Http\Livewire\Hour;
use App\Http\Livewire\Type;
use App\Http\Livewire\CreateJob;
use App\Http\Livewire\LogIn;
use App\Http\Controllers\jobPage;
use App\Http\Livewire\Location;
use App\Http\Livewire\PageJobs;
use App\Http\Livewire\EventView;
use App\Http\Livewire\Message;
use App\Http\Livewire\EventFinder;
use App\Http\Controllers\pdfPage;

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

// Route::get('/welcome', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/',Index::class);
Route::middleware(['auth','web'])->group(function() {

    Route::get('/home',Dashboard::class)->name('home');
    Route::get('/event',Event::class);
    Route::get('event/{id}',Guest::class);
    Route::get('company',Company::class);
    Route::get('company',Company::class,'reloadCaptcha');
    Route::get('category',Category::class);
    Route::get('hour',Hour::class);
    Route::get('type',Type::class);
    Route::get('job',CreateJob::class);
    Route::get('location',Location::class); 
    Route::get('message',Message::class); 
    Route::get('/PDFREPORT', [pdfPage::class, 'index']);
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


        });

// Route::get('logIn',LogIn::class);
Route::get('job-search/{name}/{id}',PageJobs::class);
Route::get('event-view',EventView::class);
Route::get('event-finder',EventFinder::class);
// Route::get('logIn',[PhotoController::class,'index']);



