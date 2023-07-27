<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    // return "Hello World!";
    // return "<h1>Hello World!</h1>";
    return view('welcome');
});

Route::get('/home', function () {
    return "Home";
});

Route::match(['get', 'post'], '/get-post', function () {
    return "Route match GET or POST";
});

Route::any('/any-request', function () {
    return "Any Request";
});

Route::view('/welcome', 'welcome');

Route::redirect('/redirect', '/'); # redirect to another route

# Access Request Header
Route::get("/users", function (Request $request) {
    dd($request); // die and dump for debugging
});

# Access Request
Route::get("/request-json", function (Request $request) {
    return response()->json(['first_name' => 'Juan', 'last_name' => 'Dela Cruz']);
});

# Change Content Type
Route::get('/change-content-type', function () {
    return response("Change Content Type", 200)->header('Content-Type', 'text/plain');
});

# Download File
Route::get('/download-file', function () {
    $name = "download-installer.txt";
    $file = public_path() . "/$name";
    $header = ['Content-Type' => 'application/text'];
    return response()->download($file, $name, $header);
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

# Named routes
Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
// Route::get('/employees/{id}', [EmployeeController::class, 'show']);
Route::get('/employees/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employees/update/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employees/delete/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

/*
# Middleware
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create')->middleware('auth');
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit')->middleware('auth');
Route::get('/employees/show/{id}', [EmployeeController::class, 'show'])->name('employee.show')->middleware('auth');

# Group Middleware
Route::middleware('auth')->group(function () {
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::get('/employees/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
});
*/

# Use Custom Middleware
Route::get('/employees/show/{id}', [EmployeeController::class, 'show'])->name('employee.show')->middleware('check-access:5');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employee.index')->middleware('check-page-number:5');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/restricted', [HomeController::class, 'restrict'])->name('restrict');