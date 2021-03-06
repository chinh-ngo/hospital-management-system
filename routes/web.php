<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HmoController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProjectTeamController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WardController;
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
    Route::get('/', [AppointmentController::class, 'index'])->name('appointment');
    Route::post('/add', [AppointmentController::class, 'add']);
    Route::post('/update', [AppointmentController::class, 'update']);
    Route::get('/delete/{id}', [AppointmentController::class, 'delete']);
});

Route::prefix('patient')->group(function () {
    Route::get('/', [PatientController::class, 'index']);
    Route::post('/add', [PatientController::class, 'add']);
    Route::post('/update', [PatientController::class, 'update']);
    Route::get('/delete/{id}', [PatientController::class, 'delete']);
});

Route::prefix('drug')->group(function () {
    Route::get('/', [DrugController::class, 'index']);
    Route::post('/add', [DrugController::class, 'add']);
    Route::get('/delete/{id}', [DrugController::class, 'delete']);
    Route::post('/update', [DrugController::class, 'update']);
    Route::get('/category', [DrugController::class, 'category']);
    Route::post('/category/add', [DrugController::class, 'add_category']);
    Route::post('/category/update', [DrugController::class, 'update_category']);
    Route::get('/category/delete/{id}', [DrugController::class, 'delete_category']);
});

Route::prefix('test')->group(function () {
    Route::get('/', [TestController::class, 'index']);
    Route::post('/add', [TestController::class, 'add']);
    Route::post('/update', [TestController::class, 'update']);
    Route::get('/delete/{id}', [TestController::class, 'delete']);
});

Route::prefix('parameter')->group(function () {
    Route::get('/', [ParameterController::class, 'index']);
    Route::get('/delete/{id}', [ParameterController::class, 'delete']);
    Route::post('/add', [ParameterController::class, 'add']);
    Route::post('/update', [ParameterController::class, 'update']);
});

Route::prefix('scan')->group(function () {
    Route::get('/', [ScanController::class, 'index']);
    Route::post('/add', [ScanController::class, 'add']);
    Route::post('/update', [ScanController::class, 'update']);
    Route::get('/delete/{id}', [ScanController::class, 'delete']);
});

Route::prefix('ward')->group(function () {
    Route::get('/', [WardController::class, 'index']);
    Route::post('/add', [WardController::class, 'add']);
    Route::post('/update', [WardController::class, 'update']);
    Route::get('/delete/{id}', [WardController::class, 'delete']);
});

Route::prefix('bed')->group(function () {
    Route::get('/', [BedController::class, 'index']);
    Route::post('/add', [BedController::class, 'add']);
    Route::post('/update', [BedController::class, 'update']);
    Route::get('/delete/{id}', [BedController::class, 'delete']);
});

Route::prefix('hmo')->group(function () {
    Route::get('/', [HmoController::class, 'index']);
    Route::post('/add', [HmoController::class, 'add']);
    Route::post('/update', [HmoController::class, 'update']);
    Route::get('/delete/{id}', [HmoController::class, 'delete']);
});

Route::prefix('other')->group(function () {
    Route::get('/', [OtherController::class, 'index']);
    Route::post('/add', [OtherController::class, 'add']);
    Route::post('/update', [OtherController::class, 'update']);
    Route::get('/delete/{id}', [OtherController::class, 'delete']);
});

Route::prefix('department')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/add', [DepartmentController::class, 'add']);
    Route::post('/update', [DepartmentController::class, 'update']);
    Route::get('/delete/{id}', [DepartmentController::class, 'delete']);
});
Route::prefix('statu')->group(function () {
    Route::get('/', [StatuController::class, 'index']);
    Route::post('/add', [StatuController::class, 'add']);
    Route::post('/update', [StatuController::class, 'update']);
    Route::get('/delete/{id}', [StatuController::class, 'delete']);
});
Route::prefix('insurance')->group(function () {
    Route::get('/', [InsuranceController::class, 'index']);
    Route::post('/add', [InsuranceController::class, 'add']);
    Route::post('/update', [InsuranceController::class, 'update']);
    Route::get('/delete/{id}', [InsuranceController::class, 'delete']);
});
