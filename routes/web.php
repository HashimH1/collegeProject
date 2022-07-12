<?php

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





Route::get('/',  [App\Http\Controllers\employee\registerController::class, 'login'])->name('employee.login');

Route::group(['prefix'=>'employee'],function(){

    Route::post('/store', [App\Http\Controllers\employee\registerController::class, 'store'])->name('employee.register.store');

    Route::get('/register', [App\Http\Controllers\employee\registerController::class, 'create'])->name('employee.register');

    Route::get('/login', [App\Http\Controllers\employee\registerController::class, 'login'])->name('employee.login');

    Route::post('/LoginStore', [App\Http\Controllers\employee\registerController::class, 'LoginStore'])->name('employee.login.store');


    Route::group(['middleware'=>'auth:employee'],function(){


        Route::get('/index', [App\Http\Controllers\employee\statisticsController::class, 'index'])->name('employee.index');

        Route::get('/statistics', [App\Http\Controllers\employee\statisticsController::class, 'show'])->name('employee.statistics');

        Route::get('/editProfile', [App\Http\Controllers\employee\profileController::class, 'index'])->name('employee.profile.edit');

        Route::POST('/editProfile', [App\Http\Controllers\employee\profileController::class, 'update'])->name('employee.profile.update');

        Route::get('/logout', [App\Http\Controllers\employee\profileController::class, 'logout'])->name('employee.logout');



    });


    Route::group(['prefix'=>'admin'],function(){

        Route::group(['middleware'=>['auth:employee','role:super_admin']],function(){



            Route::get('department/create', [App\Http\Controllers\admin\departmentController::class, 'create'])->name('admin.department.create');

            Route::POST('department/store', [App\Http\Controllers\admin\departmentController::class, 'store'])->name('admin.department.store');

            Route::get('department/index', [App\Http\Controllers\admin\departmentController::class, 'index'])->name('admin.department.index');

            Route::get('department/edit/{id}', [App\Http\Controllers\admin\departmentController::class, 'edit'])->name('admin.department.edit');

            Route::POST('department/update', [App\Http\Controllers\admin\departmentController::class, 'update'])->name('admin.department.update');

            Route::get('addAdmin', [App\Http\Controllers\admin\adminController::class, 'create'])->name('add.admin');

            Route::post('Admin_store', [App\Http\Controllers\admin\adminController::class, 'store'])->name('add.admin.store');

            Route::get('index', [App\Http\Controllers\admin\adminController::class, 'index'])->name('admin.index');

            Route::get('delete_employee/{id}', [App\Http\Controllers\admin\employeeController::class, 'destroy'])->name('employee.delete');


            Route::get('delete_statistics/{id}', [App\Http\Controllers\admin\statisticsController::class, 'destroy'])->name('statistics.delete');


            Route::get('index', [App\Http\Controllers\admin\adminController::class, 'index'])->name('admin.index');

            Route::get('stat_search/{id?}', [App\Http\Controllers\admin\statisticsController::class, 'statSearch'])->name('statSearch.index');

           // Route::get('Stat_search', [App\Http\Controllers\admin\statisticsController::class, 'statSearchGet'])->name('statSearch.get');


        });


        Route::group(['middleware'=>['auth:employee','role:super_admin|admin']],function(){

            Route::get('employees', [App\Http\Controllers\admin\employeeController::class, 'index'])->name('admin.all.employees');

            Route::get('employee/info/{id}', [App\Http\Controllers\admin\employeeController::class, 'show'])->name('admin.employee.info');

            Route::get('statistics', [App\Http\Controllers\admin\statisticsController::class, 'index'])->name('admin.all.statistics');


        });

    });

});


