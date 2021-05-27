<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EnrollmentController;


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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/about', function () {
//    return view('about');
//});
//Route::get('/home', function () {
//    return view('home');
//});
//Route::get('/home/{category}', function ($c) {
//    //echo $c;
//    $name='pratick';
//    //return view('home',['cat'=>$c , 'name'=>$name]);
//    return view('home', compact('c','name'));
//});
//Route::get('/history/{category}', [HistoryController::class,'history']);
//crud
Route::get('employees', [EmployeeController::class,'index']);
Route::get('create-employee',[EmployeeController::class,'create']);
Route::post('store-employee',[EmployeeController::class,'store']);

Route::get('edit-employee/{id}',[EmployeeController::class,'edit']);
Route::post('update-employee/{id}',[EmployeeController::class,'update']);

Route::get('delete-employee/{id}',[EmployeeController::class,'delete']);

//Auth
Route::get('login',[AuthController::class,'login']);
Route::post('storelogin',[AuthController::class,'loginstore']);
Route::group(['middleware' => 'checkloggedin'], function (){
    //dashboard
    Route::get('dashboard',[HomeController::class,'dashboard']);
//    Route::get('home',[LayoutController::class,'home']);
    Route::get('about',[LayoutController::class,'about']);
    Route::get('contact',[LayoutController::class,'contact']);
    Route::get('service',[LayoutController::class,'service']);

//    Route::get('home2',[LayoutController::class,'home2']);
//    Route::get('about2',[LayoutController::class,'about2']);
//    Route::get('contact2',[LayoutController::class,'contact2']);
//    Route::get('service2',[LayoutController::class,'service2']);
//    Route::get('employees',[EmployeeController::class,'index']);
} );
Route::group(['middleware' => ['checkloggedin','isadmin']], function (){
    Route::get('admin',[HomeController::class,'admin']);
});
Route::group(['middleware' => ['checkloggedin','isstudent']], function (){
    Route::get('student',[HomeController::class,'student']);
});




Route::get('logout',[AuthController::class,'logout']);

#layout
Route::get('home',[LayoutController::class,'home']);

// #validation
// Route::get('create-student',[StudentController::class,'create']);
// Route::post('store-student',[StudentController::class,'store']);

Route::get('products',[ProductController::class,'all']);

#Upload
Route::get('upload',[UploadController::class,'upload']);
Route::post('upload-image',[UploadController::class,'store']);

#Location
Route::get('divisions',[LocationController::class,'division']);
Route::post('insert-divisions',[LocationController::class,'createDivision']);
Route::post('insert-districts',[LocationController::class,'createDistrict']);

#Session
Route::get('session', [SessionController::class,'index']);
Route::get('create-session',[SessionController::class,'create']);
Route::post('store-session',[SessionController::class,'store']);
Route::get('edit-session/{id}',[SessionController::class,'edit']);
Route::post('update-session/{id}',[SessionController::class,'update']);
Route::get('delete-session/{id}',[SessionController::class,'delete']);

#Section
Route::get('section', [SectionController::class,'index']);
Route::get('create-section',[SectionController::class,'create']);
Route::post('store-section',[SectionController::class,'store']);
Route::get('edit-section/{id}',[SectionController::class,'edit']);
Route::post('update-section/{id}',[SectionController::class,'update']);
Route::get('delete-section/{id}',[SectionController::class,'delete']);

#Student
Route::get('student', [StudentController::class,'index']);
Route::get('create-student',[StudentController::class,'create']);
Route::post('store-student',[StudentController::class,'store']);
Route::get('edit-student/{id}',[StudentController::class,'edit']);
Route::post('update-student/{id}',[StudentController::class,'update']);
Route::get('delete-student/{id}',[StudentController::class,'delete']);

#Subject
Route::get('subject', [SubjectController::class,'index']);
Route::get('create-subject',[SubjectController::class,'create']);
Route::post('store-subject',[SubjectController::class,'store']);
Route::get('edit-subject/{id}',[SubjectController::class,'edit']);
Route::post('update-subject/{id}',[SubjectController::class,'update']);
Route::get('delete-subject/{id}',[SubjectController::class,'delete']);

#Enrollment
Route::get('enroll', [EnrollmentController::class,'index']);
Route::get('create-enroll', [EnrollmentController::class,'indexrequest']);
Route::post('store-enroll',[EnrollmentController::class,'storerequest']);
Route::get('l',[EnrollmentController::class,'l']);
