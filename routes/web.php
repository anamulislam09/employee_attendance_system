<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimeTableController;
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
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*--------------------admin route start here---------------------*/
// admin login route start here 
Route::get('/admin-login', [AdminController::class, 'Index'])->name('login_form');
Route::post('/admin-login/owner', [AdminController::class, 'Login'])->name('admin.login');

// admin register route start here 
Route::get('/admin-register', [AdminController::class, 'AdminRegister'])->name('register_form');
Route::post('/admin-register/store', [AdminController::class, 'Store'])->name('admin.store');
// admin register route ends here 

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard');

    // admin login route start here 
    Route::post('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    // Department route start here 
    Route::get('/departments', [DepartmentController::class, 'Index'])->name('department.index');
    Route::get('/departments/create', [DepartmentController::class, 'Create'])->name('department.create');
    Route::post('/departments/store', [DepartmentController::class, 'Store'])->name('department.store');
    Route::get('/departments/edit/{id}', [DepartmentController::class, 'Edit'])->name('department.edit');
    Route::post('/departments/update', [DepartmentController::class, 'Update'])->name('department.update');
    Route::get('/departments/delete/{id}', [DepartmentController::class, 'Delete'])->name('department.delete');

    // employee route start here 
    Route::get('/employees', [EmployeeController::class, 'Index'])->name('employee.index');
    Route::get('/employees/create', [EmployeeController::class, 'Create'])->name('employee.create');
    Route::post('/employees/store', [EmployeeController::class, 'Store'])->name('employee.store');
    Route::get('/employees/edit/{id}', [EmployeeController::class, 'Edit'])->name('employee.edit');
    Route::post('/employees/update', [EmployeeController::class, 'Update'])->name('employee.update');
    Route::get('/employees/delete/{id}', [EmployeeController::class, 'Delete'])->name('employee.delete');

    // active reoute ends here 
    Route::get('/active_status/{id}', [EmployeeController::class, 'activeStatus']); // Active route
    Route::get('/not_active_status/{id}', [EmployeeController::class, 'notActiveStatus']); //deActive route

    // employee route start here 
    Route::get('/time-table', [TimeTableController::class, 'Index'])->name('timeTable.index');
    Route::get('/time-table/create', [TimeTableController::class, 'Create'])->name('timeTable.create');
    Route::post('/time-table/store', [TimeTableController::class, 'Store'])->name('time-table.store');
    Route::get('/time-table/edit/{id}', [TimeTableController::class, 'Edit']);
    Route::post('/time-table/update', [TimeTableController::class, 'Update'])->name('time-table.update');
    Route::get('/time-table/delete/{id}', [TimeTableController::class, 'Delete'])->name('time-table.delete');
})->middleware(['auth']);


/*--------------------admin route ends here---------------------*/


// require __DIR__.'/auth.php';
