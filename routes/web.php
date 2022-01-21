<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProjectTeamController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZonesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuthController;

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

Route::get('/',  [CustomAuthController::class, 'dashboard']);

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('zones', [ZonesController::class, 'index'])->name('zones');
Route::post('zone-add', [ZonesController::class, 'add'])->name('zone.add');
Route::post('zone-update', [ZonesController::class, 'update'])->name('zone.update');
Route::get('/zone/delete/{id}', [ZonesController::class, 'delete'])->name('zone.delete');

Route::get('states', [StatesController::class, 'index'])->name('states');
Route::get('states/{id}', [StatesController::class, 'showById'])->name('states.byId');
Route::post('state-add', [StatesController::class, 'add'])->name('state.add');
Route::post('state-update', [StatesController::class, 'update'])->name('state.update');
Route::get('/state/delete/{id}', [StatesController::class, 'delete'])->name('state.delete');


Route::get('projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('projects/{id}', [ProjectsController::class, 'showById'])->name('projects.byId');
Route::post('project-add', [ProjectsController::class, 'add'])->name('project.add');
Route::post('project-update', [ProjectsController::class, 'update'])->name('project.update');
Route::get('/project/delete/{id}', [ProjectsController::class, 'delete'])->name('project.delete');


Route::get('project-team', [ProjectTeamController::class, 'index'])->name('projectTeam');
Route::post('project-team/add', [ProjectTeamController::class, 'add'])->name('projectTeam.add');
Route::post('project-team/update', [ProjectTeamController::class, 'update'])->name('projectTeam.update');
Route::get('project-team/delete/{id}', [ProjectTeamController::class, 'delete'])->name('projectTeam.delete');

Route::get('finances', [FinanceController::class, 'index'])->name('finances');
Route::get('finance/delete/{id}', [FinanceController::class, 'delete'])->name('finance.delete');
Route::post('finance/add', [FinanceController::class, 'add'])->name('finance.add');
Route::post('finance/update', [FinanceController::class, 'update'])->name('finance.update');

Route::get('reports', [ReportController::class, 'index'])->name('reports');
Route::get('report/add', [ReportController::class, 'add'])->name('report.add');
Route::get('report/update/{id}', [ReportController::class, 'get_update'])->name('report.update');
Route::get('report/delete/{id}', [ReportController::class, 'delete'])->name('report.delete');
Route::post('report/add', [ReportController::class, 'post_add'])->name('report.add.post');
Route::post('report/update', [ReportController::class, 'post_update'])->name('report.update.post');

Route::get('users', [UserController::class, 'index'])->name('users');
Route::post('user/add', [UserController::class, 'add'])->name('user.add');
Route::post('user/update', [UserController::class, 'update'])->name('user.update');
Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

Route::prefix('appointment')->group(function () {
    Route::get('/', [AppointmentController::class, 'index']);
});

Route::prefix('patient')->group(function () {
    Route::get('/', [PatientController::class, 'index']);
});

Route::prefix('drug')->group(function () {
    Route::get('/', [DrugController::class, 'index']);
    Route::get('/category', [DrugController::class, 'category']);
});

Route::prefix('test')->group(function () {
    Route::get('/', [TestController::class, 'index']);
});

Route::prefix('parameter')->group(function () {
    Route::get('/', [ParameterController::class, 'index']);
});