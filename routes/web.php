<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\HouseImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceImageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::view('/','index')->name('index');
//Route::get("{any}",function (){
//   return view("app");
//})->where("any",".*");

Route::post('/register',[UserController::class,'register'])->name('register');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/houses',[HouseController::class,'index'])->name('houses');
Route::get('/services',[ServiceController::class,'index'])->name('services');
Route::get('/contacts',function (){
    return view('contacts');
})->name('contacts');
Route::get('/comments',[CommentController::class,'index'])->name('comments');
//Route::group('
Route::middleware(['auth'])->group(function (){
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    Route::get('/comments/create',[CommentController::class,'create'])->name('comments.create');
    Route::post('/comments/create',[CommentController::class,'store'])->name('comments.store');
    Route::get('/booking/{house}/create',[OrderController::class,'create'])->name('booking.create');
    Route::post('/booking/store',[OrderController::class,'store'])->name('booking.store');
    Route::get('/booking/{order}/message',[OrderController::class,'message'])->name('booking.message');
    Route::delete('/booking/{order}/destroy',[OrderController::class,'destroy'])->name('booking.destroy');
    Route::match(['GET','POST'],'/payments/callback',[PaymentController::class,'callback'])->name('payment.callback');
    Route::post('/payments/create',[PaymentController::class,'create'])->name('payment.create');
    Route::get('/payments',[PaymentController::class,'index'])->name('payment.index');

    Route::prefix('admin')->middleware(['admin'])->group(function (){
//        Route::resource('houses', HouseController::class);
        Route::get('/',[OrderController::class,'index'])->name('admin');
        Route::get('/houses',[HouseController::class,'admin'])->name('houses.index');
        Route::get('/houses/create',[HouseController::class,'create'])->name('houses.create');
        Route::post('/houses/store',[HouseController::class,'store'])->name('houses.store');
        Route::get('/houses/{house}/edit',[HouseController::class,'edit'])->name('houses.edit');
        Route::delete('/houses/{house}/destroy',[HouseController::class,'destroy'])->name('houses.destroy');
        Route::put('/houses/{house}/update',[HouseController::class,'update'])->name('houses.update');
        Route::get('/houseImages/{house}/edit',[HouseImageController::class,'edit'])->name('houseImage.edit');
        Route::put('/houseImages/{houseImage}/{house}/update',[HouseImageController::class,'update'])->name('houseImage.update');
        Route::delete('/houseImages/{houseImage}/{house}/delete',[HouseImageController::class,'destroy'])->name('houseImage.destroy');
        Route::post('/houseImages/{house}/store',[HouseImageController::class,'store'])->name('houseImage.store');

        Route::resource('services', ServiceController::class);
        Route::get('/services',[ServiceController::class,'admin'])->name('services.index');

        Route::get('/comments/index', [CommentController::class,'admin'])->name('comments.index');
        Route::delete('/comments/{comment}/destroy',[CommentController::class,'destroy'])->name('comments.destroy');


    });

});



