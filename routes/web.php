<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\visitorsController;
use App\Http\Controllers\adminController;

Route::get('/',[visitorsController::class,'index'])->name('home');
Route::get('/course/detail/{id?}',[visitorsController::class,'courseDetail'])->name('course_detail');
Route::get('/courses',[visitorsController::class,'courses'])->name('courses');
Route::get('/about',[visitorsController::class,'about'])->name('about');
Route::get('/contact',[visitorsController::class,'contact'])->name('contact');
Route::get('/login',[visitorsController::class,'login'])->name('login');
Route::get('/logout',[visitorsController::class,'logout'])->name('logout');
Route::post('/login/submit',[visitorsController::class,'loginSubmit'])->name('login_submit');
Route::get('/register',[visitorsController::class,'register'])->name('register');
Route::post('/register/submit',[visitorsController::class,'registerSubmit'])->name('register_submit');
Route::get('/instructor/profile',[visitorsController::class,'instructorProfile'])->name('instructor_profile');
Route::get('/checkout',[visitorsController::class,'checkout'])->name('checkout');
Route::get('/cart',[visitorsController::class,'cart'])->name('cart');
Route::get('/students/profile',[visitorsController::class,'studentsProfile'])->name('students_profile');
Route::get('/students/edit/profile',[visitorsController::class,'editStudentsProfile'])->name('edit_student_profile');
Route::get('/instructor/edit/profile',[visitorsController::class,'editInstructorProfile'])->name('edit_instructor_profile');
Route::post('/instructor/edit/profile/submit',[visitorsController::class,'editInstructorProfileSubmit'])->name('edit_instructor_profile_submit');
Route::post('/students/edit/profile/submit',[visitorsController::class,'editStudentsProfileSubmit'])->name('edit_profile_submit');
Route::get('/watch',[visitorsController::class,'watch'])->name('watch');
Route::get('/instructor/course/add',[visitorsController::class,'courseAdd'])->name('course_add');
Route::post('/instructor/course/submit',[visitorsController::class,'courseFormSubmit'])->name('course_form_submit');
Route::get('/instructor/course/chapters/{id}',[visitorsController::class,'chaptersAdd'])->name('chapters_add');
Route::get('/instructor/course/chapters/{id}',[visitorsController::class,'chaptersAdd'])->name('chapters_add');
Route::post('/instructor/course/chapters/submit',[visitorsController::class,'chaptersSubmit'])->name('chapters_submit');
Route::get('/instructor/course/{id}/published',[visitorsController::class,'coursePublished'])->name('course_published');



// admin panel
Route::get('/admin/login',[adminController::class,'adminLogin'])->name('admin_login');
Route::get('/dashboard',[adminController::class,'index'])->name('index');
Route::get('/dashboard/categories',[adminController::class,'adminCategories'])->name('admin_categories');
Route::get('/dashboard/categories/form',[adminController::class,'adminCategoriesForm'])->name('categories_form');
Route::post('/dashboard/categories/form/submit',[adminController::class,'adminCategoriesFormSubmit'])->name('categories_form_submit');
