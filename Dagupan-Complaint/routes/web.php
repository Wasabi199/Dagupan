<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
});
Route::get('/user',[UserController::class,'complaint'])->name('complaint');
Route::post('/user/complaint/submit',[UserController::class,'submitComplaint'])->name('submitComplaint');
Route::post('user/rate/submit',[UserController::class,'submitRequest'])->name('submitRate');

Route::prefix('Admin')->middleware(['auth:sanctum','Admin'])->group(function(){
    Route::get('Admin/DagupanComplaint',[AdminController::class,'dagupanComplaint'])->name('Complaints');
    Route::get('Admin/Barangay',[AdminController::class,'barangay'])->name('Barangay');
    Route::get('Admin/Transfered',[AdminController::class,'transferedComplaint'])->name('transfered');
    Route::post('/SolvedComplaint',[AdminController::class,'solvedComplaintRequest'])->name('SolvedComplaintAdminRequest');
});

Route::prefix('Barangay')->middleware(['auth:sanctum','Barangay'])->group(function(){
    Route::get('/NewComplaints',[BarangayController::class,'newComplaint'])->name('newComplaint');
    Route::get('/PendingComplaint',[BarangayController::class,'pendingComplaint'])->name('pendingComplaint');
    Route::get('/SolvedComplaint',[BarangayController::class,'solvedComplaint'])->name('solvedComplaint');
    Route::get('/TransferedComplaint',[BarangayController::class,'transferedComplaint'])->name('transferedComplaint');
    Route::post('/TransferToMunicipal',[BarangayController::class,'transferedComplaintRequest'])->name('transferedComplaintRequest');
    Route::post('/SolvedComplaint',[BarangayController::class,'solvedComplaintRequest'])->name('SolvedComplaintRequest');

    // Route::get('/send',BarangayController::class,'sendNotification')->name('sendNotification');
});