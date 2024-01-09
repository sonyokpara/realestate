<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\RoleController;
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
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.update-profile');
    Route::get('/admin/change-password', [AdminController::class, 'changePasswordForm'])->name('admin.chg-password');
    Route::post('/admin/change-password', [AdminController::class, 'changePassword'])->name('admin.password');
});

Route::middleware(['auth', 'role:agent'])->group(function(){
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
});

Route::get('/admin/login', [AdminController::class, 'create']);
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/property-type/all', 'allType')->name('all.type');
        Route::get('/property-type/add', 'addTypeForm')->name('add.type.form');
        Route::post('/property-type/store', 'storeType')->name('store.type');
        Route::get('/property-type/edit/{id}', 'editType')->name('edit.type');
        Route::post('/property-type/edit', 'updateType')->name('update.type');
        Route::get('/property-type/delete/{id}', 'deleteType')->name('delete.type');

        // Amenities Routes
        Route::get('/amenity/all', 'allAmenities')->name('all.amenities');
        Route::get('/amenity/add', 'addAmenity')->name('add.amenity');
        Route::post('/amenity/add', 'storeAmenity')->name('store.amenity');
        Route::get('/amenity/edit/{id}', 'editAmenity')->name('edit.amenity');
        Route::post('/amenity/update', 'updateAmenity')->name('update.amenity');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::controller(RoleController::class)->group(function(){

        // Permission Routes
        Route::get('/permissions/all', 'allPermissions')->name('all.permissions');
        Route::get('/permissions/add', 'addPermission')->name('add.permission');
        Route::post('/permissions/add', 'storePermission')->name('store.permission');
        Route::get('/permissions/edit/{id}', 'editPermissions')->name('edit.permission');
        Route::post('/permissions/update', 'updatePermission')->name('update.permission');
        Route::get('/permissions/delete/{id}', 'deletePermission')->name('delete.permission');

        // Role Routes
        Route::get('/roles/all', 'allRoles')->name('all.roles');
        Route::get('/roles/add', 'addRoles')->name('add.role');
        Route::post('/roles/add', 'storeRole')->name('store.role');
        Route::get('/roles/edit/{id}', 'editRole')->name('edit.role');
        Route::post('/roles/update', 'updateRole')->name('update.role');
        Route::get('/roles/delete/{id}', 'deleteRole')->name('delete.role');
        
        // Laravel Excel Package Routes
        Route::get('/import/permissions', 'importPermissionForm')->name('import.permission');
        Route::post('/import/permissions', 'importPermission')->name('import');
        Route::get('/export/permissions', 'exportPermission')->name('export.permission');

    });
});
