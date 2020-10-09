<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VotersController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/', function() {
//     return redirect()->route('index');
// });
Route::get('index', [PageController::class, 'index'])->name('index');
Route::get('start', [PageController::class, 'form'])->name('form');
Route::post('user/voting', [VotersController::class, 'store'])->name('voters.create');

Route::get('user/{id}/{name}/voting', [PageController::class, 'vote'])->name('vote');
Route::post('user/{id}/{name}/voting', [PageController::class, 'voting'])->name('voting');
Route::get('responding/{id}/{name}/thanks', [PageController::class, 'respond'])->name('respond');

Route::post('voting/send/{id}/{name}', [VotersController::class, 'voted'])->name('voters.voted');
Route::get('verifikasi/{id}', [VotersController::class, 'verifikasi'])->name('verifikasi.index');
Route::post('veified/{id}', [VotersController::class, 'verified'])->name('verifikasi.verified');

Route::get('voted/user', [VotersController::class, 'votedUser'])->name('voted.user');




// private login
Route::get('private/login', [PageController::class, 'loginPage'])->name('login.index');
Route::post('private/login', [AuthController::class, 'login'])->name('login.post');
Route::get('user/login', [AuthController::class, 'redirectLogin'])->name('login.redirect');

// dashboard
Route::get('admin/dashboard', [AuthController::class, 'admin'])->name('admin.dashboard');

Route::get('admin/participant', [AuthController::class, 'participant'])->name('admin.participant');
Route::delete('admin/participant/{id}', [AuthController::class, 'deleteParticipant'])->name('participant.delete');
Route::get('admin/participant/delete/all', [AuthController::class, 'dropVoters'])->name('participant.drop');

Route::get('admin/candidate', [AuthController::class, 'participant'])->name('admin.participant');
Route::get('admin/candidate', [AuthController::class, 'indexCandidate'])->name('admin.candidate');
Route::get('admin/candidate/new', [AuthController::class, 'createCandidate'])->name('candidate.create');
Route::post('admin/candidate/new', [AuthController::class, 'storeCandidate'])->name('candidate.store');
Route::get('admin/candidate/{id}', [AuthController::class, 'editCandidate'])->name('candidate.edit');
Route::post('admin/candidate/{id}', [AuthController::class, 'updateCandidate'])->name('candidate.update');
Route::delete('admin/candidate/{id}', [AuthController::class, 'destroyCandidate'])->name('candidate.delete');

Route::get('admin/admin', [AuthController::class, 'indexAdmin'])->name('admin.admin');
Route::get('admin/admin/new', [AuthController::class, 'createAdmin'])->name('admin.create');
Route::post('admin/admin/new', [AuthController::class, 'storeAdmin'])->name('admin.store');
Route::post('admin/admin/{id}/update', [AuthController::class, 'updateAdmin'])->name('admin.update');
Route::get('admin/admin/setting', [AuthController::class, 'settingAdmin'])->name('admin.setting');
Route::delete('admin/admin/{id}/delete', [AuthController::class, 'destroyAdmin'])->name('admin.delete');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

