<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\mastermanagement\UsermasterController;
use App\Http\Controllers\admin\mastermanagement\ShipcompanyController;
use App\Http\Controllers\admin\mastermanagement\VesselController;
use App\Http\Controllers\admin\mastermanagement\WeatherController;
use App\Http\Controllers\admin\shipschedule\ShipscheduleController;
use App\Http\Controllers\admin\workhistory\WorkhistoryController;
use App\Http\Controllers\admin\manageoutput\OutputController;
use App\Http\Controllers\admin\bulkcorrection\BulkController;

use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\CandidateController;

// HELLO RANJAN Str::endsWith($haystack, 'needles')


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

Route::get('/dashboard', function () {
    return view('admin.layouts.admin_master');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('admin.layouts.admin_master');
})->name('dashboard');


# POST
Route::get('postlist',[PostController::class,'index'])->name('admin.post.index');

Route::view('post/createview', 'admin.post.create')->name('admin.post.createview');
Route::post('post/create',[PostController::class,'create'])->name('admin.post.create');

Route::get('post/delete/{id}',[PostController::class,'delete'])->name('admin.post.delete');

Route::get('post/edit/{id}',[PostController::class,'editForm'])->name('admin.post.editView');
Route::put('post/edit',[PostController::class,'edit'])->name('admin.post.edit');

Route::get('exportpostdata',[PostController::class,'export'])->name('admin.post.export');


# CANDIDATE
Route::get('candidatelist',[CandidateController::class,'index'])->name('admin.candidate.index');

Route::get('candidate/createview',[CandidateController::class,'createView'])->name('admin.candidate.createview');
// Route::post('candidate/create',[CandidateController::class,'create'])->name('admin.candidate.create');

Route::get('candidate/delete/{id}',[CandidateController::class,'delete'])->name('admin.candidate.delete');

Route::get('candidate/edit/{id}',[CandidateController::class,'editForm'])->name('admin.candidate.editView');
Route::put('candidate/edit/{id}',[CandidateController::class,'edit'])->name('admin.candidate.edit');


Route::get('exportdata',[CandidateController::class,'export'])->name('admin.candidate.export');
Route::get('exportimg',[CandidateController::class,'exportPhoto'])->name('admin.candidate.exportPhoto');


Route::post('getcandidate',[CandidateController::class,'getCandidate'])->name('admin.candidate.getCandidate');
Route::get('reset',[CandidateController::class,'reset'])->name('admin.candidate.reset');

// Route::get('upload',[CandidateController::class, 'index']);
Route::post('candidatecreate',[CandidateController::class, 'create'])->name('candidatecreate');

