<?php

use App\Http\Controllers\Admin\courseController;
use App\Http\Controllers\Admin\dashboardcontroller;
use App\Http\Controllers\Admin\departmentController;
use App\Http\Controllers\Admin\enrollmentController;
use App\Http\Controllers\Admin\professorController;
use App\Http\Controllers\Admin\studentController;
use App\Http\Controllers\Auth\authController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;



Route::resource('student', studentController::class)->names([
    'index'=>'student.index',
    'show'=>'student.show',
    'create'=>'student.create',
    'update'=>'student.update',
    'edit'=>'student.edit',
    'store'=>'student.store',
    'destroy'=>'student.destroy'
]);

Route::resource('course', courseController::class)->names([
    'index'=>'course.index',
    'show'=>'course.show',
    'create'=>'course.create',
    'update'=>'course.update',
    'edit'=>'course.edit',
    'store'=>'course.store',
    'destroy'=>'course.destroy'
]);
Route::resource('professor', professorController::class)->names([
    'index'=>'professor.index',
    'show'=>'professor.show',
    'create'=>'professor.create',
    'update'=>'professor.update',
    'edit'=>'professor.edit',
    'store'=>'professor.store',
    'destroy'=>'professor.destroy'
]);


Route::resource('department', departmentController::class)->names([
    'index'=>'department.index',
    'show'=>'department.show',
    'create'=>'department.create',
    'update'=>'department.update',
    'edit'=>'department.edit',
    'store'=>'department.store',
    'destroy'=>'department.destroy'
]);
Route::resource('enrollment', enrollmentController::class)->names([
    'index'=>'enrollment.index',
    'show'=>'enrollment.show',
    'create'=>'enrollment.create',
    'update'=>'enrollment.update',
    'edit'=>'enrollment.edit',
    'store'=>'enrollment.store',
    'destroy'=>'enrollment.destroy'
]);

Route::get('dashboard', [dashboardcontroller::class,'index'])->name('dashboard');

Route::get('/', [homeController::class,'index'])->name('home.index');
Route::get('/about', [homeController::class,'about'])->name('home.about');
Route::get('/contact', [homeController::class,'contact'])->name('home.contact');


Route::get('/adminLogin', [authController::class,'adminLogin'])->name('admin.login');
Route::post('/adminLogin', [authController::class,'adminCheckLogin'])->name('admin.adminCheckLogin');