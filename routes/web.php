<?php

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
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])
->get('/dashboard', 'App\Http\Controllers\CourseController@search')
->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/addcourse', function () {
    return Inertia::render('AddCourse');
})->name('addcourse');

// Route::middleware(['auth:sanctum', 'verified'])->get('/courses', function () {
//     return Inertia::render('Course');
// })->name('courses');
Route::middleware(['auth:sanctum', 'verified'])
->get('/courses', 'App\Http\Controllers\CourseController@index')
->name('courses');
Route::middleware(['auth:sanctum', 'verified'])
->get('/categories', 'App\Http\Controllers\CategoryController@index')
->name('categories');

Route::middleware(['auth:sanctum', 'verified'])
->get('/homepage', 'App\Http\Controllers\CourseController@search')
->name('homepage');
// Category
Route::middleware(['auth:sanctum', 'verified'])
->get('/addCategory', 'App\Http\Controllers\CategoryController@addCategory')
->name('addCategory');
Route::middleware(['auth:sanctum', 'verified'])
->post('/postcategory', 'App\Http\Controllers\CategoryController@store')
->name('postcategory');
// Course
Route::middleware(['auth:sanctum', 'verified'])
->get('/addCourse', 'App\Http\Controllers\CourseController@addCourse')
->name('addCourse');
Route::middleware(['auth:sanctum', 'verified'])
->post('/postCourse', 'App\Http\Controllers\CourseController@store')
->name('postCourse');

Route::middleware(['auth:sanctum', 'verified'])
->post('/delCourse/{id}/destroy', 'App\Http\Controllers\CourseController@destroy')
->name('delCourse');
