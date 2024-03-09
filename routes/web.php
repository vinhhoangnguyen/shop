<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ManagerController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\PosController;

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
    return view('frontend.index');
})->name('home');


Route::middleware(['auth', 'verified', 'role:customer'])->group(function () {
    Route::controller(CustomerController::class)->group(function () {

        Route::get('/customer/dashboard',  'index')->name('customer.dashboard');
        Route::post('/customer/profile/store',  'customerProfileStore')->name('customer.profile.store');
        Route::get('/customer/logout', 'CustomerLogout')->name('customer.logout');

        Route::post('/customer/password/update',  'customerPassword_Update')->name('customer.password.update');

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Login Admin
Route::get('admin/login',[AdminController::class, 'login'])->name('admin.login');

//Login manager
Route::get('manager/login',[ManagerController::class, 'login'])->name('manager.login');

//Login/Register User.....làm sau
Route::get('/account',[CustomerController::class, 'account'])->name('guest.account');


Route::middleware('auth')->group(function(){

    //Route Admin
    Route::middleware('role:admin')->group(function(){
        Route::controller(AdminController::class)->group(function () {
            Route::get('admin/dashboard', 'index')->name('admin.dashboard');

            Route::get('admin/profile', 'AdminProfile')->name('admin.profile');
            Route::post('admin/profile/update', 'AdminProfile_Update')->name('admin.profile.update');
            Route::get('/admin/password/change',  'AdminPassword_Change')->name('admin.password.change');
            Route::post('/admin/password/update',  'AdminPassword_update')->name('admin.password.update');
            Route::get('/admin/lock',  'Admin_lock')->name('admin.lock');
            Route::post('/admin/unlock',  'Admin_Unlock')->name('admin.unlock');
            Route::get('/admin/logout',  'Admin_Destroy')->name('admin.logout');
        });

        // Router POS
        Route::controller(PosController::class)->group(function () {
            Route::get('admin/pos/setting', 'setting')->name('admin.pos.setting');
            Route::get('admin/pos/category', 'category')->name('admin.pos.category');

        });
    });

    //Route Manager
    Route::middleware('role:manager')->group(function(){
        Route::controller(ManagerController::class)->group(function () {
            Route::get('manager/dashboard', 'index')->name('manager.dashboard');

            Route::get('manager/profile', 'managerProfile')->name('manager.profile');
            Route::post('manager/profile/update', 'managerProfile_Update')->name('manager.profile.update');
            Route::get('/manager/password/change',  'managerPassword_Change')->name('manager.password.change');
            Route::post('/manager/password/update',  'managerPassword_Update')->name('manager.password.update');

            Route::get('/manager/lock',  'manager_lock')->name('manager.lock');
            Route::post('/manager/unlock',  'manager_Unlock')->name('manager.unlock');
            Route::get('/manager/logout',  'manager_Destroy')->name('manager.logout');


        });
    });

    //Route vendor
    Route::middleware('role:vendor')->group(function(){
        Route::controller(VendorController::class)->group(function () {
            Route::get('vendor/dashboard', 'index')->name('vendor.dashboard');
        });
    });

});

//Test user login
Route::get('user-login', function () {
    return Auth::user();
});

//Test user login
Route::get('test', function () {
    return '123';
});
